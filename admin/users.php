
<!DOCTYPE html>
<html>
<head>
  <title>Users</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>
  <div>  
<table class="user_table"   >

    <tr bgcolor="#000000" border = "1" >
      <th>No.</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>UserName</th>
      <th>Email</th>
      <th>Student ID</th>
      <th>Faculty</th>
      <th>Signup Date</th>
      <th>Profile Picture</th>
      <th>Posts</th>
      <th>Likes</th>
    
      <th>Account Closed?</th>
      
      <th>Delete</th>
      <th>Edit</th>
    </tr>
    
    
    <?php
    include("connection.php");
    include("include/header.php");
    include("include/js.php");
    include("include/side_bar.php");

    
    $sel_users = "select * from users ORDER by 1 DESC";
    $run_users = mysqli_query($connection,$sel_users);
    
    $i=0;
    
    while($row_users = mysqli_fetch_array($run_users)){
      $id = $row_users['id'];
      $first_name = $row_users['first_name'];
      $last_name = $row_users['last_name'];
      $username = $row_users['username'];
      $email = $row_users['email'];
      $student_id = $row_users['student_id'];
      $faculty = $row_users['faculty'];
      $signup_date = $row_users['signup_date'];
      $profile_pic = $row_users['profile_pic'];
      $num_posts = $row_users['num_posts'];
      $num_likes = $row_users['num_likes'];
      $user_closed = $row_users['user_closed'];
      $i++;
    ?>
    
    <tr >
    <td><?php echo  $i;?></td>
    <td><?php echo  $first_name;?></td>
    <td><?php echo  $last_name;?></td>
    <td><?php echo  $username;?></td>
    <td><?php echo  $email;?></td>
    <td><?php echo  $student_id;?></td>
    <td><?php echo  $faculty;?></td>
    <td><?php echo  $signup_date;?></td>
    <td><img src="../<?php echo $profile_pic;?>" width ='50' 
        height='50'/></td>
    <td><?php echo  $num_posts;?></td>
    <td><?php echo  $num_likes;?></td>
    <td><?php echo  $user_closed;?></td>
    <td><a href="delete_user.php?delete=<?php echo $id; ?> "> Delete</a></td>
    <td><a href="manage_users.php?user=<?php echo $id; ?>">Edit</a></td>
    </tr>
    <?php } ?>
</table><br><br>
</div>
</body>
</html>