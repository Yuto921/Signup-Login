<?php

namespace MyApp\Controller;

class Index extends \MyApp\Controller {

  public function run() {
    // もしログインして？
    if (!$this->isLoggedIn()) {
      // ログインしていなければ、ログイン画面に飛ばす
      // login
      header('Location: ' . SITE_URL . '/login.php');
      exit;
    }

    // ログインしていたら、ユーザーの情報を取得
    // get users info
    $userModel = new \MyApp\Model\User();
    $this->setValues('users', $userModel->findAll());
  }

}