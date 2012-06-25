#!/usr/bin/env php
<?php

require('rs.php');
require('client/rs.php');

$client = QBox_OAuth2_NewClient();

$tblName = 'tblName';
$rs = QBox_RS_NewService($client, $tblName);

$key = '000-default3';
$friendName = 'rs_demo.php';

list($result, $code, $error) = $rs->PutAuth();
echo "===> PutAuth result:\n";
if ($code == 200) {
	var_dump($result);
} else {
	$msg = QBox_ErrorMessage($code, $error);
	echo "PutFile failed: $code - $msg\n";
	exit(-1);
}

list($result, $code, $error) = QBox_RS_PutFile($result['url'], $tblName, $key, '', __FILE__, 'CustomData', array('key' => $key));
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

