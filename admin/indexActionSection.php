<?php
include '../lib/Database.php';
$db = new Database();
?>
<?php
if ($_GET['warehouseDelete']) {
    $id = $_GET['warehouseDelete'];
    $query = "DELETE FROM `warehouse` WHERE id='$id'";
    $result = $db->delete($query);
    if ($result) {
        header("location:index.php");
    }
}else if ($_GET['employeeDelete']) {
    $id = $_GET['employeeDelete'];
    $query = "DELETE FROM `employee` WHERE id='$id'";
    $result = $db->delete($query);
    if ($result) {
        header("location:index.php");
    }
}else if ($_GET['cropDelete']) {
    $id = $_GET['cropDelete'];
    $query = "DELETE FROM `monocrop` WHERE id='$id'";
    $result = $db->delete($query);
    if ($result) {
        header("location:index.php");
    }
}
?>