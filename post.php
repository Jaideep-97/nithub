<?php

require 'includes/common.php';
$uid=$_SESSION['id'];
$time=date('Y-m-d H:i:s');
$message=$_POST['text'];
$ins="Insert into posts(userid,message,time)values('$uid','$message','$time')";
$insres= mysqli_query($con, $ins) or mysqli_error($con);
header('Location:profile.php');
?>
