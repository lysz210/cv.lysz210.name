import * as pulumi from "@pulumi/pulumi";
import * as aws from "@pulumi/aws";
import * as awsx from "@pulumi/awsx";
import { local } from '@pulumi/command'
import { execSync } from 'child_process'

// Create an AWS resource (S3 Bucket)
const bucket = new aws.s3.Bucket("cv.lysz210.name", {
    website: {
        indexDocument: "index.html"
    }
});


const enIndex = new aws.s3.BucketObject('en/index.html', {
    bucket: bucket.id,
    contentBase64: execSync('php artisan cv:html en').toString(),
    acl: 'public-read',
    contentType: 'text/html'
});
const itIndex = new aws.s3.BucketObject('it/index.html', {
    bucket: bucket.id,
    contentBase64: execSync('php artisan cv:html it').toString(),
    acl: 'public-read',
    contentType: 'text/html'
});
const enPdf = new aws.s3.BucketObject('en/CV_lingyong_sun.pdf', {
    bucket: bucket.id,
    contentBase64: execSync('php artisan cv:pdf it').toString(),
    acl: 'public-read',
    contentType: 'application/pdf'
});
const itPdf = new aws.s3.BucketObject('it/CV_lingyong_sun.pdf', {
    bucket: bucket.id,
    contentBase64: execSync('php artisan cv:pdf it').toString(),
    acl: 'public-read',
    contentType: 'application/pdf'
});
// css/cv/main_style.css
const cvMainCss = new aws.s3.BucketObject('css/cv/main_style.css', {
    bucket: bucket.id,
    source: new pulumi.asset.FileAsset('public/css/cv/main_style.css'),
    acl: 'public-read',
    contentType: 'text/css'
});
// images/europass-inline.svg
const cvLogo = new aws.s3.BucketObject('images/europass-inline.svg', {
    bucket: bucket.id,
    source: new pulumi.asset.FileAsset('public/images/europass-inline.svg'),
    acl: 'public-read',
    contentType: 'image/svg+xml'
});

// Export the name of the bucket
export const bucketName = bucket.id;
export const enCv = enIndex.id;
export const itCv = itIndex.id;
export const enCvPdf = enPdf.id;
export const itCvPdf = itPdf.id;
export const cvEndpoint = bucket.websiteEndpoint;
