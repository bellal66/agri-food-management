<?php
include './lib/Database.php';
$db = new Database();

if(isset($_POST['cropId'])){
  $data = array();
  $cropId = $_POST['cropId'];
  $query = "SELECT * FROM monocrop WHERE id='$cropId'";
  $resultAddres = $db->select($query);
  if ($resultAddres) {
    $resultAddress = $resultAddres->fetch_assoc();
    $data['warehouse'] = $resultAddress['areaForFamous'];
    $data['description'] = $resultAddress['description'];
    $data['sellingPrice'] = $resultAddress['sellingPrice'];
    $data['totalAmount'] = $resultAddress['totalAmount'];
  }else{
    echo "";
  }
  echo json_encode($data);
  header("Content-type: application/json");
}
?>
