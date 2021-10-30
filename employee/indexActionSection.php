<?php
include '../lib/Database.php';
$db = new Database();
?>
<?php
if ($_GET['wholesallerDelete']) {
    $id = $_GET['wholesallerDelete'];
    $query = "DELETE FROM `wholesaller` WHERE id='$id'";
    $result = $db->delete($query);
    if ($result) {
        header("location:index.php");
    }
}
?>