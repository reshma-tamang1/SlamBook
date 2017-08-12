<!DOCTYPE html>
<html>
<head>
	<title>Delete Users</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>



<?php
	include("connection.php");
    include("include/header.php");
    include("include/js.php");
    include("include/side_bar.php");

if(isset($_POST['cancel'])) {
	header("Location: users.php");
}

if(isset($_GET['delete'])){
		
		$id = $_GET['delete'];//from url variable
		$delete = "delete from users where id ='$id'";
		$run_delete = mysqli_query($connection,$delete);

}


?>
 <div class="close_account">
	<h3><b>Delete Account</b></h3>

	<h4>Are you sure you want to delete this account?</h4><br><br>
	

	<form action="users.php" method="POST">
		<input type="submit" name="delete" id="delete" value="Yes..I'm Sure">
		<input type="submit" name="cancel" id="cancel" value="No "   >
	</form>

</div>
</body>
</html>