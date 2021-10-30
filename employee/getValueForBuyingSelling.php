<?php
session_start();
include '../lib/Database.php';
$db = new Database();
if (isset($_COOKIE['adminPanel'])) {
    $warehouse = $_COOKIE['warehouse'];
} else {
    $warehouse = $_SESSION['warehouse'];
}

if(isset($_POST['farmerName'])){
  $farmerName = $_POST['farmerName'];
  $query = "SELECT * FROM farmer WHERE username='$farmerName'";
  $resultAddress = $db->select($query);
  if ($resultAddress) {
    $resultAddress = $resultAddress->fetch_assoc();
      echo $resultAddress['address'];
  }else{
    echo "";
  }
}
if(isset($_POST['cropName'])){
  $data = array();
  $cropName = $_POST['cropName'];
  $query = "SELECT * FROM monocrop WHERE cropName='$cropName' and areaForFamous='$warehouse'";
  $resultAddress = $db->select($query);
  if ($resultAddress) {
    $resultAddress = $resultAddress->fetch_assoc();
    $data['description'] = $resultAddress['description'];
    $data['areaForFamous'] = $resultAddress['areaForFamous'];
    $data['buyingPrice'] = $resultAddress['buyingPrice'];
    $data['totalAmount'] = $resultAddress['totalAmount'];
  }else{
    echo "";
  }
  echo json_encode($data);
  header("Content-type: application/json");
}
if(isset($_POST['cropNameSell'])){
  $data = array();
  $cropName = $_POST['cropNameSell'];
  $query = "SELECT * FROM monocrop WHERE cropName='$cropName' and areaForFamous='$warehouse'";
  $resultAddress = $db->select($query);
  if ($resultAddress) {
    $resultAddress = $resultAddress->fetch_assoc();
    $data['description'] = $resultAddress['description'];
    $data['areaForFamous'] = $resultAddress['areaForFamous'];
    $data['sellingPrice'] = $resultAddress['sellingPrice'];
    $data['totalAmount'] = $resultAddress['totalAmount'];
  }else{
    echo "";
  }
  echo json_encode($data);
  header("Content-type: application/json");
}
?>
