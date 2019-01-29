<?php

/*
名前空間
MyApp
index.php controller
MyApp\Controller\Index
-> lib/Controller/Index.php
*/

spl_autoload_register(function($class) {
  // 全体の名前空間
  $prefix = 'MyApp\\';
  // もしクラス名がMyAppから始まるならば、0つまり先頭だったら
  if (strpos($class, $prefix) === 0) {
    $className = substr($class, strlen($prefix));
    $classFilePath = __DIR__ . '/../lib/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($classFilePath)) {
      require $classFilePath;
    }
  }
});