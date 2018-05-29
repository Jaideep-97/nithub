<?php


require 'includes/common.php';
$uid=$_SESSION['id'];

$postid=$_GET['id'];

$ins="Insert into users_posts (user_id,post_id) values ('$uid','$friendid')";
$insres=mysqli_query($con,$ins) or diemysqli_error($con);
$sel="Select like from posts where id='$postid'";
$selres=mysqli_query($con,$sel) or diemysqli_error($con);
$arr=mysqli_fetch_array($selres);
$like=$arr[0]+1;
$upd="Update posts set like='$like' where id='$postid' ";
$selres=mysqli_query($con,$upd) or diemysqli_error($con);

?>
