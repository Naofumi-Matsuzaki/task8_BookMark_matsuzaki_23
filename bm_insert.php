<?php

// 1. POST送信データを変数で受け取る

$bookName = $_POST['bookName'];
$bookURL = $_POST['bookURL'];
$bookComment = $_POST['bookComment'];


// 2. DB接続
try {
    // $pdo = new PDO('mysql:dbname=gs_task8_bookmark_db;charset=utf8;host=localhost','root','root');
    $pdo = new PDO('mysql:dbname=naoshi_db;charset=utf8;host=mysql57.naoshi.sakura.ne.jp','naoshi','naofumi3512');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

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
//SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
$error = $stmt->errorInfo();
exit("ErrorMassage:".$error[2]);
}else{
// index.phpへリダイレクト
header('Location: index.php'); // : の後に半角スペース必須！
}

?>