#!/usr/bin/env php
<?php

require('rs.php');
require('client/rs.php');

$client = QBox_OAuth2_NewClient();


$bucket = 'bucket';
$rs = QBox_RS_NewService($client, $bucket);

$key = 'put_demo2.php';
$localFile = __FILE__;

list($result, $code, $error) = $rs->PutAuth();
echo "===> PutAuth result:\n";
if ($code == 200) {
	var_dump($result);
} else {
	$msg = QBox_ErrorMessage($code, $error);
	echo "PutFile failed: $code - $msg\n";
	exit(-1);
}

list($result, $code, $error) = QBox_RS_PutFile($result['url'], $bucket, $key, '', $localFile, '', array('key' => $key));
echo "===> PutFile $key result:\n";
if ($code == 200) {
	var_dump($result);
} else {
	$msg = QBox_ErrorMessage($code, $error);
	echo "PutFile failed: $code - $msg\n";
	exit(-1);
}

list($result, $code, $error) = $rs->Stat($key);
echo "===> Stat $key result:\n";
if ($code == 200) {
	var_dump($result);
} else {
	$msg = QBox_ErrorMessage($code, $error);
	echo "Stat failed: $code - $msg\n";
	exit(-1);
}

