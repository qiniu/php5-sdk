#!/usr/bin/env php
<?php

require('rs.php');
require('fileop.php');

$client = QBox_OAuth2_NewClient();


$bucket = 'bucket';
$rs = QBox_RS_NewService($client, $bucket);

list($result, $code, $error) = $rs->Get($key, $key);
echo "===> Get $key result:\n";
if ($code == 200) {
	var_dump($result);
} else {
	$msg = QBox_ErrorMessage($code, $error);
	echo "Get failed: $code - $msg\n";
	exit(-1);
}

$urlImageInfo = QBox_FileOp_ImageInfoURL($result['url']);

echo "===> ImageInfo of $key:\n";
echo file_get_contents($urlImageInfo) . "\n";

$urlPreview = QBox_FileOp_ImagePreviewURL($result['url'], 1);
$jpg = file_get_contents($urlPreview);
file_put_contents('2_thumb_s.jpg', $jpg);

echo "===> ImagePreview done and save to 2_thumb_s.jpg\n";
