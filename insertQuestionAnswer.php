<?php
include './lib/Database.php';
$db = new Database();
date_default_timezone_set("Asia/Dhaka");
$dt = new DateTime('now');
$dt = $dt->format('d M Y g:i A');

if(isset($_POST['question'])){
  $question = $_POST['question'];
  $query = "INSERT INTO `inputtingproblem`( `question`, `date`)"
    . " VALUES ('$question','$dt')";
  $result = $db->insert($query);
}
if(isset($_POST['answer'])){
  $answer = $_POST['answer'];
  $questionId = $_POST['questionId'];
  $query = "INSERT INTO `inputtingproblem`( `answer`, `questionId`, `date`)"
    . " VALUES ('$answer','$questionId','$dt')";
  $result = $db->insert($query);
}

?>