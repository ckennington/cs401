<?php

// TODO add your own access keys
//putenv("AWS_ACCESS_KEY_ID=");
//putenv("AWS_SECRET_ACCESS_KEY=");

require '/Users/crk/projects/cs404/src/vendor/autoload.php';
require 'aws.phar';
use Aws\S3\S3Client;

$s3 = new Aws\S3\S3Client([
    'profile' => 'default',
    'version' => 'latest',
    'region' => 'us-east-2'
]);

$sharedConfig = [
    'region' => 'us-west-2',
    'version' => 'latest'
];

$sdk = new Aws\Sdk($sharedConfig);
$client = $sdk->createS3();

$result = $client->putObject([
    'Bucket' => 'cs401',
    'Key' => "example1",
    'Body' => 'Hello from AWS land!'
]);

// Download the contents of the object.
$result = $client->getObject([
    'Bucket' => 'cs401',
    'Key' => "example1"
]);

// Print the body of the result by indexing into the result object.
echo "\n" . $result['Body'] . "\n";
