<?php
	session_start();
	if(isset($_GET['dieId'])) {
		$id = $_GET['dieId'];
		unset($_GET['dieId']);
		if(strlen($id) != 18 ) {
			echo "输入18位！！！你家身份证号不是18位啊！！！";
		}
		
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=household', 'root', '123456');
		$queryRes = $pdo->query("select a.relationId, a.name as name,family.address,b.name as hmaster from resident as a natural join family join resident as b on b.identityId= family.houseHolderId where a.identityId = '$id'");
		$row = $queryRes->fetch(PDO::FETCH_ASSOC);

		if($row && $row['relationId'] != 0) {
			echo "姓名：".$row['name']."\n家庭住址: ".$row['address']."\n户主: ".$row['hmaster'];
			$_SESSION['diePerson']=1;
		}
		else if($row && $row['relationId']==1) {
			echo "此人为户主，无法删除";
			$_SESSION['diePerson']=2;
		}
		else if(strlen($id) == 18) {
			echo "没有没有没有这个人";
			$_SESSION['diePerson']=2;
		}
	}