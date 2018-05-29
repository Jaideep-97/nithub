<?php

require 'includes/common.php';
$postid=$_GET['id'];
$del="Delete from posts where id='$postid'";
$delres=mysqli_query($con,$del) or diemysqli_error($con);
header("Location:profile.php");
?>