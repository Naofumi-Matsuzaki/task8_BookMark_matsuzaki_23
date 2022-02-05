<?php

// GETでid取得
$id = $_GET["id"];

// DB接続
require_once('bm_func.php');
$pdo = db_conn();


// SQL文（DELETE）を準備
$sql = "DELETE FROM bm_user_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ削除処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('u_select.php');
}

?>