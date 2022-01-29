<?php
// XSS対応関数（echoする場所で使用）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

// DB接続関数：db_conn()
function db_conn() {
    try {
        $db_name = "naoshi_db";
        $db_host = "mysql57.naoshi.sakura.ne.jp";
        $db_id   = "naoshi";
        $db_pw   = "naofumi3512";
        $pdo = new PDO('mysql:dbname=' .$db_name. ';charset=utf8;host=' .$db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e){
      exit('DConnetError:'.$e->getMessage());
    }
}

// SQLエラー関数: sql_error($stmt)
function sql_error($stmt) {
    $error = $stmt->errorInfo();
    exit("SQLError:".print_r($error, true));
}

// リダイレクト関数：redirect($file_name)
function redirect($file_name) {
    header("Location: ".$file_name);
    exit();
}

?>