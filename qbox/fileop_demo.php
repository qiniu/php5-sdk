#!/usr/bin/env php
<?php

require('rs.php');
require('fileop.php');

$client = QBox_OAuth2_NewClient();


$tblName = 'tblName';
$rs = QBox_RS_NewService($client, $tblName);

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

