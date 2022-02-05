<?php
// GETでid取得
$id = $_GET["id"];


// DB接続
require_once('bm_func.php');
$pdo = db_conn();


// SQL文（SELECT）を準備
$sql = "SELECT * FROM gs_bm_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


// データ表示処理
$row="";
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}

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
    <header>
        <p><a href="bm_select.php">ブックマーク表示画面へ</a></p>
    </header>
    <form method="post" action="bm_update.php">
        <table>
            <tr>
                <td class="form-title">本の名前</td>
                <td><input type="text" name="bookName" value="<?= $row["bookName"]?>"></td>
            </tr>
            <tr>
                <td class="form-title">URL</td>
                <td><input type="text" name="bookURL" value="<?= $row["bookURL"]?>"></td>
            </tr>
            <tr>
                <td class="form-title">コメント</td>
                <td><textArea name="bookComment" rows="4" cols="45"><?= $row["bookComment"]?></textArea></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?= $row["id"]?>">
        <input type="hidden" name="file" value="bm_select.php">
        <input class="submit" type="submit" value="送信">
    </form>
</body>
</html>


