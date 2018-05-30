<?php

require 'includes/common.php';
$userid=$_SESSION['id'];
if(isset($_POST['submit']))
{ 
  
  $filename=$_FILES['file']['name'];
   $filetype=$_FILES['file']['type'];
if($filetype=='image/jpeg' or $filetype=='image/png' or $filetype=='image/gif' or $filetype=='image/jpg')
{
move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$filename);
$filepath="upload/".$filename;


$sql="Update users set image='$filepath' where id='$userid'";
$res=mysqli_query($con,$sql) or diemysqli_error($con);
}
}
header("Location:profile.php");

?>