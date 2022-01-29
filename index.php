<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブックマーク登録</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <p><a href="bm_select.php">ブックマーク表示画面へ</a></p>
    </header>
    <form method="post" action="bm_insert.php">
        <table>
            <tr>
                <td class="form-title">本の名前</td>
                <td><input type="text" name="bookName"></td>
            </tr>
            <tr>
                <td class="form-title">URL</td>
                <td><input type="text" name="bookURL"></td>
            </tr>
            <tr>
                <td class="form-title">コメント</td>
                <td><textArea name="bookComment" rows="4" cols="45"></textArea></td>
            </tr>
        </table>
        <input class="submit" type="submit" value="送信">
    </form>
</body>
</html>