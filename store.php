<?php

$postData = [];
$postData['tel'] = $_POST['tel'];
$postData['email'] = $_POST['email'];
$postData['name'] = $_POST['name'];
$postData['text'] = $_POST['text'];
$postData['checkbox'] = $_POST['checkbox'];

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