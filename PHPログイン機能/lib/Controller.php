<?php

namespace MyApp;

// 共通処理のクラス

class Controller {

  private $_errors;
  private $_values;

  public function __construct() {
    if (!isset($_SESSION['token'])) {
      // この命令で32桁の推測されにくい文字列が作られる
      $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
    }
    // stdClass()はPHPのデフォルトクラス。宣言することなくいきなりnewとして使うことができる特殊オブジェクト。
    $this->_errors = new \stdClass();
    $this->_values = new \stdClass();
  }

  protected function setValues($key, $value) {
    $this->_values->$key = $value;
  }

  public function getValues() {
    return $this->_values;
  }

  protected function setErrors($key, $error) {
    $this->_errors->$key = $error;
  }

  public function getErrors($key) {
    return isset($this->_errors->$key) ?  $this->_errors->$key : '';
  }

  protected function hasError() {
    // 空じゃなかったらプロパティーを取得
    return !empty(get_object_vars($this->_errors));
  }

  // 継承したクラスからも使うのでprotected
  protected function isLoggedIn() {
    // ログイン状態判定の仕方・・・ログインした時にセッションにmeというキーで情報をつけて保持し、判定する
    // $_SESSION['me']
    return isset($_SESSION['me']) && !empty($_SESSION['me']);
  }

  public function me() {
    // もしログインしていたら$SESSION['me']を返し、そうでなければnullを返す
    return $this->isLoggedIn() ? $_SESSION['me'] : null;
  }
}