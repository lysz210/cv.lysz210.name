import * as pulumi from "@pulumi/pulumi";
import * as aws from "@pulumi/aws";
import * as awsx from "@pulumi/awsx";
import { local, remote } from '@pulumi/command';

const configs = new pulumi.Config();

// Create an AWS resource (S3 Bucket)
const bucket = new aws.s3.Bucket("cv.lysz210.name", {
    bucket: 'cv.lysz210.name',
    website: {
        indexDocument: "index.html"
    },
    corsRules: [
        {
            allowedMethods: ['GET'],
            allowedOrigins: ['*']
        }
    ]
});

const runOptions = {
    delete: "echo 'nothing to do'",
    dir: '..',
    environment: {
        MAIL_PERSONAL: configs.requireSecret('emailPersonal')
    }
}

const enIndex = new aws.s3.BucketObject('en/index.html', {
    bucket: bucket.id,
    contentBase64: new local.Command('buildCvEn', {
        create: 'php artisan cv:html en',
        ...runOptions
    }).stdout,
    acl: 'public-read',
    contentType: 'text/html'
});
const itIndex = new aws.s3.BucketObject('it/index.html', {
    bucket: bucket.id,
    contentBase64: new local.Command('buildCvIt', {
        create: 'php artisan cv:html it',
        ...runOptions
    }).stdout,
    acl: 'public-read',
    contentType: 'text/html'
});
const enPdf = new aws.s3.BucketObject('en/CV_lingyong_sun.pdf', {
    bucket: bucket.id,
    contentBase64: new local.Command('buildCvPdfEn', {
        create: 'php artisan cv:pdf en',
        ...runOptions
    }).stdout,
    acl: 'public-read',
    contentType: 'application/pdf'
});
const itPdf = new aws.s3.BucketObject('it/CV_lingyong_sun.pdf', {
    bucket: bucket.id,
    contentBase64: new local.Command('buildCvPdfIt', {
        create: 'php artisan cv:pdf it',
        ...runOptions
    }).stdout,
    acl: 'public-read',
    contentType: 'application/pdf'
});
// css/cv/main_style.css
const cvMainCss = new aws.s3.BucketObject('css/cv/main_style.css', {
    bucket: bucket.id,
    source: new pulumi.asset.FileAsset('../public/css/cv/main_style.css'),
    acl: 'public-read',
    contentType: 'text/css'
});
// images/europass-inline.svg
const cvLogo = new aws.s3.BucketObject('images/europass-inline.svg', {
    bucket: bucket.id,
    source: new pulumi.asset.FileAsset('../public/images/europass-inline.svg'),
    acl: 'public-read',
    contentType: 'image/svg+xml'
});
// public/me/social-accounts.json
const socialAccounts = new aws.s3.BucketObject('me/social-accounts.json', {
    bucket: bucket.id,
    source: new pulumi.asset.FileAsset('../public/me/social-accounts.json'),
    acl: 'public-read',
    contentType: 'application/json'
})

const cvTraefik = new remote.CopyFile('traefik', {
    connection: {
        host: 'lysz210.name',
        user: 'ubuntu',
        privateKey: configs.requireSecret('awsMiPem')
    },
    localPath: './cv-traefik.yaml',
    remotePath: 'swarm-controller/configs/traefik/cv.yaml'
})

// Export the name of the bucket
export const bucketName = bucket.id;
export const enCv = enIndex.id;
export const itCv = itIndex.id;
export const enCvPdf = enPdf.id;
export const itCvPdf = itPdf.id;
export const socials = socialAccounts.id;
export const cvEndpoint = bucket.websiteEndpoint;