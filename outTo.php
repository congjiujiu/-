<?php
	session_start();
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
	$outId = $_POST['outId'];
	$intoId = $_POST['outHolder'];

	$pdo = new PDO('mysql:host=127.0.0.1;dbname=household', 'root', '123456');
	$stmt = $pdo->query("SELECT * FROM family where houseHolderId = '$intoId' ");
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$intoFamilyId = $row['familyId'];

	$stmt = $pdo->prepare("UPDATE resident SET familyId = :fId where identityId= :oId");
	$stmt->bindParam(':fId',$intoFamilyId);
	$stmt->bindParam(':oId',$outId);
	$stmt->execute();

	header("Location:out.php");
