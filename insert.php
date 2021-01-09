<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style rel="stylesheet" type="text/css">
  
  body {
    padding: 20px;
    text-align: center;
  }

  h1 {
    margin-bottom: 20px;
    padding: 20px 0;
    color: #209eff;
    font-size: 122%;
    border-top: 1px solid #999;
    border-bottom: 1px solid #999;
  }

  </style>

  <title>送信完了ページ</title>
</head>
<body>

<h1>送信が完了しました。</h1>
  
</body>
</html>



<?php


$name = $_POST['your_name'];
$email = $_POST['email'];
$age = $_POST['age'];
$text = $_POST['text'];

$name = htmlspecialchars($name, ENT_QUOTES);
$email = htmlspecialchars($email, ENT_QUOTES);
$age = htmlspecialchars($age, ENT_QUOTES);
$text = htmlspecialchars($text, ENT_QUOTES);


//DB接続
try {
    $pdo = new PDO('mysql:dbname=results_db;charset=utf8;host=localhost', 'root', 'root'); 
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

//データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, name, email, age, text, indate)VALUES(NULL, :name, :email, :age, :text, sysdate())");
//  2. バインド変数
$stmt->bindValue(':name', $name, PDO::PARAM_STR); 
$stmt->bindValue(':email', $email, PDO::PARAM_STR); 
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':text', $text, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();
