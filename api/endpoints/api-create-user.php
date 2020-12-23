<?php


require_once(__DIR__ . '/../helpers/helper-api.php');
$HelperAPI = new HelperAPI();

// Validate all the fields
$HelperAPI->validateIssetAndLength('firstName', 2, 20);
$HelperAPI->validateIssetAndLength('lastName', 2, 20);
$HelperAPI->validateIssetAndLength('username', 2, 20);
$HelperAPI->validateIssetAndEmail('email');
$HelperAPI->validateIssetAndSize('dobMonth', 1, 12);
$HelperAPI->validateIssetAndSize('dobYear', 1900, 2010);
$HelperAPI->validateIssetAndSize('dobDay', 1, 31);

$timestampNow = time();

//Format  the input fields to a timestamp
$month = $_POST['dobMonth'];
$year = $_POST['dobYear'];
$day = $_POST['dobDay'];
$dobDate = "$day-$month-$year";
$dobTimestamp = strtotime($dobDate);

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

require_once(__DIR__ . '/../db/connection.php');
$sql = "CALL createUser(:firstName,:lastName,:username,:email,:password,:signupDate,:dateOfBirth)";
$query = $db->prepare($sql);
$query->bindParam(':firstName', $_POST['firstName'], PDO::PARAM_STR);
$query->bindParam(':lastName', $_POST['lastName'], PDO::PARAM_STR);
$query->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
$query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$query->bindParam(':password', $password, PDO::PARAM_STR);
$query->bindParam(':signupDate', $timestampNow, PDO::PARAM_STR);
$query->bindParam(':dateOfBirth', $dobTimestamp, PDO::PARAM_STR);

$query->execute();

$HelperAPI->sendResponse(200, '{"message": "working"}'); // TODO add more informitive message