<?php
session_start();
//session_regenerate_id(true);
include("connection.php");
$check=0;

if(isset($_POST['submit']))
{
$adminemail = $_POST['admin_email'];
$adminpass = $_POST['admin_pass'];

$query=mysqli_query($connection,"select admin_id from admins where admin_email='$admin_email' and admin_pass='$admin_pass'")or die ("query 1 incorrect.......");

list($user_id)=mysqli_fetch_array($query);

$_SESSION['user_id']=$user_id;
header("location: index.php");

$check=1;

if($check==0)
{
$check=2;
}

mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style/css/bootstrap.min.css">
<title>Admin Login Page</title>
</head>
<body>
<div class="container page-header well" align="center">
<img src="logo.png">
<h1 align="center">Welcome Admin</h1>
<div align="center">
<form action="login.php" method="post" id="login" name="login" enctype="multipart/form-data">
<div class="form-group">
<input type="text" style="font-size:18px; width:200px" class="input-lg" name="user_name" id="user_name" placeholder="Email" required autofocus>
</div>
<div class="form-group">
<input type="password" class="input-lg" name="password" style="font-size:18px; width:200px" id="password" placeholder="Password" required>
 </div>
 <div class="form-group">
<button class="btn btn-large btn-lg btn-success" type="submit" name="submit" id="submit">Log in</button>
</div>

</form>
</div>
</div>
</body>
</html>