<?php
include '../lib/Database.php';
$db = new Database();
date_default_timezone_set("Asia/Dhaka");
$dt = new DateTime('now');
$dt = $dt->format('d M Y g:i A');

if(isset($_POST['exportCrop'])){
  $countryName = $_POST['countryName'];
  $descriptionOfCountry = $_POST['descriptionOfCountry'];
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
    if($countryName != ''){
        $query = "INSERT INTO `abroad`( `countryName`, `description`, `export`, `date`)"
        . " VALUES ('$countryName','$descriptionOfCountry','$totalAmount','$dt')";
        $result = $db->insert($query);
    }

    $query = "SELECT * FROM debitprofit";
    $result = $db->select($query);
    $resultSaving = $result->fetch_assoc();
    $totalExport = $resultSaving['totalExport'];
    $totalExport += $totalAmount;
    $totalSaveAmount = $resultSaving['totalSaveAmount'];
    $totalSaveAmount += $totalAmount;
    $query ="UPDATE debitprofit SET totalExport='$totalExport',totalSaveAmount='$totalSaveAmount'";
    $result = $db->update($query);

  if ($result) {
  	$query = "SELECT * FROM abroad ORDER BY id DESC LIMIT 1";
    $result = $db->select($query);
    $resultBuying = $result->fetch_assoc();

  	if($cropName != ''){
  		$query = "INSERT INTO `abroadsell`( `abroadId`, `cropName`, `quantity`, `price`, `amount`, `date`)"
        . " VALUES ('$resultBuying[id]','$cropName','$quantity','$eachPrice','$eachTotalAmount','$dt')";
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
  		$query = "INSERT INTO `abroadsell`( `abroadId`, `cropName`, `quantity`, `price`, `amount`, `date`)"
        . " VALUES ('$resultBuying[id]','$cropName1','$quantity1','$eachPrice1','$eachTotalAmount1','$dt')";
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
  		$query = "INSERT INTO `abroadsell`( `abroadId`, `cropName`, `quantity`, `price`, `amount`, `date`)"
        . " VALUES ('$resultBuying[id]','$cropName2','$quantity2','$eachPrice2','$eachTotalAmount2','$dt')";
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
if(isset($_POST['importCrop'])){
  $countryName = $_POST['countryName'];
  $descriptionOfCountry = $_POST['descriptionOfCountry'];
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
    if($countryName != ''){
        $query = "INSERT INTO `abroad`( `countryName`, `description`, `import`, `date`)"
        . " VALUES ('$countryName','$descriptionOfCountry','$totalAmount','$dt')";
        $result = $db->insert($query);
    }

    $query = "SELECT * FROM debitprofit";
    $result = $db->select($query);
    $resultSaving = $result->fetch_assoc();
    $totalImport = $resultSaving['totalImport'];
    $totalImport += $totalAmount;
    $totalSaveAmount = $resultSaving['totalSaveAmount'];
    $totalSaveAmount -= $totalAmount;
    $query ="UPDATE debitprofit SET totalImport='$totalImport',totalSaveAmount='$totalSaveAmount'";
    $result = $db->update($query);

  if ($result) {
  	$query = "SELECT * FROM abroad ORDER BY id DESC LIMIT 1";
    $result = $db->select($query);
    $resultBuying = $result->fetch_assoc();

    if($cropName != ''){
      $query = "INSERT INTO `abroadsell`( `abroadId`, `cropName`, `quantity`, `price`, `amount`, `date`)"
        . " VALUES ('$resultBuying[id]','$cropName','$quantity','$eachPrice','$eachTotalAmount','$dt')";
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
      $query = "INSERT INTO `abroadsell`( `abroadId`, `cropName`, `quantity`, `price`, `amount`, `date`)"
        . " VALUES ('$resultBuying[id]','$cropName1','$quantity1','$eachPrice1','$eachTotalAmount1','$dt')";
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
      $query = "INSERT INTO `abroadsell`( `abroadId`, `cropName`, `quantity`, `price`, `amount`, `date`)"
        . " VALUES ('$resultBuying[id]','$cropName2','$quantity2','$eachPrice2','$eachTotalAmount2','$dt')";
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


?>