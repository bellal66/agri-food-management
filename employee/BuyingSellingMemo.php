<?php
session_start();
include '../lib/Database.php';
$db = new Database();
date_default_timezone_set("Asia/Dhaka");
$dt = new DateTime('now');
$dt = $dt->format('d M Y g:i A');

if (isset($_COOKIE['adminPanel'])) {
    $warehouse = $_COOKIE['warehouse'];
} else {
    $warehouse = $_SESSION['warehouse'];
}

$farmerName='';
if(isset($_POST['buyingCrop'])){
  $farmerName = $_POST['farmerName'];
  $address = $_POST['address'];
  $totalAmount = $_POST['totalAmount'];

  $cropName = $_POST['cropName'];
  $quantity = $_POST['quantity'];
  $eachPrice = $_POST['eachPrice'];
  $eachTotalAmount = $_POST['eachTotalAmount'];

  $cropName1 = $_POST['cropName1'];
  $quantity1 = $_POST['quantity1'];
  $eachPrice1 = $_POST['eachPrice1'];
  $eachTotalAmount1 = $_POST['eachTotalAmount1'];

  $cropName2 = $_POST['cropName2'];
  $quantity2 = $_POST['quantity2'];
  $eachPrice2 = $_POST['eachPrice2'];
  $eachTotalAmount2 = $_POST['eachTotalAmount2'];

    $result='';
    if($farmerName != ''){
        $query = "INSERT INTO `warehousedetail`( `warehouse`, `farmer`, `debit`, `date`)"
        . " VALUES ('$warehouse','$farmerName','$totalAmount','$dt')";
        $result = $db->insert($query);
    }
    
    $query = "SELECT * FROM warehoue_debitprofit WHERE warehouse='$warehouse'";
    $result = $db->select($query);
    $resultSaving = $result->fetch_assoc();
    $totalBuyingCrop = $resultSaving['totalBuyingCrop'];
    $totalBuyingCrop += $totalAmount;
    $totalSaveAmount = $resultSaving['totalSaveAmount'];
    $totalSaveAmount -= $totalAmount;
    $query = "UPDATE warehoue_debitprofit SET totalBuyingCrop='$totalBuyingCrop',totalSaveAmount='$totalSaveAmount' WHERE warehouse='$warehouse'";
    $result = $db->update($query);

    $query = "SELECT * FROM debitprofit";
    $result = $db->select($query);
    $resultSaving = $result->fetch_assoc();
    $totalBuyingCrop = $resultSaving['totalBuyingCrop'];
    $totalBuyingCrop += $totalAmount;
    $totalSaveAmount = $resultSaving['totalSaveAmount'];
    $totalSaveAmount -= $totalAmount;
    $query ="UPDATE debitprofit SET totalBuyingCrop='$totalBuyingCrop',totalSaveAmount='$totalSaveAmount'";
    $result = $db->update($query);

  if ($result) {
  	$query = "SELECT * FROM warehousedetail ORDER BY id DESC LIMIT 1";
    $result = $db->select($query);
    $resultBuying = $result->fetch_assoc();

  	if($cropName != ''){
  		$query = "INSERT INTO `warehousedetail2`( `warehousedetailId`, `cropName`, `quantity`, `buyingprice`, `amount`, `date`, `warehouse`)"
        . " VALUES ('$resultBuying[id]','$cropName','$quantity','$eachPrice','$eachTotalAmount','$dt','$warehouse')";
        $result = $db->insert($query);

        $query = "SELECT * FROM monocrop WHERE cropName='$cropName'";
        $result = $db->select($query);
        $resultCrop = $result->fetch_assoc();
        $totalCrop = $resultCrop['totalAmount'];
        $totalCrop += $quantity;

        $query = "UPDATE monocrop SET totalAmount='$totalCrop' WHERE cropName='$cropName'";
        $result = $db->update($query);
  	}
  	if($cropName1 != ''){
  		$query = "INSERT INTO `warehousedetail2`( `warehousedetailId`, `cropName`, `quantity`, `buyingprice`, `amount`, `date`, `warehouse`)"
        . " VALUES ('$resultBuying[id]','$cropName1','$quantity1','$eachPrice1','$eachTotalAmount1','$dt','$warehouse')";
        $result = $db->insert($query);

        $query = "SELECT * FROM monocrop WHERE cropName='$cropName1'";
        $result = $db->select($query);
        $resultCrop = $result->fetch_assoc();
        $totalCrop = $resultCrop['totalAmount'];
        $totalCrop += $quantity1;

        $query = "UPDATE monocrop SET totalAmount='$totalCrop' WHERE cropName='$cropName1'";
        $result = $db->update($query);
  	}
    if($cropName2 != ''){
  		$query = "INSERT INTO `warehousedetail2`( `warehousedetailId`, `cropName`, `quantity`, `buyingprice`, `amount`, `date`, `warehouse`)"
        . " VALUES ('$resultBuying[id]','$cropName2','$quantity2','$eachPrice2','$eachTotalAmount2','$dt','$warehouse')";
        $result = $db->insert($query);

        $query = "SELECT * FROM monocrop WHERE cropName='$cropName2'";
        $result = $db->select($query);
        $resultCrop = $result->fetch_assoc();
        $totalCrop = $resultCrop['totalAmount'];
        $totalCrop += $quantity2;

        $query = "UPDATE monocrop SET totalAmount='$totalCrop' WHERE cropName='$cropName2'";
        $result = $db->update($query);
  	}
  	echo "okk";
  }
}
if(isset($_POST['sellingCrop'])){
  $farmerName = $_POST['farmerName'];
  $address = $_POST['address'];
  $totalAmount = $_POST['totalAmount'];

  $cropName = $_POST['cropName'];
  $quantity = $_POST['quantity'];
  $eachPrice = $_POST['eachPrice'];
  $eachTotalAmount = $_POST['eachTotalAmount'];

  $cropName1 = $_POST['cropName1'];
  $quantity1 = $_POST['quantity1'];
  $eachPrice1 = $_POST['eachPrice1'];
  $eachTotalAmount1 = $_POST['eachTotalAmount1'];

  $cropName2 = $_POST['cropName2'];
  $quantity2 = $_POST['quantity2'];
  $eachPrice2 = $_POST['eachPrice2'];
  $eachTotalAmount2 = $_POST['eachTotalAmount2'];

    $result='';
    if($farmerName != ''){
        $query = "INSERT INTO `warehousedetail`( `warehouse`, `farmer`, `credit`, `date`)"
        . " VALUES ('$warehouse','$farmerName','$totalAmount','$dt')";
        $result = $db->insert($query);
    }
    
    $query = "SELECT * FROM warehoue_debitprofit WHERE warehouse='$warehouse'";
    $result = $db->select($query);
    $resultSaving = $result->fetch_assoc();
    $totalSellingCrop = $resultSaving['totalSellingCrop'];
    $totalSellingCrop += $totalAmount;
    $totalSaveAmount = $resultSaving['totalSaveAmount'];
    $totalSaveAmount += $totalAmount;
    $query = "UPDATE warehoue_debitprofit SET totalSellingCrop='$totalSellingCrop',totalSaveAmount='$totalSaveAmount' WHERE warehouse='$warehouse'";
    $result = $db->update($query);

    $query = "SELECT * FROM debitprofit";
    $result = $db->select($query);
    $resultSaving = $result->fetch_assoc();
    $totalSellingCrop = $resultSaving['totalSellingCrop'];
    $totalSellingCrop += $totalAmount;
    $totalSaveAmount = $resultSaving['totalSaveAmount'];
    $totalSaveAmount += $totalAmount;
    $query ="UPDATE debitprofit SET totalSellingCrop='$totalSellingCrop',totalSaveAmount='$totalSaveAmount'";
    $result = $db->update($query);

  if ($result) {
  	$query = "SELECT * FROM warehousedetail ORDER BY id DESC LIMIT 1";
    $result = $db->select($query);
    $resultBuying = $result->fetch_assoc();

  	if($cropName != ''){
  		$query = "INSERT INTO `warehousedetail2`( `warehousedetailId`, `cropName`, `quantity`, `sellingPrice`, `amount`, `date`, `warehouse`)"
        . " VALUES ('$resultBuying[id]','$cropName','$quantity','$eachPrice','$eachTotalAmount','$dt','$warehouse')";
        $result = $db->insert($query);

        $query = "SELECT * FROM monocrop WHERE cropName='$cropName'";
        $result = $db->select($query);
        $resultCrop = $result->fetch_assoc();
        $totalCrop = $resultCrop['totalAmount'];
        $totalCrop -= $quantity;

        $query = "UPDATE monocrop SET totalAmount='$totalCrop' WHERE cropName='$cropName'";
        $result = $db->update($query);
  	}
  	if($cropName1 != ''){
  		$query = "INSERT INTO `warehousedetail2`( `warehousedetailId`, `cropName`, `quantity`, `sellingPrice`, `amount`, `date`, `warehouse`)"
        . " VALUES ('$resultBuying[id]','$cropName1','$quantity1','$eachPrice1','$eachTotalAmount1','$dt','$warehouse')";
        $result = $db->insert($query);

        $query = "SELECT * FROM monocrop WHERE cropName='$cropName1'";
        $result = $db->select($query);
        $resultCrop = $result->fetch_assoc();
        $totalCrop = $resultCrop['totalAmount'];
        $totalCrop -= $quantity1;

        $query = "UPDATE monocrop SET totalAmount='$totalCrop' WHERE cropName='$cropName1'";
        $result = $db->update($query);
  	}
    if($cropName2 != ''){
  		$query = "INSERT INTO `warehousedetail2`( `warehousedetailId`, `cropName`, `quantity`, `sellingPrice`, `amount`, `date`, `warehouse`)"
        . " VALUES ('$resultBuying[id]','$cropName2','$quantity2','$eachPrice2','$eachTotalAmount2','$dt','$warehouse')";
        $result = $db->insert($query);

        $query = "SELECT * FROM monocrop WHERE cropName='$cropName2'";
        $result = $db->select($query);
        $resultCrop = $result->fetch_assoc();
        $totalCrop = $resultCrop['totalAmount'];
        $totalCrop -= $quantity2;

        $query = "UPDATE monocrop SET totalAmount='$totalCrop' WHERE cropName='$cropName2'";
        $result = $db->update($query);
  	}
  	echo "okk";
  }
}


?>