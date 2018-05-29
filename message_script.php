<?php

require 'includes/common.php';
$uid=$_SESSION['id'];
$id=$_GET['id'];
$message=$_POST['message'];
$time=date('Y-m-d H:i:s');
$ins="Insert into messages(from_id,to_id,message,time)values('$uid','$id','$message','$time')";
$insres= mysqli_query($con, $ins) or mysqli_error($con);
header('Location:members1.php');
?>
