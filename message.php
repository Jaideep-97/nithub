<?php

require 'includes/common.php';
?><!DOCTYPE html>
<html>
<head>
    <title>message</title>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<style>


.container {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}

.darker {
    border-color: #ccc;
    background-color: #ddd;
}

.container::after {
    content: "";
    clear: both;
    display: table;
}

#container img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

#container img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

#time-right {
    float: right;
    color: #aaa;
}

#time-left {
    float: left;
    color: #999;
}
</style>
</head>
<body>
<?php include 'includes/header.php'; ?>

<div class="container">
<?php
$uid=$_SESSION['id'];
if(isset($_SESSION['id'])){
$friendid=$_GET['id'];}
$sel1="Select name from users where id='$friendid'";
$selres1=mysqli_query($con,$sel1) or diemysqli_error($con);
$arr1=mysqli_fetch_array($selres1);
?>
    <h2 style="font-family:Times New Roman, Times, serif; font-size: 3em; text-align: center;"><?php echo $arr1[0]; ?></h2>
    <?php
$sel="Select message,time,from_id,to_id from messages where (from_id='$uid' and to_id='$friendid') or (from_id='$friendid' and to_id='$uid') order by time asc";
$selres=mysqli_query($con,$sel) or diemysqli_error($con);
while($arr=mysqli_fetch_array($selres)){
    

if($arr['from_id']==$uid){
?>    
<div class="container">

  <h3 style="color:#3498DB; font-size: 1.2em"><b>YOU</b></h3>
  <p style="font-family: Arial, Helvetica, sans-serif; font-size: 1.7em;"><?php echo $arr['message']; ?></p>
  <span id="time-right"><?php echo $arr['time']; ?></span>
</div>
<?php } else {
?><div class="container darker">
  
  <h3 style="color:#E74C3C; font-size: 1.2em;"><b><?php echo $arr1[0]; ?></b></h3>
   <p style="font-family: Arial, Helvetica, sans-serif; font-size: 1.7em;"><?php echo $arr['message']; ?></p>
  <span id="time-right"><?php echo $arr['time']; ?></span>
</div>
<?php } } ?>
<form class="form-group" method="POST" action="message_script.php?id=<?php echo $friendid; ?>">
    <input type="textarea" placeholder="Type your message here!" name="message" class="form-control" />
    <br />
    <input type="submit" class="btn btn-warning" value="Send" />
</form>
</div>
</body>
</html>
