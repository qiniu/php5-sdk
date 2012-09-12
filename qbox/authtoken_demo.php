#!/usr/bin/env php
<?php

require_once('authtoken.php');

$opts = array(
    "scope"			=> "test_bucket",
    "expiresIn"		=> 3600,
    "callbackUrl"	=> "http://example.com/callback?a=b&d=c",
);

$upToken = QBox_MakeAuthToken($opts);

var_dump($upToken);

