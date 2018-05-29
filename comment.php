<?php

require 'includes/common.php';
$uid=$_SESSION['id'];
$post_id=$_GET['id'];
$comment=$_POST['comment'];
$time=date('Y-m-d H:i:s');
$ins="Insert into users_posts(user_id,post_id,time,comment)values('$uid','$post_id','$time','$comment')";
$insres=mysqli_query($con,$ins) or diemysqli_error($con);
header('Location:profile.php');
?>
