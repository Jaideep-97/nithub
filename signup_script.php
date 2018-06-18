<?php
require 'includes/common.php';

$email = mysqli_real_escape_string($con, $_POST['email']);
$name = mysqli_real_escape_string($con, $_POST['name']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$year = mysqli_real_escape_string($con, $_POST['year']);
$club= mysqli_real_escape_string($con, $_POST['clubs']);
$branch = mysqli_real_escape_string($con, $_POST['branch']);
$about = mysqli_real_escape_string($con, $_POST['aboutme']);
$stmt1 = $con->prepare('SELECT id FROM users WHERE email = ?');
$stmt1->bind_param('s', $email); // 's' specifies the variable type => 'string'
$password=md5($password);
$stmt1->execute();
$stmt1->store_result();
$result = $stmt1->bind_result($id);


$row = $stmt1->num_rows;
   
if($row>0)
{
    echo "<h2>Email id already exists. Try a different one</h2>";
}
else
{
    if($stmt=$con->prepare("Insert into users(email,name,password,year,club,branch,about) values (?,?,?,?,?,?,?)")){
    $stmt->bind_param("sssssss", $email,$name,$password,$year,$club,$branch,$about); // 's' specifies the variable type => 'string'

$stmt->execute();

$stmt->close();
    
    
    
    
    header('Location:login.php');
}    
}
     
     



?>
    
