<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$postData = [];

//validate tel
if(!isset($_POST['tel'])){
  echo "Tel required";
  die;  
}

$phoneNumber = trim($_POST['tel']);
$phoneNumberLengthString = str_replace(["+", "-"], ["", ""], $_POST['tel']);
echo strlen($phoneNumberLengthString);
// check if the number quantity is Russian number digits quantity
if(strlen($phoneNumberLengthString) != 11){
  echo "Invalid phone format";
  die;
}
$phoneNumber = trim($phoneNumber);
preg_match("/(\+\d\-[0-9+]{3}\-[0-9+]{3}\-[0-9+]{2}\-[0-9+]{2})|(\+\d\-[0-9+]{3}\-[0-9+]{3}\-[0-9+]{4})|(\+\d\-[0-9+]{3}\-[0-9+]{7})|(\+\d\-[0-9+]{3}\-[0-9+]{7})/s", $phoneNumber, $phoneMatches);
print_r($phoneMatches);
if (!in_array($phoneNumber, $phoneMatches)) {
  echo "Invalid phone format";
  die;
} 

$postData['tel'] = $phoneNumberLengthString;


//validate email
if (!isset($_POST['email'])) {
  echo "Email required";
  die;  
}
$emailString =  trim($_POST['email']);
if (!filter_var($emailString, FILTER_VALIDATE_EMAIL)) {
  echo "Invalid email format";
  die;
}
$postData['email'] = $emailString;

// validate name
if (!isset($_POST['name'])) {
  echo "Name required";
  die;
}
$nameString = $_POST['name'];
echo strlen($nameString);
if(strlen($nameString) < 2 || strlen($nameString) > 200){
  echo "Name must have chararacters in range of 2-200";
  die;
}
if(!ctype_alpha($nameString)){
  echo "Name must be alphabetic";
  die;
}
$postData['name'] = $nameString;

// validate text
if (!isset($_POST['text'])) {
  echo "Text required";
  die;
}
$postData['text'] = $_POST['text'];


if (isset($_POST['checkbox'])) {
  $boolValidationOptions = [0, 1, false, true, null];
  if (!in_array($_POST['checkbox'], $boolValidationOptions)) {
    echo "checkbox must be boolean";
    die;
  }

  $postData['checkbox'] = $_POST['checkbox'];
}else{
  $postData['checkbox'] = null;
}

// validate


$db_name = "test_task";
$user = "root";
$password = "19981965aBc";
try {
  
  $dbh = new PDO('mysql:host=localhost;dbname=' . $db_name, $user, $password);

} catch (PDOException $e) {
  echo $e->getMessage();
}


$sql = "INSERT INTO `php_users` (`tel`, `email`, `name`, `text`, `checkbox`) VALUES (:phone, :email, :name_value, :text_value, :checkbox)";

$stmt = $dbh->prepare($sql);

print_r($postData);
try {
  
  $stmt->bindValue(':phone', $postData['tel'], PDO::PARAM_STR);
  $stmt->bindValue(':email', $postData['email'], PDO::PARAM_STR);
  $stmt->bindValue(':name_value', $postData['name'], PDO::PARAM_STR);
  $stmt->bindValue(':text_value', $postData['text'], PDO::PARAM_STR);
  $stmt->bindValue(':checkbox', $postData['checkbox'], PDO::PARAM_BOOL);

  $stmt->execute();
  $fetchedData = $stmt->fetchAll();

} catch (PDOException $e) {
  echo $e->getMessage();
}


print_r($fetchedData);