<?php

require('eu.php');
require('utils.php');

$customer = '001';

$client = QBox_OAuth2_NewClient();

$eu =  QBox_EU_NewService($client);

list($code, $error) = $eu->SetWatermark($customer, array('text' => 'abc'));
echo time() . " ===> SetWatermark result:\n";
if ($code == 200) {
	echo "SetWatermark ok!\n";
} else {
	$msg = QBox_ErrorMessage($code, $error);
	echo "SetWatermark failed: $code - $msg\n";
}

list($tpl, $code, $error) = $eu->GetWatermark($customer);
echo time() . " ===> GetWatermark result:\n";
if ($code == 200) {
	var_dump($tpl);
} else {
	$msg = QBox_ErrorMessage($code, $error);
	echo "GetWatermark failed: $code - $msg\n";
}

