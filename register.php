<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to SlamBook</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>

</head>
<body>
<?php  
if(isset($_POST['register_button'])) {
		echo '
		<script>

		$(document).ready(function() {
			$("#first").hide();
			$("#second").show();
		});

		</script>

		';
	}


	?>
	<div class="wrapper"><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

		<div class="login_box">
			<div class="login_header">
			<h1> SlamBook</h1>
			<h2>Where KEC Connects </h2>
			Login or Sign Up below
			
		</div>
		<div id="first">
				<form action="register.php" method="POST">
				<input type="email" name="log_email" placeholder="Email Address" 
			 	required><br>
				<input type="password" name="log_password" placeholder="Password" required><br>
				<?php if (in_array("Email or password was incorrect<br>",$error_array)) {
			 	  	echo "Email or password was incorrect<br>";
			 	  }
			 	 ?>
			 	<input type="Submit" name="login_button" value="Login " required><br>
			 	<a href="#" id="signup" class="signup"> Not registered??Signup here</a>

			</form>

		</div>
		
		<div id="second">
				<form action="register.php" method="POST">
			 	
			 	<input type="text" name="reg_fname" placeholder="First name" value= "<?php
			 	if (isset($_SESSION['reg_fname'])) {
			 	  	echo $_SESSION['reg_fname'];
			 	  }  ?>" required> <br>
			 	  <?php if (in_array("Your first name is insufficient<br>",$error_array)) {
			 	  	echo "Your first name is insufficient<br>";
			 	  } ?>

			 	<input type="text" name="reg_lname" placeholder="Last Name"value= "<?php
			 	if (isset($_SESSION['reg_lname'])) {
			 	  	echo $_SESSION['reg_lname'];
			 	  }  ?>" required><br>
			 	  <?php if (in_array("Your Last name is insufficient<br>",$error_array)) {
			 	  	echo "Your Last name is insufficient<br>";
			 	  } ?>


			 	<input type="email" name="reg_email" placeholder="Email Address" value= "<?php
			 	if (isset($_SESSION['reg_email'])) {
			 	  	echo $_SESSION['reg_email'];
			 	  }  ?>"required> <br>
			 	  <?php if(in_array("Invalid email format<br>", $error_array)){ echo "Invalid email format<br>";} ?>
			 	
			 	<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
					if(isset($_SESSION['reg_email2'])) {
						echo $_SESSION['reg_email2'];
					} 
					?>" required>
					<br>
					<?php if(in_array("Email already in use<br>", $error_array)) {echo "Email already in use<br>"; } 
					 
				     elseif (in_array("Emails don't match<br>", $error_array)) {
				    	echo "Emails don't match<br>";
				    } ?>


			 	<input type="text" name="reg_sid" placeholder="KEC-ID" value= "<?php
			 	if (isset($_SESSION['reg_sid'])) {
			 	  	echo $_SESSION['reg_sid'];
			 	  }  ?>"required><br>
					<?php if (in_array("Your Id is invalid.Please Follow your card pattern.<br>",$error_array)) {
			 	  	echo "Your Id is invalid.Please Follow your card pattern.<br>";
			 	  } ?>
			 	  <div class="input">
			 		I am :<input type="radio" name="designation" value="student" />Student 
                     <input type="radio" name="designation" value="teacher" />Teacher <br/><br>
                    Gender :<input type="radio" name="gender" value="Male" />Male 
                     <input type="radio" name="gender" value="Female" /> Female<br/><br>
					Faculty : <select id="fac" name="fac">                      
                      <option value="not selected">--Select Faculty--</option>
                      <option value="Architecture">Architecture</option>
                      <option value="Civil">Civil</option>
                      <option value="Electrical">Electrical</option>
                        <option value="Computer">Computer</option>
                      <option value="Electronics">Electronics</option>
                    </select><br>

			 	  <?php if (in_array("Email already in use<br>",$error_array)) {
			 	  	echo "Email already in use<br>";
			 	  } ?></div><br>

				<input type="password" name="reg_password" placeholder="Password" required>
					<br>
					<?php   if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";?>
				<input type="password" name="reg_password2" placeholder="Confirm Password" required>
					<br>
				<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>";
					else if(in_array("Your Password insufficient, must be between 8 to 25<br>", $error_array)) echo "Your Password insufficient, must be between 8 to 25<br>";?> 
					
			 	  	

			 	<input type="Submit" name="register_button" value="Register " required><br>

			 	<?php if(in_array("<span style ='color: #14C800;'> You're set to go Ahead!! </span><br>", $error_array))
			 	 echo "<span style ='color: #14C800;'> You're set to go Ahead!! </span><br>"; ?>
			 	 <a href="#" id="signin" class="signin"> Already have Account?Sign In</a>
			 </form>

		</div>
		 
		 </div>
	</div>
</body>
</html>