<?php
// SESSION開始、関数を呼び出す、ログインチェック、セッション変数取得
session_start();
require_once('bm_func.php');
loginCheck();
$uName      = $_SESSION['uName'];
$kanri_flg  = $_SESSION['kanri_flg'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブックマーク登録</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>管理者トップページ</h1>
    <header>
        <p><a href="bm_logout.php">ログアウト</a></p>
        <p><a href="u_register.php">ユーザー登録</a></p>
        <p><a href="u_select.php">ユーザー一覧表示</a></p>
        <p><a href="bm_register.php">ブックマーク登録</a></p>
        <p><a href="bm_select.php">ブックマーク表示</a></p>
    </header>
    <p>ようこそ、<?= $uName ?>さん</p>
</body>
</html>