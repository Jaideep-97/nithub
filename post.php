<?php

require 'includes/common.php';
$uid=$_SESSION['id'];
date_default_timezone_set('Asia/Kolkata');
$time = date('Y-m-d H:i:s');
$message=mysqli_real_escape_string($con,$_POST['text']);
$ins="Insert into posts(userid,message,time)values('$uid','$message','$time')";
$insres= mysqli_query($con, $ins) or mysqli_error($con);
header('Location:profile.php');
?>
