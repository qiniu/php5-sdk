#!/usr/bin/env php
<?php

require('rs.php');
require('client/rs.php');

$QBOX_ACCESS_KEY	= '<Please apply your access key>';
$QBOX_SECRET_KEY	= '<Dont send your secret key to anyone';

$client = QBox_OAuth2_NewClient();

$bucket = 'bucket';
$rs = QBox_RS_NewService($client, $bucket);

list($code, $error) = $rs->Drop();
echo "===>Drop bucket result:\n";
if ($code == 200) {
	echo "Drop ok!\n";
} else {
	$msg = QBox_ErrorMessage($code,$error);
	echo "Drop failed:$code - $msg\n";
}

$key = '000-default';
$friendName = 'rs_demo.php';

list($result, $code, $error) = $rs->PutAuth();
echo "===> PutAuth result:\n";
if ($code == 200) {
	var_dump($result);
} else {
	$msg = QBox_ErrorMessage($code, $error);
	echo "PutAuth failed: $code - $msg\n";
	exit(-1);
}

list($result, $code, $error) = QBox_RS_PutFile($result['url'], $bucket, $key, '', __FILE__, 'CustomData', array('key' => $key));
echo "===> PutFile $key result:\n";
if ($code == 200) {
	var_dump($result);
} else {
	$msg = QBox_ErrorMessage($code, $error);
	echo "PutFile failed: $code - $msg\n";
	exit(-1);
}

list($code, $error) = $rs->Publish("iovip.qbox.me"."/".$bucket);
echo "===> Publish result:\n";
if ($code == 200) {
	echo "Publish ok!\n";
} else {
	$msg = QBox_ErrorMessage($code, $error);
	echo "Publish failed: $code - $msg\n";
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

list($result, $code, $error) = $rs->Get($key, $friendName);
echo "===> Get $key result:\n";
if ($code == 200) {
	var_dump($result);
} else {
	$msg = QBox_ErrorMessage($code, $error);
	echo "Get failed: $code - $msg\n";
	exit(-1);
}

list($result, $code, $error) = $rs->GetIfNotModified($key, $friendName, $result['hash']);
echo "===> GetIfNotModified $key result:\n";
if ($code == 200) {
	var_dump($result);
} else {
	$msg = QBox_ErrorMessage($code, $error);
	echo "GetIfNotModified failed: $code - $msg\n";
	exit(-1);
}

echo "===> Display $key contents:\n";
echo file_get_contents($result['url']);

$action = '';
if ($action == 'delete') {
	list($code, $error) = $rs->Delete($key);
	echo "===> Delete $key result:\n";
	if ($code == 200) {
		echo "Delete ok!\n";
	} else {
		$msg = QBox_ErrorMessage($code, $error);
		echo "Delete failed: $code - $msg\n";
	}
}
else if ($action == 'drop') {
	list($code, $error) = $rs->Drop();
	echo "===> Drop table result:\n";
	if ($code == 200) {
		echo "Drop ok!\n";
	} else {
		$msg = QBox_ErrorMessage($code, $error);
		echo "Drop failed: $code - $msg\n";
	}
}

