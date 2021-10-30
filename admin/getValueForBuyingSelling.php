<?php
include '../lib/Database.php';
$db = new Database();

if(isset($_POST['cropName'])){
  $data = array();
  $cropName = $_POST['cropName'];
  $query = "SELECT * FROM monocrop WHERE cropName='$cropName'";
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
if(isset($_POST['cropNameSell'])){
  $data = array();
  $cropName = $_POST['cropNameSell'];
  $query = "SELECT * FROM monocrop WHERE cropName='$cropName'";
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
