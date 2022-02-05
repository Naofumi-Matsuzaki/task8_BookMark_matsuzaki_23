<?php
// SESSION開始、関数を呼び出す、ログインチェック、セッション変数取得
session_start();
require_once('bm_func.php');
loginCheck();
$uName      = $_SESSION['uName'];
$kanri_flg  = $_SESSION['kanri_flg'];

//1.  DB接続
require_once('bm_func.php');
$pdo = db_conn();

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM bm_user_table");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view='';
if($status==false) {
  sql_error($status);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<tr>";
    $view .= "<td>".$result['uName']."</td>";
    $view .= "<td>".$result['lid']."</td>";
    $view .= "<td>".$result['lpw']."</td>";
    $view .= "<td>".$result['kanri_flg']."</td>";
    $view .= "<td>".$result['life_flg']."</td>";
    $view .= "<td>".$result['indate']."</td>";
    $view .= "<td>";
    $view .= '<a href="u_delete.php?id='.$result["id"].'">[削除]</a>';
    $view .= "</td>";
    $view .= "</tr>";
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザー表示</title>
<link rel="stylesheet" href="./css/style2.css">

</head>
<body>
    <h1>ユーザー表示</h1>
    <header>
        <p><a href="bm_logout.php">ログアウト</a></p>
        <p><a href="master.php">管理者トップページ</a></p>
    </header>
    <p>ようこそ、<?= $uName ?>さん</p>
    <table>
        <tr>
            <th>ユーザー名</th>
            <th>ログインID</th>
            <th>ログインPW</th>
            <th>管理フラグ</th>
            <th>有効フラグ</th>
            <th>登録日</th>
            <th>削除ボタン</th>
        </tr>
        <?=$view?>
    </table>
</body>
</html>
