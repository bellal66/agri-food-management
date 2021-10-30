<?php
include './lib/Database.php';
$db = new Database();
?>
<?php
if (isset($_GET["logout"])) {

    if (isset($_COOKIE["username"]) AND isset($_COOKIE["password"])) {
        setcookie("username", '', time() - (86400 * 30));
        setcookie("password", '', time() - (86400 * 30));
    }
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Agriculture</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<header class="main-header">
		<div class="header-title">
		    <img class="header-title-logo" src="img/leaf.png" width="30px" height="35px">
			<span>E-Agriculture</span>
		</div>
		<div class="header-option">
			<ul>
				<li class="active"><a href="index.php">HOME</a></li>
				<li><a href="assistance.php">ASSISTANCE</a></li>
				<li><a href="contactUs.php">CONTACT US</a></li>
				<?php
				if ((!isset($_COOKIE["username"])) AND ( !isset($_COOKIE["password"]))) {
				?>
				    <li><a href="login.php">LOGIN</a></li>
				    <li><a href="signup.php">SIGNUP</a></li>
				<?php
			    }else{
			    	?>
			    	<li><a href="account.php">ACCOUNT</a></li>
			    	<li><a href="?logout">LOGOUT</a></li>
			    	<?php
			    }
				?>
			</ul>
		</div>
	</header>
