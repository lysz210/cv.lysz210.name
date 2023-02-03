import * as pulumi from "@pulumi/pulumi";
import * as aws from "@pulumi/aws";
import * as awsx from "@pulumi/awsx";
import { remote } from '@pulumi/command';
import * as glob from 'glob';
import * as mime from 'mime';
import * as md5 from 'md5';
import { readFileSync } from "fs";

const configs = new pulumi.Config();
const PublicRead = aws.s3.CannedAcl.PublicRead;

// Create an AWS resource (S3 Bucket)
const bucket = new aws.s3.Bucket("cv.lysz210.name", {
    bucket: 'cv.lysz210.name',
    acl: PublicRead,
    website: {
        indexDocument: "index.html",
        routingRules: [
            {
                Condition: {
                    HttpErrorCodeReturnedEquals: '404'
                },
                Redirect: {
                    ReplaceKeyWith: 'en'
                }
            }
        ]
    },
    corsRules: [
        {
            allowedMethods: ['GET'],
            allowedOrigins: ['*']
        }
    ]
});

// load all files
const dist = '../build/';

glob.sync('**/*', {
    cwd: dist,
    nodir: true,
    stat: true
}).forEach(file => {
    const filePath = `${dist}${file}`;
    const mimeType = mime.getType(filePath);
    new aws.s3.BucketObject(file, {
        bucket: bucket.id,
        source: new pulumi.asset.FileAsset(filePath),
        acl: PublicRead,
        contentType: mimeType || undefined
    })
})

// add suffix in name to ensure trigger changes
// on file channge.
// This is a temporary solution, need a proper
// change detection on contente in resource log
const treafixFilePath = './cv-traefik.yaml';
const hash = md5(readFileSync(treafixFilePath));
const cvTraefik = new remote.CopyFile(`traefik-${hash}`, {
    connection: {
        host: 'lysz210.name',
        user: 'ubuntu',
        privateKey: configs.requireSecret('awsMiPem')
    },
    localPath: treafixFilePath,
    remotePath: 'swarm-controller/configs/traefik/cv.yaml'
})

// Export the name of the bucket
export const bucketName = bucket.id;
export const cvEndpoint = bucket.websiteEndpoint;