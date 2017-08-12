<?php
include("includes/header.php");
?>
 
<div class="profile_main_column column" >
 <h2>Friend List</h2>
    <?php
    $user_obj = new User($con, $userLoggedIn);
 	foreach($user_obj->getFriendsArray() as $friend) {
    $friend_obj = new User($con, $friend);
    
    echo "<a href='$friend'>
            <img class='profilePicSmall' src='" . $friend_obj->getProfilePic() ."'>"
             . $friend_obj->getFirstAndLastName() . 
         "</a> 
         <br><br>"
         ;
         
}

  
    ?>
 
</div>
<style type="text/css">
@font-face{
    font-family: 'Bellota-LightItalic';
    src:url('../fonts/Bellota-LightItalic.otf');
}
@font-face{
    font-family: 'Bellota-BoldItalic';
    src:url('../fonts/Bellota-BoldItalic.otf');
}
	 	img.profilePicSmall {
    height: 80px;
    width: 80px;
    border-radius: 15px;
    margin: 5px; 
}
 h2{
    color: #060203;
   font-family: 'Bellota-BoldItalic', sans-serif;
 }

</style>