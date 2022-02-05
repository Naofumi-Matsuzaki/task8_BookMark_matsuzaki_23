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
    <title>ユーザー登録</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>ユーザー登録</h1>
    <header>
        <p><a href="bm_logout.php">ログアウト</a></p>
        <p><a href="master.php">管理者トップページ</a></p>
    </header>
    <p>ようこそ、<?= $uName ?>さん</p>
    <form method="post" action="u_insert.php">
        <table>
            <tr>
                <td class="form-title">ユーザー名</td>
                <td><input type="text" name="uName"></td>
            </tr>
            <tr>
                <td class="form-title">ログインID</td>
                <td><input type="text" name="lid"></td>
            </tr>
            <tr>
                <td class="form-title">ログインPW</td>
                <td><input type="text" name="lpw"></td>
            </tr>
            <tr>
                <td class="form-title">管理フラグ</td>
                <td>
                    <input type="radio" name="kanri_flg" value="0">一般ユーザー
                    <input type="radio" name="kanri_flg" value="1">管理者
                </td>
            </tr>
            <tr>
                <td class="form-title">有効フラグ</td>
                <td>
                    <input type="radio" name="life_flg" value="0">有効
                    <input type="radio" name="life_flg" value="1">無効
                </td>
            </tr>
        </table>
        <input class="submit" type="submit" value="送信">
    </form>
</body>
</html>