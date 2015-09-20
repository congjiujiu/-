<?php
	$mid = $_GET['id'];

	$pdo = new PDO('mysql:host=127.0.0.1;dbname=household', 'root', '123456');
	$stmt = $pdo->prepare("UPDATE resident SET card = 1 where identityId = :mid");
	$stmt->bindParam(":mid",$mid);
	$stmt->execute();

	header("Location:makeIdcard.php");