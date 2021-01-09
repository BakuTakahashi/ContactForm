  <?php

require_once('funcs.php');

try {
  $pdo = new PDO('mysql:dbname=results_db;charset=utf8;host=localhost', 'root', 'root'); 
} catch (PDOException $e) {
  exit('DBConnectError:' . $e->getMessage());
}

$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

$view="";

if ($status == false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>'.h($result['name']).' / '.h($result['email']).' / '.h($result['age']).' / '.h($result['text']).'<p>';
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">

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

</head>

<body id="main">
<header>
<h1>データ登録</h1>
</header>
<div>
    <div class="container jumbotron"><?=  $view ?></div>
</div>

</body>
</html>
