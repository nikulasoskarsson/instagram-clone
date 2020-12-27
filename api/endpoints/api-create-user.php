<?php
header('Access-Control-Allow-Origin: *');  // TODO remove and find a propper fix

$json = json_decode(file_get_contents('php://input'));



require_once(__DIR__ . '/../helpers/helper-api.php');
$HelperAPI = new HelperAPI();

// TODO redo validation helper methods and uncomment
// $HelperAPI->validateIssetAndLength($json->firstName, 2, 20);
// $HelperAPI->validateIssetAndLength($json->lastName, 2, 20);
// $HelperAPI->validateIssetAndLength($json->username, 2, 20);
// $HelperAPI->validateIssetAndEmail($json->email);
// $HelperAPI->validateIssetAndSize($json->dobMonth, 1, 12);
// $HelperAPI->validateIssetAndSize($json->dobYear, 1900, 2010);
// $HelperAPI->validateIssetAndSize($json->dobDay, 1, 31);

$timestampNow = time();

//Format  the input fields to a timestamp
$month = $json->dobMonth;
$year = $json->dobYear;
$day = $json->dobDay;
$dobDate = "$day-$month-$year";
$dobTimestamp = strtotime($dobDate);

$password = password_hash($json->password, PASSWORD_DEFAULT);

require_once(__DIR__ . '/../db/connection.php');
$sql = "CALL createUser(:firstName,:lastName,:username,:email,:password,:signupDate,:dateOfBirth)";
$query = $db->prepare($sql);
$query->bindParam(':firstName', $json->firstName, PDO::PARAM_STR);
$query->bindParam(':lastName', $json->lastName, PDO::PARAM_STR);
$query->bindParam(':username', $json->username, PDO::PARAM_STR);
$query->bindParam(':email', $json->email, PDO::PARAM_STR);
$query->bindParam(':password', $password, PDO::PARAM_STR);
$query->bindParam(':signupDate', $timestampNow, PDO::PARAM_STR);
$query->bindParam(':dateOfBirth', $dobTimestamp, PDO::PARAM_STR);

$query->execute();

$HelperAPI->sendResponse(200, '{"message": "working"}'); // TODO add more informitive message