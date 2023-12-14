<?php

// POSTデータを取得
$name    = $_POST["name"];
$url     = $_POST["url"];
$comment = $_POST["comment"];

// DB接続します
try {
    $pdo = new PDO('mysql:dbname=kadai;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DbConnectError:' . $e->getMessage());
}

// SQL文を用意
$sql = "INSERT INTO gs_bm_table (id, name, url, comment, date) VALUES (NULL, :name, :url, :comment, sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name'   , $name,    PDO::PARAM_STR);
$stmt->bindValue(':url'    , $url,     PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

// SQL実行
$flag = $stmt->execute();

// データ登録処理後
if ($flag === false) {
    // SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
} else {
    // index.phpへリダイレクト
    header("location: index.php");
    exit; // リダイレクト後に余計な処理が実行されないようにする
}
?>
