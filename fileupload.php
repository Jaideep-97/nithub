<?php


if(isset($_POST['Submit1']))
{
    require 'includes/common.php';
$uid=$_SESSION['id'];
$file= addslashes(file_get_contents($_FILES['name']['tmp_name']));
$upd="Update users set image='$file' where id='$uid'";
$updres=mysqli_query($con,$upd) or diemysqli_error($con);

header('Location:profile.php');
} 
?>
