<?php
session_start();
include '../lib/Database.php';
$db = new Database();

if (isset($_COOKIE['adminPanel'])) {
    $warehouse = $_COOKIE['warehouse'];
} else {
    $warehouse = $_SESSION['warehouse'];
}

if(isset($_POST['addCropName'])){
	$cropName = $_POST['addCropName'];
	$description = $_POST['description'];
	$buyingPrice = $_POST['buyingPrice'];
	$sellingPrice = $_POST['sellingPrice'];

	$query = "INSERT INTO `monocrop`( `cropName`, `description`, `buyingPrice`, `sellingPrice`, `areaForFamous`)"
    . " VALUES ('$cropName','$description','$buyingPrice','$sellingPrice','$warehouse')";
    $result = $db->insert($query);
    if($result){
    	echo "okk";
    }
}

?>