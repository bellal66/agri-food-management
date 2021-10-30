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
if (isset($_POST['login'])) {

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $query = "select * from farmer where username='$username' and password='$password'";
    $result = $db->select($query);
    if (!$result) {
        $_SESSION['message'] = "Login Failed. Farmer not Found!";
        header('location:login.php');
    } else {
        $row = $result->fetch_assoc();

        setcookie("username", $row['username'], time() + (86400 * 30));
        setcookie("password", $row['password'], time() + (86400 * 30));

        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        
        header('location:index.php');
    }
} else {
    header('location:login.php');
    $_SESSION['message'] = "Please Login!";
}
?>