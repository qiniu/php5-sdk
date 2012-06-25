<?php

//
// OAuth2

define('ACCESS_KEY','RLT1NBD08g3kih5-0v8Yi6nX6cBhesa2Dju4P7mT');
define('SECRET_KEY','k6uZoSDAdKBXQcNYG3UOm4bP3spDVkTg-9hWHIKm');

define('QBOX_REDIRECT_URI',           '<RedirectURL>');
define('QBOX_AUTHORIZATION_ENDPOINT', '<AuthURL>');
define('QBOX_TOKEN_ENDPOINT',         'https://acc.qbox.me/oauth2/token');

define('TOKEN_ENDPOINT_FORMAT', 'https://%s/oauth2/token');
define('TOKEN_HOST_LIST', 'acc.qbox.me|acc2.qbox.me|acc3.qbox.me');
define('TOKEN_TOKEN_PORT', '443');

//
// QBox

define('QBOX_PUT_TIMEOUT', 300000); // 300s = 5m

define('QBOX_IO_HOST', 'http://io.qbox.me');
define('QBOX_FS_HOST', 'https://fs.qbox.me');
define('QBOX_RS_HOST', 'http://rs.qbox.me:10100');

