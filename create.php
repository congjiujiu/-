<?php
	session_start();
	error_log(E_ALL);
	ini_set('display_errors', 1);
	$name = $_POST['name'];
	$birth = $_POST['birth'];
	$sex = 0;
	if($_POST['sex']=="男") {
		$sex = 1;
	}
	$hometown = $_POST['hometown'];
	$hid = $_POST['homeId'];

	$birth=str_replace("/","",$birth);
	$ra = "324124".$birth.rand(1000,9999);
	$marriage = 0;
	$relationId = 1;
	$card = 0;

	$pdo = new PDO('mysql:host=127.0.0.1;dbname=household', 'root', '123456');
	$stmt = $pdo->query("select familyId from family where houseHolderId = '$hid'");
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$fmid = $row['familyId'];

	$email = $_SESSION['email'];
	$stmt = $pdo->query("select region from users where email = '$email'");
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$region = $row['region'];

	$stmt = $pdo->prepare("INSERT INTO resident (identityId,name,sex,hometown,marraige,familyId,relationId,region,card) VALUES (:id,:n,:s,:home,:ma,:fid,:rid,:re,:ca)");
	$stmt->bindParam(":id",$ra);
	$stmt->bindParam(":n",$name);
	$stmt->bindParam(":s",$sex);
	$stmt->bindParam(":home",$hometown);
	$stmt->bindParam(":ma",$marriage);
	$stmt->bindParam(":fid",$fmid);
	$stmt->bindParam(":rid",$relationId);
	$stmt->bindParam(":re",$region);
	$stmt->bindParam(":ca",$card);

	$stmt->execute();

	header("Location:createperson.php");
