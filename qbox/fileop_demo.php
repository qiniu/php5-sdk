#!/usr/bin/env php
<?php

require('rs.php');
require('fileop.php');

$client = QBox_OAuth2_NewClient();

list($code, $result) = QBox_OAuth2_ExchangeByPasswordPermanently($client, 'test@qbox.net', 'test', QBOX_TOKEN_TMP_FILE);
if ($code != 200) {
	$msg = QBox_ErrorMessage($code, $result);
	echo "Login failed: $code - $msg\n";
	exit(-1);
}

/*
list($code, $result) = QBox_OAuth2_ExchangeByPassword($client, 'test@qbox.net', 'test');
if ($code != 200) {
	$msg = QBox_ErrorMessage($code, $result);
	echo "Login failed: $code - $msg\n";
	exit(-1);
}
*/

$tblName = 'tblName';
$rs = QBox_RS_NewService($client, $tblName);

$key = '2.jpg';

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

$urlMakeStyle = QBox_FileOp_MakeStyleURL($result['url'], '3.png', 'address=成都市高新区天府软件园D区D7;date=2011/03/28;duration=下午;time=23:24;message=中午没事的时候到后校门吃粽子;phonename=TAKEN BY SAMSUNG i9000');
$jpg = file_get_contents($urlMakeStyle);
file_put_contents('2_output_s.jpg', $jpg);

echo "===> MakeStyle done and save to 2_output_s.jpg\n";

$urlPreview = QBox_FileOp_ImagePreviewURL($result['url'], 1);
$jpg = file_get_contents($urlPreview);
file_put_contents('2_thumb_s.jpg', $jpg);

echo "===> ImagePreview done and save to 2_thumb_s.jpg\n";

$urlPreview = QBox_FileOp_ImagePreviewURL($result['url'], 1);
$jpg = file_get_contents($urlPreview);
file_put_contents('2_thumb_s.jpg', $jpg);

