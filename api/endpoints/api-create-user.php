<?php


require_once(__DIR__ . '/../helpers/helper-api.php');
$HelperAPI = new HelperAPI();

// Validate all the fields
$HelperAPI->validateIssetAndLength('firstName',2,20);
$HelperAPI->validateIssetAndLength('lastName',2,20);
$HelperAPI->validateIssetAndLength('username',2,20);
$HelperAPI->validateIssetAndEmail('email');
$HelperAPI->validateIssetAndSize('dobMonth', 1 , 12);
$HelperAPI->validateIssetAndSize('dobYear', 1900 , 2010);
$HelperAPI->validateIssetAndSize('dobDay', 1 , 31);

require_once(__DIR__ . '/../db/connection.php');

$time = time();
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$sql = "CALL createUser(:firstName,:lastName,:username,:email,:password,$time,$time)";
$query = $db->prepare($sql);
$query->bindParam(':firstName',$_POST['firstName'],PDO::PARAM_STR);
$query->bindParam(':lastName',$_POST['lastName'],PDO::PARAM_STR);
$query->bindParam(':username',$_POST['username'],PDO::PARAM_STR);
$query->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);

$query->execute();

echo 'working';