<?php

//
// OAuth2

define('QBOX_CLIENT_ID',     '<ClientId>');
define('QBOX_CLIENT_SECRET', '<ClientSecret>');

define('QBOX_REDIRECT_URI',           '<RedirectURL>');
define('QBOX_AUTHORIZATION_ENDPOINT', '<AuthURL>');
define('QBOX_TOKEN_ENDPOINT',         'http://dev.qbox.us:9100/oauth2/token');

//
// QBox

define('QBOX_PUT_TIMEOUT', 300000); // 300s = 5m

define('QBOX_IO_HOST', 'http://dev.qbox.us:9200');
define('QBOX_FS_HOST', 'http://dev.qbox.us:9300');
define('QBOX_RS_HOST', 'http://dev.qbox.us:10100');

// a more security path need
define("QBOX_TOKEN_TMP_FILE", sys_get_temp_dir() . DIRECTORY_SEPARATOR . '.qbox_tokens');
