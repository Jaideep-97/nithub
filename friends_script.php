<?php
require 'includes/common.php';
$uid=$_SESSION['id'];

$friendid=$_GET['id'];

$ins="Insert into users_friends (user_id,friend_id) values ('$uid','$friendid')";
$insres=mysqli_query($con,$ins) or diemysqli_error($con);
header('Location:members.php');
?>