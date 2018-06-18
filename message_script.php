<?php

require 'includes/common.php';
$uid=$_SESSION['id'];
$id=$_GET['id'];
$message=$_POST['message'];
date_default_timezone_set('Asia/Kolkata');
$time=date('Y-m-d H:i:s');
$ins="Insert into messages(from_id,to_id,message,time)values('$uid','$id','$message','$time')";



$insres= mysqli_query($con, $ins) or mysqli_error($con);
$sel="Select id from users where id='$id'";
$selres=mysqli_query($con,$sel) or diemysqli_error($con);
$arr=mysqli_fetch_array($selres);
header('Location:message.php?id='.$arr[0]);
?>
