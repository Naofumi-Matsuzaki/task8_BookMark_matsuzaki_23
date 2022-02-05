<?php

// 1. POST送信データを変数で受け取る
$uName = $_POST['uName'];
$lid = $_POST['lid'];
$lpw = password_hash($_POST['lpw'], PASSWORD_DEFAULT); // パスワードはhash化してDBへ格納
$kanri_flg = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];

// 2. DB接続
require_once('bm_func.php');
$pdo = db_conn();

// 3. SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
    "INSERT INTO bm_user_table(id, uName, lid, lpw, kanri_flg, life_flg, indate)
    VALUES( NULL, :uName, :lid, :lpw, :kanri_flg, :life_flg, sysdate() )"
);

// 4. バインド変数を用意
$stmt->bindValue(':uName',      $uName,     PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid',        $lid,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw',        $lpw,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg',  $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg',   $life_flg,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
// index.phpへリダイレクト
  redirect('u_register.php');
}

?>