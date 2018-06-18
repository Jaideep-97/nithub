<?php
require 'includes/common.php';
$Err="";
if(isset($_POST['submit'])){
    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    
    $pwd= mysqli_real_escape_string($con, $_POST['password']);
    $pwd=md5($pwd);

$stmt = $con->prepare('SELECT id,email,password FROM users WHERE email = ? and password=?');
$stmt->bind_param('ss', $email,$pwd); // 's' specifies the variable type => 'string'

$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id,$email1,$password);
$row = $stmt->num_rows;

if($row>0)
{
    while($stmt->fetch()){
    $_SESSION['id']=$id;
    $uid=$_SESSION['id'];
    
    $_SESSION['email']=$email1;
    $upd="Update users set status='1' where id='$uid'";
    $updres=mysqli_query($con,$upd) or diemysqli_error($con);
    header('Location:profile.php');
    }
}
else
{
    echo "<h3>Email or password incorrect</h3>";
}

}
?>


