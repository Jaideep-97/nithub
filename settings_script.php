<?php
require 'includes/common.php';
$name=$_POST['name'];
$uid=$_SESSION['id'];
$email=$_POST['email'];
$password=$_POST['password'];
$year=$_POST['year'];
$branch=$_POST['branch'];
$club=$_POST['club'];
$about=$_POST['about'];
    $update_query="Update users SET password='$password', name='$name', email='$email', year='$year',branch='$branch', club='$club' ,about='$about'  where id='$uid'";
$update_query_res=mysqli_query($con,$update_query) or die(mysqli_error($con));
    echo "<h3 class='text-danger'>SETTINGS CHANGED!</h3>";
  
?>


