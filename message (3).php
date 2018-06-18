<?php

require 'includes/common.php';
if(isset($_SESSION['id'])){
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
$s="Not Seen";
$friendid=$_GET['id'];

$sel1="Select name,image from users where id=?";
$stmt=$con->stmt_init();
if($stmt->prepare($sel1)){
$stmt->bind_param('i',$friendid);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($name,$image);}
$stmt->fetch();
?>
    <h2 style="font-family:Times New Roman, Times, serif; font-size: 3em; text-align: center;"><?php echo $name; ?></h2>
    <?php
$sel="Select id,message,time,from_id,to_id from messages where (from_id=? and to_id=?) or (from_id=? and to_id=?) order by id asc";
$stmt1=$con->stmt_init();
if($stmt1->prepare($sel)){
$stmt1->bind_param('iiii',$uid,$friendid,$friendid,$uid);
$stmt1->execute();
$stmt1->store_result();
$stmt1->bind_result($mid,$message,$time,$from_id,$to_id);
}


while($stmt1->fetch()){
    

if($from_id==$uid){
?>    
    <div class="container" style="background-color:#CB4335 ;">
<span id='time-right'>
                      <?php
              $userid=$_SESSION['id'];
              $se1="Select image from users where id='$userid'";
$selre1= mysqli_query($con, $se1) or diemysqli_error($con);
$ar1= mysqli_fetch_array($selre1);
$image_path=$ar1['image'];
echo "<img src='$image_path' height='50px' width='50px' class='img-circle' ; /> "
                ?>
                        
  <h3 style="color:#F1C40F; font-size: 1.2em; "><b>YOU</b></h3>
  
</span>
  <p style="font-family: Arial, Helvetica, sans-serif; font-size: 1.7em; color:black;"><?php echo $message; ?></p>
        <span id="time-right" style="color:black;"><?php echo $time; ?></span>
        <?php
        $upd1="Update messages set viewed_from=1 where  (from_id=? and to_id=?)";
	$stmt=$con->prepare($upd1);
	$stmt->bind_param("ii",$friendid,$uid);
	$stmt->execute();
  
  $se1="Select viewed_from from messages where id='$mid'";
  $sere1=mysqli_query($con,$se1) or diemysqli_error($con);
  $row=mysqli_fetch_array($sere1);
  if($row['viewed_from']==1){ ?>
  <p style="font-family: Arial, Helvetica, sans-serif; font-size: 1em; color:black;"> <?php
  echo "Seen";?></p> <?php }
  else{
      ?> <p style="font-family: Arial, Helvetica, sans-serif; font-size: 1em; color:black;"><?php echo "Not Seen";?></p><?php }
         
        ?>
</div>
<?php } else {
    ?><div class="container darker" style="background-color: #F1C40F;">
    <span id='time-left'>
    <?php
   
    $image_path1=$image;
echo "<img src='$image_path1' height='50px' width='50px' class='img-circle' ; /> "
    ?>
    
  
  <h3 style="color:#E74C3C; font-size: 1.2em;"><b><?php echo $name; ?></b></h3>
 </span>
  <p style="font-family: Arial, Helvetica, sans-serif; font-size: 1.7em;color:black;text-align:right;"><?php echo $message; ?></p>
  <span id="time-left" style='color:black;'><?php echo $time; ?></span>
</div>
<?php } } ?>
<form class="form-group" method="POST" action="message_script.php?id=<?php echo $friendid; ?>">
    <input type="textarea" placeholder="Type your message here!" name="message" class="form-control" />
    <br />
    <input type="submit" class="btn btn-danger" value="Send" />
    
</form>

</div>
</body>
</html>
<?php }
else{
    header("Location:index.php");
}
?>