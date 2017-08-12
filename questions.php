<?php 
include('admin/connection.php');
include("includes/header.php");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  
</head>
<body>
<div class="main">
  <h3 align="center">Questions Collections</h3>
  <table class="adm_table"   >

    <tr bgcolor="#000000" border = "1" >
      <th>No.</th>
      <th> Title</th>
      <th>Details</th>
      <th>Date</th>
      
    </tr>
    
    
    <?php
    

    
    $sel_users = "select * from questions ORDER by 1 DESC";
    $run_users = mysqli_query($con,$sel_users);
    
    $i=0;
    
    while($row_users = mysqli_fetch_array($run_users)){
      
      $question_name = $row_users['question_name'];
      $details = $row_users['details'];
      $question_date = $row_users['question_date'];
      
      $i++;
    ?>
    
    <tr >
    <td><?php echo  $i;?></td>
    <td><?php echo  $question_name;?></td>
    <td><?php echo  "<a href='" . $details . "'>" . $details . "</a>";?></td>
    
    <td><?php echo  $question_date;?></td>
    
    </tr>
    <?php } ?>
</table><br><br>
  </div>
  </body>
  </html>