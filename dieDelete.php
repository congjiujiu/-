<?php
	$id = $_POST['dieId'];
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=household', 'root', '123456');
	$stmt = $pdo->prepare("DELETE FROM resident where identityId = :dieId");
	$stmt->bindParam(":dieId",$id);
	$stmt->execute();

	header("Location:die.php");