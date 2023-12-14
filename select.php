<?php
//1. DB接続します
function h($str){
    return htmlspecialchars($str,ENT_QUOTES);
  }


try {
    // ID:'root', Password: xamppは 空白 ''
    $pdo = new PDO('mysql:dbname=kadai;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

//2. データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//3. データ表示
$view = "";
if ($status == false) {
    // execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else {
    // Selectデータの数だけ自動でループしてくれる
    // FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= "<p>";
        $view .= h($result["date"]) . " " . h($result["name"]) . " " . h($result["url"]) . " " . h($result["comment"]);
        $view .= "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ブックマークした本の一覧</title>
    <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <?php 
            echo $view; 
            ?>
        </div>
    </div>
    <!-- Main[End] -->
</body>
</html>

