<?php
/**
 * @author  Foma Tuturov <fomiash@yandex.ru>
 */

// All calls are sent to this file.
// Все вызовы направляются в этот файл.

define('HLEB_START', microtime(true));
define('HLEB_FRAME_VERSION', "1.6.4");
define('HLEB_PUBLIC_DIR', __DIR__);
define('HLEB_DIR', __DIR__ . '/../');

// General headers.
// Общие заголовки.
header("Content-Security-Policy: default-src 'self'");
header("Referrer-Policy: no-referrer-when-downgrade");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: SAMEORIGIN");
// ...

// Initialization.
// Инициализация.

define('HLEB_VENDOR_DIR_NAME', '/app/ThirdParty/');
require __DIR__ . '/../app/ThirdParty/phphleb/framework/bootstrap.php';

exit();


