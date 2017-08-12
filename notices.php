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
<div class="main_column column">
  <h3 align="center">Notices</h3>
  <table class="user_table"   >

    <tr bgcolor="#000000" border = "1" >
      <th>No.</th>
      <th> Name</th>
      <th>Details</th>
      <th>Date</th>
      
    </tr>
    
    
    <?php
    

    
    $sel_users = "select * from notes ORDER by 1 DESC";
    $run_users = mysqli_query($con,$sel_users);
    
    $i=0;
    
    while($row_users = mysqli_fetch_array($run_users)){
      
      $note_name = $row_users['note_name'];
      $details = $row_users['details'];
      $note_date = $row_users['note_date'];
      
      $i++;
    ?>
    
    <tr >
    <td><?php echo  $i;?></td>
    <td><?php echo  $note_name;?></td>
    <td><?php echo  "<a href='" . $details . "'>" . $details . "</a>";?></td>
    
    <td><?php echo  $note_date;?></td>
    
    </tr>
    <?php } ?>
</table><br><br>
  </div>
  </body>
  </html>