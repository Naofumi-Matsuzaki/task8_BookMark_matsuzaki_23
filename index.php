<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブックマーク登録</title>
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
            margin: 30px 0;
        }
        .form-title {
            color:white;
            font-weight : bold;
            background: linear-gradient(to top left, black,green);
            padding: 10px 3px;
            width : 240px;
        }
        td{
            border: 0.1px dotted green;
        }
        td>input, textArea{
            font-size: 16px;
            width : 90%;
            height : 100%;
            vertical-align: middle;
            margin : 10px auto;
        }
        p{
            margin: auto;
        }
    </style>
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