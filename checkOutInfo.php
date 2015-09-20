<?php
	if(isset($_GET['idO'])) {
		$id = $_GET['idO'];
		unset($_GET['idO']);
		if(strlen($id) != 18 ) {
			echo "输入18位！！！你家身份证号不是18位啊！！！";
		}
		
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=household', 'root', '123456');
		$queryRes = $pdo->query("select * from resident natural join family where identityId = \"$id\"");
		$row = $queryRes->fetch(PDO::FETCH_ASSOC);

		if($row && $row['relationId'] != 0) {
			echo $row['name']." ".$row['address'];
		}
		else if($row && $row['relationId'] == 0) {
			echo "他就是户主，无法转出";
		}
		else if(strlen($id) == 18) {
			echo "没有没有没有这个人";
		}
	} else if(isset($_GET['idI'])) {
		$id = $_GET['idI'];
		unset($_GET['idI']);
		if(strlen($id) != 18 ) {
			echo "输入18位！！！你家身份证号不是18位啊！！！";
		}
		
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=household', 'root', '123456');
		$queryRes = $pdo->query("select * from resident natural join family where identityId = \"$id\"");
		$row = $queryRes->fetch(PDO::FETCH_ASSOC);

		if($row && $row['relationId'] == 0) {
			echo $row['name']." ".$row['address'];
		}
		else if($row && $row['relationId'] != 0) {
			echo "他并不是户主，无法接收转入";
		}
		else if(strlen($id) == 18) {
			echo "没有没有没有这个人";
		}
	}
	
