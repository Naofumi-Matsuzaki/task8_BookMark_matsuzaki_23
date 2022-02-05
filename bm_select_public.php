<?php
// 関数を呼び出す
require_once('bm_func.php');

// DB接続
$pdo = db_conn();

// SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");

// 実行
$status = $stmt->execute();

//4．データ表示
$view='';
if($status==false) {
  sql_error($status);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<tr>";
    $view .= "<td>".$result['indate']."</td>";
    $view .= "<td>".$result['bookName']."</td>";
    $view .= "<td>".$result['bookURL']."</td>";
    $view .= "<td>".$result['bookComment']."</td>";
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
<title>ブックマーク表示</title>
<link rel="stylesheet" href="./css/style2.css">

</head>
<body>
<h1>ブックマーク表示</h1>
<header>
  <p><a href="bm_login.php">トップページ</a></p>
</header>

<table>
    <tr>
        <th>登録日</th>
        <th>本の名前</th>
        <th>URL</th>
        <th>コメント</th>
    </tr>
    <?=$view?>
</table>
</body>
</html>
