<?php

include("connection.php");
error_reporting(0);
if(isset($_POST['submit']))
{
$routine_name=$_POST['routine_name'];
$details=$_POST['details'];
$routine_date=date("Y-m-d H:i:s");



mysqli_query($connection,"insert into routines (routine_id,routine_name,details, routine_date) values ('','$routine_name','$details','$routine_date')") or die ("query incorrect");

 header("location: submit_form.php?success=1");
}else
{}

mysqli_close($connection);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>
<body>
 
   	 <?php include("include/header.php");?>
   	<div class="container-fluid">
	<?php include("include/side_bar.php");?>
    <div class="col-md-9 content" style="margin-left:10px">
  	<div class="panel panel-default">
	<div class="panel-heading" style="background-color:#c4e17f">
	<h1><span class="glyphicon glyphicon-tag"></span> Routines / Add Routine  </h1></div><br>
	<div class="panel-body" style="background-color:#E6EEEE;">
		<div class="col-lg-7">
        <div class="well"  style="color: black;">
        <form action="add_routines.php" method="post" name="form" enctype="multipart/form-data">
        <p>Title</p>
        <textarea class="input-lg thumbnail form-control" type="text" name="routine_name" id="routine_name" autofocus style="width:100%" placeholder="Routine Title" required></textarea>
<p>Description</p>
<textarea class="thumbnail form-control" name="details" id="details" style="width:100%; height:100px" placeholder="write here..." required></textarea>

</div>
        

<div align="center">
    
    <button type="submit" name="submit" id="submit" class="btn btn-success" style="width:150px; height:60px""> Add </button>
    </div>
        </form>
 
	</div>
</div></div></div>
<?php include("include/js.php"); ?>
</body>
</html>