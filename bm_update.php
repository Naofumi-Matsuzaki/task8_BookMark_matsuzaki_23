<?php
// 変数を用意
$id = $_POST["id"];
$bookName = $_POST["bookName"];
$bookURL = $_POST["bookURL"];
$bookComment = $_POST["bookComment"];


// DB接続
require_once('bm_func.php');
$pdo = db_conn();


// SQL文（UPDATE）を用意
$sql = 'UPDATE gs_bm_table SET bookName=:bookName,bookURL=:bookURL,bookComment=:bookComment WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bookName',   $bookName,      PDO::PARAM_STR);
$stmt->bindValue(':bookURL',    $bookURL,       PDO::PARAM_STR);
$stmt->bindValue(':bookComment',$bookComment,   PDO::PARAM_STR);
$stmt->bindValue(':id',         $id,            PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if($status == false) {
    sql_error($stmt);
} else {
    redirect('bm_select.php');
}

?>