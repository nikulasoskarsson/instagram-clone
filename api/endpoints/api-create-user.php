<?php

require_once(__DIR__ . '/../db/connection.php');

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$time = time();
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$sql = "CALL createUser(:firstName,:lastName,:username,:email,:password,$time,$time)";
$query = $db->prepare($sql);
$query->bindParam(':firstName',$firstName,PDO::PARAM_STR);
$query->bindParam(':lastName',$lastName,PDO::PARAM_STR);
$query->bindParam(':username',$_POST['username'],PDO::PARAM_STR);
$query->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);

$query->execute();

echo 'working';