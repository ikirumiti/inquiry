<?php

ob_start();
session_start();

//���͒l�̏K��
/*
$name = (string)@$_POST['name']
$name = @$_POST['name'] ??''; //@�́A�G���[�̗}�~
$name = (string)filter_input(INPUT_POST,'name');
*/

/*
$name = @$_POST['name'] ??'';
$address = @$_POST['name'] ??'';
$body = @$_POST['name'] ??'';
*/
$params = ['name', 'address', 'body'];
$input_data = []; //���͒l�ۑ��p
foreach($params as $p){	
	$input_data[$p] = @$_POST[$p] ??'';
} //foreach �f�[�^�\���̊e�v�f�ɑ΂��ė^����ꂽ���̎��s���J��Ԃ��Ƃ������[�v���L�q���邽�߂̕�
var_dump($input_data);

$error_flg = [];
// address��body�͕K�{����

if('' === $input_data['address']){
	//���ꂪ�Ȃ��ƃG���[
	$error_flg['address_empty'] = 1;
}
if('' === $input_data['body']){
	//���ꂪ�Ȃ��ƃG���[
	$error_flg['body_empty'] = 1;
}

if([] !== $error_flg){

	//form.php�Ƀf�[�^��n��
	$_SESSION['input'] = $input_data;
	$_SESSION['error'] = $error_flg;
	//�G���[����������
	header('Location: ./form.php');
	exit;
}

//validate 
//valid�͑Ó��� invalid�͖���


//DB��INSERT;���T
exit;

header('Location: fin.html');