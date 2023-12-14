<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ブックマークした本</legend>
                <label>タイトル:<input type="text" name="name"></label><br>
                <label>URL:    <input type="text" name="url"></label><br>
                <label>コメント:<textarea name="comment" rows="5" cols="50"></textarea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    </body>
</html>
