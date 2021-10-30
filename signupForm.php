<?php
session_start();
include './lib/Database.php';
$db = new Database();
?>
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if (isset($_POST['signup'])) {

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $address = $_POST['address'];
    $warehouse = $_POST['warehouse'];
    $crop = $_POST['crop'];
    $agriLand = $_POST['agriLand'];

    $query = "SELECT * from farmer where username='$username' and password='$password'";
    $result = $db->select($query);
    if (!$result) {
        
        $query = "INSERT INTO `farmer` (`username`, `password`, `warehouse`, `address`, `cropType`, `agriLand`)"
            . " VALUES ('$username','$password','$warehouse','$address','$crop','$agriLand')";
        $result = $db->insert($query);
        if($result){

            setcookie("username", $username, time() + (86400 * 30));
            setcookie("password", $password, time() + (86400 * 30));

            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
        
            header('location:index.php');
        }        
    } else {
        $_SESSION['message'] = "Farmer already exist!";
        header('location:signup.php');
    }
} else {
    header('location:signup.php');
    $_SESSION['message'] = "Please Login!";
}
?>