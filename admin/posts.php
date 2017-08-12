
<!DOCTYPE html>
<html>
<head>
  <title>Posts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>

<table class="post_table"   bgcolor="#DCDCDC"  >
    <tr bgcolor="#BFBFBF" border = "1" >
      <th>No.</th>
      <th>Body</th>
      <th>Added By</th>
      <th>Date Added</th>
    
      <th>Likes</th>
      <th>Image</th>
      
      
      <th>Delete</th>
     
    </tr>
    
    <?php
    include("connection.php");
    include("include/header.php");
    include("include/js.php");
    include("include/side_bar.php");

    $sel_users = "select * from posts ORDER by 1 DESC";
    $run_users = mysqli_query($connection,$sel_users);
    
    $i=0;
    
    while($row_users = mysqli_fetch_array($run_users)){
      $id = $row_users['id'];
      $body = $row_users['body'];
      $added_by = $row_users['added_by'];
      $date_added = $row_users['date_added'];
      $likes= $row_users['likes'];
      
      $image = $row_users['image'];
      
      $i++;
    ?>
    
    <tr >
    <td width="50px"><?php echo  $i;?></td>
    <td width="200px"><?php echo  $body;?></td>
    <td><?php echo  $added_by;?></td>
    <td ><?php echo  $date_added;?></td>
    <td width="50px"><?php echo  $likes;?></td>
    
    <td><img src="../<?php echo $image;?>" width ='50' 
        height='50'/></td>
    
    <td width="100px"><a href="delete_post.php?delete=<?php echo $id; ?> "> Delete</a></td>
    
    </tr>
    <?php } ?>
</table>
</body>
</html>