<?php

require_once(__DIR__ . '/../config/config.php');

// ログアウトはPOSTされる
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// 仕込んだtokenで検証
  if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    echo "Invalid Token!";
    exit;
  }

// セッションを空にする
  $_SESSION = [];

// PHPはセッションの管理にクッキーを使うので、それも空にする
  if (isset($_COOKIE[session_name()])) {
    // セッションの内容は空にし、有効期限を過去日付にすれば削除
    setcookie(session_name(), '', time() - 86400, '/');
  }

  session_destroy();

}

// index.phpに飛ばす
header('Location: ' . SITE_URL);