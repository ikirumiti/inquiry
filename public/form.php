<?php
//下にhtml要素があるので下にやむえずつける
ob_start();
session_start();

var_dump($_SESSION);

//入力用のデータ取得
if( isset($_SESSION['input'])){
	$input_data = $_SESSION['input'];
	unset($_SESSION['input']); 
}

//エラー用のデータ取得
if( isset($_SESSION['error'])){
	$error = $_SESSION['error'];
	unset($_SESSION['error']); 
}
function h($s){
	return htmlspecialchars($s, ENT_QUOTES);
}
?>
<form action= "./input.php" method="post">
<h1>お問い合わせフォーム</h1>

<?php
if (true === isset($error['address_empty'])){
	echo '連絡先は必須入力です。<br>';
}

if(true === isset($error['body_empty'])){
	echo 'お問い合わせは必須入力です。<br>';
}
?>
名前(email):<input name="name" value="<?php echo h(@$input_data['name']);?>"><br>
連絡先(email):<input name="address" value="<?php echo h(@$input_data['address']);?>"><br>
お問い合わせ内容
<textarea name="body"><?php echo h(@$input_data['body']);?></textarea><br>
<button type="submit">問い合わせる</button>
</form>