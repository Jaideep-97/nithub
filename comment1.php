<?php

require 'includes/common.php';
$uid=$_SESSION['id'];
$post_id=$_GET['id'];
$comment=mysqli_real_escape_string($con,$_POST['comment']);
date_default_timezone_set('Asia/Kolkata');
$time=date('Y-m-d H:i:s');
$ins="Insert into users_posts(user_id,post_id,time,comment)values('$uid','$post_id','$time','$comment')";
$insres=mysqli_query($con,$ins) or diemysqli_error($con);
$sel="Select userid from posts where id='$post_id'";
$selres=mysqli_query($con,$sel) or diemysqli_error($con);
$arr=mysqli_fetch_array($selres);
$a=$arr[0];
header("Location:feed.php");
?>
