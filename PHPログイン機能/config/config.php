<?php

ini_set('display_errors', 1);

// データベースの設定
define('DSN', 'mysql:host=localhost;dbname="データベース名"');
define('DB_USERNAME', 'データベースユーザー名');
define('DB_PASSWORD', 'データベース接続パスワード');

define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);

require_once(__DIR__ . '/../lib/functions.php');
// クラスのオートロード設定を読み込む
require_once(__DIR__ . '/autoload.php');

session_start();