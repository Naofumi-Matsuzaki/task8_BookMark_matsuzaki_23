<?php
//必ずsession_startは最初に記述
session_start();
require_once('bm_func.php');

//SESSIONを初期化（空っぽにする）
$_SESSION = array(); // セッションファイルの中身（セッション変数たち）を消去

//Cookieに保存してある"SessionIDの保存期間を過去にして破棄。強制的にクッキーを有効期限切れにする。
if (isset($_COOKIE[session_name()])) { //session_name()は、セッションID名を返す関数
    setcookie(session_name(), '', time()-42000, '/');
}

//サーバ側での、セッションIDの破棄
session_destroy(); // サーバー上でのsession_IDを消去。

//処理後、index.phpへリダイレクト
redirect('bm_login.php');
exit();

?>
