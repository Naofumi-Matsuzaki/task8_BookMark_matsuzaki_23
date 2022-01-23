<?php
//1.  DB接続
try {
  // $pdo = new PDO('mysql:dbname=gs_task8_bookmark_db;charset=utf8;host=localhost','root','root');
  $pdo = new PDO('mysql:dbname=naoshi_db;charset=utf8;host=mysql57.naoshi.sakura.ne.jp','naoshi','naofumi3512');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view='';
if($status==false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
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
  <style>
    body{
      text-align: center;
      font-size: 16px;
    }
    header{
      padding: 30px 0;
      background: linear-gradient(to top left, black,green);
    }
    a{
      color: white;
      font-weight : bold;
      font-size: 24px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid black;
      margin : 30px 0;
    }
    th {
      color:white;
      background: linear-gradient(to top left, black,green);
      padding: 10px 3px;
    }
    td{
      border: 0.1px dotted green;
      padding: 5px 3px;
    }
    p{
      margin: auto;
    }
  </style>
</head>
<body>
<header>
  <p><a href="index.php">データ登録画面へ</a></p>
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
