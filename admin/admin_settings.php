<?php
	include("connection.php");
    include("include/header.php");
    include("include/js.php");
    include("include/side_bar.php");

    $id="";
	$first_name="";
	$last_name="";
	$username="";
	$email="";
	$student_id="";
	$faculty="";				
										
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Users</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body >
	<div id="main-wrapper">
		<center><h2>Update User</h2></center>
		
		
		<div class="inner_container">
		
			<?php
				if(isset($_POST['fetch_btn'])){
					//echo '<script type="text/javascript">alert("Go button Clicked")</script>';
					
					$id = $_POST['id'];
					
					if($id=="")
					{
						echo '<div class="message"> Enter ID to Find details</div>';
					}
					else
					{
						$query = "select * from users where id=$id";
						$query_run = mysqli_query($connection,$query);
						if($query_run)
						{
							if(mysqli_num_rows($query_run)>0)
							{
								$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
								$id=$row['id'];
								$first_name=$row['first_name'];
								$last_name=$row['last_name'];
								$username=$row['username'];
								$email=$row['email'];
								$student_id=$row['student_id'];
								$faculty=$row['faculty'];
								
							}
							else{
								echo '<div class="message"> Invalid ID</div>';
							}
						}
						else{
							echo '<div class="message">Error in Query</div>';
						}
						
					}
					
				}
			?>
			<div align="center" class="update_info">
			<form action="manage_users.php" method="post">
			
				<label><b>  ID</b></label><button id="btn_go" name="fetch_btn" type="submit" >Go</button>
				
				<input type="text" placeholder="ID" name="id" value="<?php echo $id;?>" > <br>
				<label><b>First Name</b></label>
				<input type="text" placeholder="First Name" name="first_name" value="<?php echo $first_name; ?>"><br>
				<label><b>Last Name</b></label>
				<input type="text" placeholder="Last Name" name="last_name" value="<?php echo $last_name; ?>"><br>
				<label><b>Username</b></label>
				<input type="text" placeholder="UserName" name="username" value="<?php echo $username; ?>"><br>
				<label><b>Email</b></label>
				<input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>"><br>
				<label><b>Student ID</b></label>
				<input type="text" placeholder="Student ID" name="student_id" value="<?php echo $student_id; ?>"><br>
				<label><b>Faculty</b></label>
				<input type="text" placeholder="Faculty" name="faculty" value="<?php echo $faculty; ?>"><br>
				<center>
					
				<button id="btn_update" name="update_btn" type="submit">Update</button>
					
				</center>
			</form>
			
			<?php
			
			 if(isset($_POST['update_btn']))
				{
					//echo '<script type="text/javascript">alert("Update Clicked")</script>';
					if($_POST['id']=="" || $_POST['first_name']=="" || $_POST['last_name']=="" || $_POST['username']=="" || $_POST['email']==""|| $_POST['student_id']=="" || $_POST['faculty']=="")
					{
						echo '<div class="message"> Enter all the fields to update</div>';
					}
					else
					{
						$id=$_POST['id'];
						$first_name=$_POST['first_name'];
						$last_name=$_POST['last_name'];
						$username=$_POST['username'];
						$email=$_POST['email'];
						$student_id=$_POST['student_id'];
						$faculty=$_POST['faculty'];
					
						
						$query = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email',student_id='$student_id', faculty='$faculty' WHERE id=$id";
							
						$query_run = mysqli_query($connection,$query);
				
							if($query_run)
							{
								echo '<div class="message"> Updated Successfully</div>';
							}
							else{
								echo '<div class="message"> Error.Couldnt Update</div>';
							}
						
					}
				}
				
		
			?>
		</div>
	</div>
	</div>
</body>
</html>