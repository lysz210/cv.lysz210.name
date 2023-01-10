import * as pulumi from "@pulumi/pulumi";
import * as aws from "@pulumi/aws";
import * as awsx from "@pulumi/awsx";

// Create an AWS resource (S3 Bucket)
const bucket = new aws.s3.Bucket("cv.lysz210.name", {
    website: {
        indexDocument: "index.html"
    }
});

const index = new aws.s3.BucketObject('en/index.html', {
    bucket: bucket.id,
    source: new pulumi.asset.FileAsset('build/en/index.html'),
    acl: 'public-read',
    contentType: 'text/html'
});

// css/cv/main_style.css
const cvMainCss = new aws.s3.BucketObject('css/cv/main_style.css', {
    bucket: bucket.id,
    source: new pulumi.asset.FileAsset('public/css/cv/main_style.css'),
    acl: 'public-read',
    contentType: 'text/css'
});

// Export the name of the bucket
export const bucketName = bucket.id;
export const enCv = index.id;
export const cvEndpoint = bucket.websiteEndpoint;
