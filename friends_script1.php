<?php

require 'includes/common.php';
$friend_id=$_GET['id'];
$user_id= $_SESSION['id'];
$del_query="Delete from users_friends where user_id='$user_id' and friend_id='$friend_id' or friend_id='$user_id' and user_id='$friend_id'";
$del_query_res=mysqli_query($con,$del_query) or die(mysqli_error($con));
header('Location: members.php');
?>

