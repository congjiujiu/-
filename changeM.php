<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 1);

	$name = $_POST['name'];
	$id = $_POST['idc'];
	$sex = 0;
	if($_POST['sex']=="男") {
		$sex = 1;
	}
	$hometown = $_POST['hometown'];
	$marriage = 0;
	if($_POST['marriage']=="是") {
		$marriage = 1;
	}

	$pdo = new PDO('mysql:host=127.0.0.1;dbname=household', 'root', '123456');
	$stmt = $pdo->prepare("UPDATE resident SET name=:nameQ, sex=:sexQ, hometown=:hQ, marraige=:mQ WHERE identityId=:idQ");
	$stmt->bindParam(":nameQ",$name);
	$stmt->bindParam(":sexQ",$sex);
	$stmt->bindParam(":hQ",$hometown);
	$stmt->bindParam(":mQ",$marriage);
	$stmt->bindParam(":idQ",$id);
	$stmt->execute();

	unset($_POST['name']);
	unset($_POST['idc']);
	unset($_POST['sex']);
	unset($_POST['hometown']);
	unset($_POST['marriage']);

	header("Location:changeInfo.php");