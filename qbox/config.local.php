<?php

//
// OAuth2

define('QBOX_CLIENT_ID',      '<ClientId>');
define('QBOX_CLIENT_SECRET',  '<ClientSecret>');

define('QBOX_REDIRECT_URI',           '<RedirectURL>');
define('QBOX_AUTHORIZATION_ENDPOINT', '<AuthURL>');
define('QBOX_TOKEN_ENDPOINT',         'http://127.0.0.1:9876/oauth2/token');

define('TOKEN_ENDPOINT_FORMAT', 'http://%s/oauth2/token');
define('TOKEN_HOST_LIST', '127.0.0.1');
define('TOKEN_TOKEN_PORT', '9876');

//
// QBox

define('QBOX_PUT_TIMEOUT', 300000); // 300s = 5m

define('QBOX_IO_HOST', 'http://127.0.0.1:9876');
define('QBOX_FS_HOST', 'http://127.0.0.1:9872');
define('QBOX_RS_HOST', 'http://127.0.0.1:9875');

// a more security path need
define("QBOX_TOKEN_TMP_FILE", sys_get_temp_dir() . DIRECTORY_SEPARATOR . '.qbox_tokens');
