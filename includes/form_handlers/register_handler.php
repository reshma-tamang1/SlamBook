<?php 
//DECLARING VARIABLES
$fname =""; //First name
$lname=""; //Last Name
$em =""; //email
$em2=""; //email2
$stuid =""; //student id
$fac=""; //Faculty
$password=""; //Password
$password2 =""; //password2
$date=""; //signup date
$designation=""; //designation
$gender="";
$error_array=array(); //holds error messages

if(isset($_POST['register_button'])){
	 //Registration form values

	//First name
	$fname= strip_tags($_POST['reg_fname']); //Remove HTML tags
	 $fname = str_replace('', '', $fname); //Remove Spaces
  	$fname = ucfirst(strtolower($fname));	//Upper case first letter
  	$_SESSION['reg_fname'] = $fname; //Stores the first name into session
  //LAst NAme
  	$lname= strip_tags($_POST['reg_lname']); //Remove HTML tags
	 $lname = str_replace('', '', $lname); //Remove Spaces
  	$lname = ucfirst(strtolower($lname));	//Upper case first 
  	$_SESSION['reg_lname'] = $lname;
  	//Email
  	$em= strip_tags($_POST['reg_email']); //Remove HTML tags
	 $em = str_replace('', '', $em); //Remove Spaces
  	$em = ucfirst(strtolower($em));	//Upper case first 
	$_SESSION['reg_email'] = $em;
  	//Email2
  	$em2= strip_tags($_POST['reg_email2']); //Remove HTML tags
	 $em2 = str_replace('', '', $em2); //Remove Spaces
  	$em2 = ucfirst(strtolower($em2));	//Upper case first 
  	$_SESSION['reg_email2'] = $em2;

  	
  	$designation= strip_tags($_POST['designation']); //Remove HTML tags
	 $designation = str_replace('', '', $designation); //Remove Spaces
  	$designation= ucfirst(strtolower($designation));	//Upper case first 
	$_SESSION['designation'] = $designation;
  	
  	$fac= strip_tags($_POST['fac']); //Remove HTML tags
	 $fac = str_replace('', '', $fac); //Remove Spaces
  	$fac= ucfirst(strtolower($fac));	//Upper case first 
	$_SESSION['fac'] = $fac;

    $gender= strip_tags($_POST['gender']); //Remove HTML tags
	 $gender = str_replace('', '', $gender); //Remove Spaces
  	$gender= ucfirst(strtolower($gender));	//Upper case first 
	$_SESSION['gender'] = $gender;
  	//student id
  	$stuid= strip_tags($_POST['reg_sid']); //Remove HTML tags
	 $stuid = str_replace('', '', $stuid); //Remove Spaces
  	$stuid = ucfirst(strtolower($stuid));	//Upper case first 
  	$_SESSION['reg_sid'] = $stuid;
  	
  	//password
  	$password= strip_tags($_POST['reg_password']); //Remove HTML tags
	 
  	//password2
  	$password2= strip_tags($_POST['reg_password2']); //Remove HTML tags
	//date
	$date =date("Y-m-d");//gets current date 


	if ($em==$em2 ) {
		//check if email is invalide
			if (filter_var($em, FILTER_VALIDATE_EMAIL)) {

				$em=filter_var($em, FILTER_VALIDATE_EMAIL);


				//check if email already exists

				$e_check= mysqli_query($con,"SELECT email FROM users WHERE email='$em'");

				//Count number of rows returned
				$num_rows = mysqli_num_rows($e_check);
				if ($num_rows>0) {
					array_push($error_array, "Email Already in use <br>");
					
				}
			}
			else {
				array_push($error_array,"Invalid email Format<br>");
			}

		}
	else {
		array_push($error_array, "Emails Dont Match<br>");
	}

	if (strlen($fname)>25 || strlen($fname)<2) {

		array_push($error_array, "Your first name is insufficient<br>");
			}

	if (strlen($lname)>25 || strlen($lname)<2) {

		array_push($error_array,"Your Last name is insufficient<br>");
			}
			if (strlen($password)>25 || strlen($password)<5) {

		array_push($error_array,"Your Password insufficient, must be between 8 to 25<br>");
			}
	if ($password!=$password2) {

		array_push($error_array, "Your Password Doesnt Match<br>");
		
	}
	else{
		if (!preg_match('/^[a-zA-Z0-9]*$/', $password)) {

			array_push($error_array,"password cannot contain whitespaces,hypens,characters<br>");
		}
	}

	

	if (!preg_match('/^[Kk][Ee][Cc][5-8][0-9][0-9][0-9][0-9]*$/', $stuid)) {
		array_push($error_array, "Your Id is invalid.Please Follow your card pattern.<br>");
	}
	


	if (empty($error_array)) {
		 
		$password= md5($password); //encrypt password

		//Generating username by fname and lname
		$username = strtolower($fname . "_" . $lname);
		$check_username_query = mysqli_query($con ,"SELECT username FROM users WHERE username='$username'");
		$i = 0;
		//if usernname exist add to username

		while (mysqli_num_rows($check_username_query) !=0) {
			$i++; //add 1 to i 
			$username = $username."_". $i;
			$check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
		}

		//Profile Picture assigning
		$rand = rand(1,2); //random number betn 1 and 2
		if ($rand==1) 
		{
			$profile_pic = "assets/images/profile/defaults/head_belize_hole.png";
		}
		
		else if ($rand==2){
			$profile_pic = "assets/images/profile/defaults/head_alizarin.png";
		}
		
		$query = mysqli_query($con,"INSERT INTO users VALUES ('','$fname','$lname','$username','$em','$stuid','$designation','$fac','$gender','$password','$date','$profile_pic','0','0','no',',')");
		array_push($error_array,"<span style ='color: #14C800;'> You're set to go Ahead!! </span><br>");
		//Clear session variables 
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_lname'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";
		
		$_SESSION['reg_sid'] = "";
		$_SESSION['fac'] = "";
		$_SESSION['designation'] = "";
		
	}	
} ?>