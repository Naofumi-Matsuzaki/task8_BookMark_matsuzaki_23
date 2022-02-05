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
    <h1>ブックマーク登録</h1>
    <header>
        <p><a href="bm_logout.php">ログアウト</a></p>
        <p><a href="master.php">管理者トップページ</a></p>
    </header>
    <p>ようこそ、<?= $uName ?>さん</p>
    <form method="post" action="bm_insert.php">
        <table>
            <tr>
                <td class="form-title">本の名前</td>
                <td><input type="text" name="bookName"></td>
            </tr>
            <tr>
                <td class="form-title">URL</td>
                <td><input type="text" name="bookURL"></td>
            </tr>
            <tr>
                <td class="form-title">コメント</td>
                <td><textArea name="bookComment" rows="4" cols="45"></textArea></td>
            </tr>
        </table>
        <input class="submit" type="submit" value="送信">
        <input type="hidden" name="file" value="bm_register.php">

    </form>
</body>
</html>