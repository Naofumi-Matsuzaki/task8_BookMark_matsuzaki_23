<?php

// 1. POST送信データを変数で受け取る

$bookName = $_POST['bookName'];
$bookURL = $_POST['bookURL'];
$bookComment = $_POST['bookComment'];
$file = $_POST['file'];

// 2. DB接続
require_once('bm_func.php');
$pdo = db_conn();


// 3. SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
    "INSERT INTO gs_bm_table(id,bookName,bookURL,bookComment,indate)
    VALUES( NULL, :bookName, :bookURL, :bookComment, sysdate() )"
);
  
// 4. バインド変数を用意
$stmt->bindValue(':bookName', $bookName, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookURL', $bookURL, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookComment', $bookComment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
// 元のページへリダイレクト
  redirect($file);
}

?>