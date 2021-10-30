<?php
include '../lib/Database.php';
$db = new Database();
date_default_timezone_set("Asia/Dhaka");
$dt = new DateTime('now');
$dt = $dt->format('d M Y g:i A');

if(isset($_POST['answer'])){
  $answer = $_POST['answer'];
  $questionId = $_POST['questionId'];
  $query = "INSERT INTO `inputtingproblem`( `answer`, `questionId`, `date`, `answerType`, `seen`)"
    . " VALUES ('$answer','$questionId','$dt','1','1')";
  $result = $db->insert($query);
  $query = "UPDATE `inputtingproblem` SET seen=1 WHERE id='$questionId'";
  $result = $db->update($query);
}

?>