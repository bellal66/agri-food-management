<?php
include '../lib/Database.php';
$db = new Database();
date_default_timezone_set("Asia/Dhaka");
$dt = new DateTime('now');
$dt = $dt->format('d M Y g:i A');


if(isset($_POST['expenseName'])){
	$expenseName = $_POST['expenseName'];
	$description = $_POST['description'];
	$amount = $_POST['amount'];

	$query = "INSERT INTO `expense`( `expanseName`, `description`, `amount`, `date`)"
    . " VALUES ('$expenseName','$description','$amount','$dt')";
    $result = $db->insert($query);

    $query = "SELECT * FROM debitprofit";
    $result = $db->select($query);
    $resultSaving = $result->fetch_assoc();
    $totalExpense = $resultSaving['totalExpense'];
    $totalExpense += $amount;
    $totalSaveAmount = $resultSaving['totalSaveAmount'];
    $totalSaveAmount -= $amount;
    $query ="UPDATE debitprofit SET totalExpense='$totalExpense',totalSaveAmount='$totalSaveAmount'";
    $result = $db->update($query);

    if($result){
    	echo "okk";
    }
}

?>