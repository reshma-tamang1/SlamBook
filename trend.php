
 <?php
include("includes/header.php");
 
if(isset($_GET['trendingWord'])) {
 $trendingWord = $_GET['trendingWord'];
}
else {
    echo "No trending word passed into the URL.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>


  <div class="trend_panel column" id="post_column">
  <div class="trend_area">
    <h1 align="center">Trending Posts</h1>
          <div class="trend_post ">
          <?php 
          $limit=10;
          $trend = new Post($con, $userLoggedIn);
          $trend->loadPostsTrends($trendingWord,$limit);

          ?>
            
          </div>
  </div>
  </div>
  </body>
</html>