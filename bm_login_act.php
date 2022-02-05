<?php
// SESSION Start
session_start();

// POST取得
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

// DB接続
require_once('bm_func.php');
$pdo = db_conn();

// SQL作成・実行
$stmt = $pdo->prepare("SELECT * FROM bm_user_table WHERE lid=:lid");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

// エラー処理
if($status == false){
    sql_error($stmt);
}

// DBデータを取得
$val = $stmt->fetch();

// 該当レコードがあればSESSIONに値を代入
if( password_verify($lpw, $val['lpw']) && $val['kanri_flg']==1){
    $_SESSION['chk_ssid']   = session_id();
    $_SESSION['kanri_flg']  = $val['kanri_flg'];
    $_SESSION['uName']       = $val['uName'];
    redirect('master.php');
} else if( password_verify($lpw, $val['lpw']) ) {
    $_SESSION['chk_ssid']   = session_id();
    $_SESSION['kanri_flg']  = $val['kanri_flg'];
    $_SESSION['uName']       = $val['uName'];
    redirect('user.php');
}
 else {
    redirect('bm_login.php');
}

exit();

?>