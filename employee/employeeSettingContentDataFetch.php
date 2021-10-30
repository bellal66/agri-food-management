<?php
session_start();
include '../lib/Database.php';
$db = new Database();

if (isset($_POST['mymensingh_id_for_active'])) {
    $match_id = $_POST['mymensingh_id_for_active'];
    $query = "update `workstation` set mymensingh='1' WHERE id='$match_id'";
    $result = $db->update($query);

} else if (isset($_POST['mymensingh_id_for_inactive'])) {
    $match_id = $_POST['mymensingh_id_for_inactive'];
    $query = "update `workstation` set mymensingh='0' WHERE id='$match_id'";
    $result = $db->update($query);

}if (isset($_POST['dhaka_id_for_active'])) {
    $match_id = $_POST['dhaka_id_for_active'];
    $query = "update `workstation` set dhaka='1' WHERE id='$match_id'";
    $result = $db->update($query);

} else if (isset($_POST['dhaka_id_for_inactive'])) {
    $match_id = $_POST['dhaka_id_for_inactive'];
    $query = "update `workstation` set dhaka='0' WHERE id='$match_id'";
    $result = $db->update($query);

}if (isset($_POST['rajshahi_id_for_active'])) {
    $match_id = $_POST['rajshahi_id_for_active'];
    $query = "update `workstation` set `rajshahi`='1' WHERE id='$match_id'";
    $result = $db->update($query);

} else if (isset($_POST['rajshahi_id_for_inactive'])) {
    $match_id = $_POST['rajshahi_id_for_inactive'];
    $query = "update `workstation` set `rajshahi`='0' WHERE id='$match_id'";
    $result = $db->update($query);

}if (isset($_POST['rangpur_id_for_active'])) {
    $match_id = $_POST['rangpur_id_for_active'];
    $query = "update `workstation` set `rangpur`='1' WHERE id='$match_id'";
    $result = $db->update($query);

} else if (isset($_POST['rangpur_id_for_inactive'])) {
    $match_id = $_POST['rangpur_id_for_inactive'];
    $query = "update `workstation` set `rangpur`='0' WHERE id='$match_id'";
    $result = $db->update($query);

}if (isset($_POST['sylhet_id_for_active'])) {
    $match_id = $_POST['sylhet_id_for_active'];
    $query = "update `workstation` set sylhet='1' WHERE id='$match_id'";
    $result = $db->update($query);

} else if (isset($_POST['sylhet_id_for_inactive'])) {
    $match_id = $_POST['sylhet_id_for_inactive'];
    $query = "update `workstation` set sylhet='0' WHERE id='$match_id'";
    $result = $db->update($query);

}if (isset($_POST['khulna_id_for_active'])) {
    $match_id = $_POST['khulna_id_for_active'];
    $query = "update `workstation` set `khulna`='1' WHERE id='$match_id'";
    $result = $db->update($query);

} else if (isset($_POST['khulna_id_for_inactive'])) {
    $match_id = $_POST['khulna_id_for_inactive'];
    $query = "update `workstation` set `khulna`='0' WHERE id='$match_id'";
    $result = $db->update($query);

}if (isset($_POST['barisal_id_for_active'])) {
    $match_id = $_POST['barisal_id_for_active'];
    $query = "update `workstation` set `barisal`='1' WHERE id='$match_id'";
    $result = $db->update($query);

} else if (isset($_POST['barisal_id_for_inactive'])) {
    $match_id = $_POST['barisal_id_for_inactive'];
    $query = "update `workstation` set `barisal`='0' WHERE id='$match_id'";
    $result = $db->update($query);

}if (isset($_POST['chittagong_id_for_active'])) {
    $match_id = $_POST['chittagong_id_for_active'];
    $query = "update `workstation` set `chittagong`='1' WHERE id='$match_id'";
    $result = $db->update($query);

} else if (isset($_POST['chittagong_id_for_inactive'])) {
    $match_id = $_POST['chittagong_id_for_inactive'];
    $query = "update `workstation` set `chittagong`='0' WHERE id='$match_id'";
    $result = $db->update($query);

}

?>