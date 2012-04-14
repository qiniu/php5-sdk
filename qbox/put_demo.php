#!/usr/bin/env php
<?php

require('rs.php');
require('client/rs.php');

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

list($result, $code, $error) = QBox_RS_PutFile($result['url'], $tblName, $key, '', $localFile, '', array('key' => $key));
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

