<?php

ob_start();
session_start();

//入力値の習得
/*
$name = (string)@$_POST['name']
$name = @$_POST['name'] ??''; //@は、エラーの抑止
$name = (string)filter_input(INPUT_POST,'name');
*/

/*
$name = @$_POST['name'] ??'';
$address = @$_POST['name'] ??'';
$body = @$_POST['name'] ??'';
*/
$params = ['name', 'address', 'body'];
$input_data = []; //入力値保存用
foreach($params as $p){	
	$input_data[$p] = @$_POST[$p] ??'';
} //foreach データ構造の各要素に対して与えられた文の実行を繰り返すというループを記述するための文
var_dump($input_data);

$error_flg = [];
// addressとbodyは必須入力

if('' === $input_data['address']){
	//これがないとエラー
	$error_flg['address_empty'] = 1;
}
if('' === $input_data['body']){
	//これがないとエラー
	$error_flg['body_empty'] = 1;
}

if([] !== $error_flg){

	//form.phpにデータを渡す
	$_SESSION['input'] = $input_data;
	$_SESSION['error'] = $error_flg;
	//エラーが発生した
	header('Location: ./form.php');
	exit;
}

//validate 
//validは妥当な invalidは無効


//DBのINSERT;来週
exit;

header('Location: fin.html');