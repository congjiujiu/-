<?php
/**
 * Created by PhpStorm.
 * User: cong
 * Date: 15/9/8
 * Time: 上午10:07
 */

session_start();
error_log(E_ALL);
ini_set('display_errors', 1);
$userName = $_POST["registerUserName"];
$id_card = $_POST["id_card"];
$email = $_POST["registerEmail"];
$pwd = $_POST["registerPassword"];
$pwd2 = $_POST["registerPassword2"];
$userLevel = 1;

if($userName=="" || $id_card=="" || $email=="" || $pwd=="" || $pwd2=="") {
    $_SESSION["regiter"] = 1;
    header("Location:login.html");
}
elseif($pwd != $pwd2) {
    $_SESSION["regiter"] = 2;
    header("Location:login.html");
}
else {
    $pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=household', 'root', '123456');
    $stmt = $pdo->prepare("insert into users(email,identity_ID,userName,password,userLevel) VALUES (:email,:id,:name,:pwds,:level)");
    $stmt->bindParam(':id',$id_card);
    $stmt->bindParam(':name',$userName);
    $stmt->bindParam(':pwds',$pwdHashed);
    $stmt->bindParam(':level',$userLevel);
    $stmt->bindParam('email',$email);
    $stmt->execute();
    $_SESSION["user"] = $userName;
    header("Location:index.php");
}