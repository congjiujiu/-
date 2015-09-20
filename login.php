<?php
/**
 * Created by PhpStorm.
 * User: cong
 * Date: 15/9/8
 * Time: 上午10:03
 */
error_log(E_ALL);
ini_set('display_errors', 1);
session_start();

$mail = $_POST["loginEmail"];
$pwd = $_POST["loginPassword"];

$pdo = new PDO('mysql:host=127.0.0.1;dbname=household', 'root', '123456');
$queryRes = $pdo->query("select * from users where email = \"$mail\"");
$row = $queryRes->fetch(PDO::FETCH_ASSOC);

if(password_verify($pwd,$row["password"])) {
    $_SESSION["user"] = $row["userName"];
    $_SESSION['email'] = $mail;
    header("Location:index.php");
}
else {
    header("Location:login.php");
}