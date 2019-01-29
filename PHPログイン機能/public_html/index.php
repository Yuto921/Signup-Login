<?php

// ユーザーの一覧

require_once(__DIR__ . '/../config/config.php');

// $_SESSION['me']にログインしたユーザーの情報が入る
// var_dump($_SESSION['me']);

// このビューに表示するデータをcontrollerから引っ張ってくることにするため、Controllerのインスタンスを作る
$app = new MyApp\Controller\Index();

// run()メソッドで、ユーザーの一覧を表示するのに必要なデータを引っ張ってくる
$app->run();

// $app->me()・・・コントローラーにme()というメソッドを作り$app->me()でユーザー情報が取れるように
// $app->getValues()->users・・・登録されているユーザーの一覧を取得

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div id="container">
    <form action="logout.php" method="post" id="logout">
      <?= h($app->me()->email); ?> <input type="submit" value="Log Out">
      <!-- トークンを仕込む -->
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </form>
    <h1>Users <span class="fs12">(<?= count($app->getValues()->users); ?>)</span></h1>
    <ul>
      <?php foreach ($app->getValues()->users as $user) : ?>
        <li><?= h($user->email); ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>
</html>