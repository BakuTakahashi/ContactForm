<?php

$page_flag = 0;

if( !empty($_POST['btn_confirm']) ) {

  $page_flag = 1;
  
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>問い合わせフォーム</title>
  <style rel="stylesheet" type="text/css">

body {
	padding: 20px;
	text-align: center;
  
}

h1,h2 {
	margin-bottom: 20px;
	padding: 20px 0;
	color: #209eff;
	font-size: 122%;
	border-top: 1px solid #999;
	border-bottom: 1px solid #999;
}


input[type=text],textarea {
	padding: 5px 10px;
	font-size: 86%;
	border: none;
	border-radius: 3px;
	background: #ddf0ff;
}

input[name=btn_confirm],
input[name=btn_submit],
input[name=btn_back] {
	margin-top: 10px;
	padding: 5px 20px;
	font-size: 100%;
	color: #fff;
	cursor: pointer;
	border: none;
	border-radius: 3px;
	box-shadow: 0 3px 0 #2887d1;
	background: #4eaaf1;
}

input[name=btn_back] {
	margin-right: 20px;
	box-shadow: 0 3px 0 #777;
	background: #999;
}


.element_wrap {
	margin-bottom: 10px;
	padding: 10px 0;
	border-bottom: 1px solid #ccc;
	text-align: center;
}

label {
	display: inline-block;
	margin-bottom: 10px;
	font-weight: bold;
	width: 150px;
}

.element_wrap p {
	display: inline-block;
	margin:  0;
	text-align: center;
}

</style>
</head>

<body>


<?php if( $page_flag === 1): ?>
<h2>入力内容の確認</h2>

<form method="post" action="insert.php">
	
  <div class="element_wrap">
		<label>氏名</label>
		<p><?php echo $_POST['your_name']; ?></p>
	</div>
	
  <div class="element_wrap">
		<label>メールアドレス</label>
		<p><?php echo $_POST['email']; ?></p>
	</div>

  <div class="element_wrap">
		<label>年齢</label>
		<p><?php echo $_POST['age']; ?></p>
	</div>

  <div class="element_wrap">
		<label>お問い合わせ内容</label>
    <p><?php  echo $_POST['text'];  ?></p>
    
	</div>

	<input type="submit" name="btn_submit" value="送信">
	<input type="hidden" name="your_name" value="<?php echo $_POST['your_name']; ?>">
	<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
  <input type="hidden" name="age" value="<?php echo $_POST['age']; ?>">
  <input type="hidden" name="text" value="<?php echo $_POST['text']; ?>">

</form>



<?php else: ?>
<h1>お問い合わせ</h1>

<form method="post" action="">

	<div class="element_wrap">
		<label>氏名</label>
		<input type="text" name="your_name" value="">
	</div>

	<div class="element_wrap">
		<label>メールアドレス</label>
		<input type="text" name="email" value="">
	</div>

  <div class="element_wrap">
		<label>ご年齢</label>
    <input type="number" name="age" value="" min="10">

	</div>

	</div>

  <div class="element_wrap">
		<label>お問い合わせ内容</label>
    <textarea type="text" name="text" cols="30" rows="10" value=""></textarea>

	</div>

	<input type="submit" name="btn_confirm" value="入力内容を確認する">
</form>

<?php endif; ?>

</body>
</html>




