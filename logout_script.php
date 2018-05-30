<?php
require 'includes/common.php';
$uid=$_SESSION['id'];
if(!isset($_SESSION['email']))
{
    header('Location:index.php');
}
 $upd="Update users set status='0' where id='$uid'";
    $updres=mysqli_query($con,$upd) or diemysqli_error($con);
    
session_unset();
session_destroy();
header('Location:index.php');
?>
