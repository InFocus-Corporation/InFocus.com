<?php
// db settings
define('DB_HOST', '{{admin_db.host}}');
define('DB_USER', '{{admin_db.user}}');
define('DB_PASS', '{{admin_db.password}}');
define('DB', '{{admin_db.db}}');

// memcache
define('MC_HOST', '{{memcache.host}}');
define('MC_PORT', {{memcache.port}});

// misc settings
define('TESTMODE', false);
define('DEBUG', false);
define('ADMIN_URL', 'http://{{admin_hostname}}');
define('WWW_URL', 'https://{{admin_hostname}}');
define('EMAIL_ERRORS_TO', '{{debug_email}}');
define('EMAIL_DEBUG_TO', '{{debug_email}}');
define('SWIPE_FILE_PATH', '{{swipe_file_path}}');
