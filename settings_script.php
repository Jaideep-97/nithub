<?php

require 'includes/common.php';

$name=mysqli_real_escape_string($con, $_POST['name']);
$uid=$_SESSION['id'];
$email=mysqli_real_escape_string($con, $_POST['email']);
$password=mysqli_real_escape_string($con, $_POST['password']);
$year=mysqli_real_escape_string($con, $_POST['year']);
$branch=mysqli_real_escape_string($con, $_POST['branch']);
$club=mysqli_real_escape_string($con, $_POST['club']);
$about=mysqli_real_escape_string($con, $_POST['about']);
$password=md5($password);
    if($stmt=$con->prepare("Update users SET password=?, name=?, email=?, year=?,branch=?, club=? ,about=?  where id=?")){
$stmt->bind_param("ssssssss", $password,$name,$email,$year,$club,$branch,$about,$uid); // 's' specifies the variable type => 'string'

$stmt->execute();
    echo "<h3 style='color:black;'>SETTINGS CHANGED!</h3>";
    $stmt->close();
}

?>


