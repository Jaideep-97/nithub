<?php

require 'includes/common.php';
if(isset($_SESSION['id'])){
?>
<html>
    <head>
        <title>members</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      td{
          border-bottom: 1px solid #ddd;
          text-align:center;
      }
  </style>
    </head>
    <body>
        <?php include 'includes/header.php';
        include 'ifadded.php' ;
        ?>
        <div class="container">
            <h1 style="text-align:center; font-family:Georgia, serif;color: #F1C40F;">ADD OR REMOVE FRIENDS</h1>
            <div class="col-md-6">
                <h2 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em;color: #F1C40F; text-align: center;"><b>1st Year Members</b></h2>
                <table class="table table-hover">
             <?php
             $uid=$_SESSION['id'];
             $sel="Select name from users where year='1' and id<>'$uid' order by name";
             $selres=mysqli_query($con,$sel) or diemysqli_error($con);
             while($arr=mysqli_fetch_array($selres)) {
             $nm=$arr['name'];
             $sel1="Select id,year,image from users where name='$nm'";
             $selres1=mysqli_query($con,$sel1) or diemysqli_error($con);
             $arr1=mysqli_fetch_array($selres1) or diemysqli_error($con);
             ?>
                   
                    <tr>
                        <td>
                         <?php 
                         $img=$arr1['image'];
                         echo "<img src='$img' height='50px' width='50px' class='img-circle' ; /> " ?>
                        </td>
                 <td>
                     <h4><a href="profile1.php?id=<?php echo $arr1[0] ; ?> "><?php echo $arr['name']; ?></a></h4></td>
                 
                
                 <?php if(check_if_added($arr1[0])==1) {?>
                 <td>      <input type='button' class="btn btn-danger" value="Remove friend" onclick="location.href='friends_script1.php?id=<?php echo $arr1[0]; ?>'" />
                 
                 </td>
                 
                     <?php }else { ?>
                 <td>      <input type='button' class="btn btn-danger" value="Add as friend" onclick="location.href='friends_script.php?id=<?php echo $arr1[0]; ?>'" />
                 </td>
                     <?php } ?>
             </tr>
             <?php }
              ?>
                </table>
            </div>
            
<div class="col-md-6">
    <h2 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em;color: #F1C40F; text-align: center;"><b>2nd Year Members</b></h2>
                <table class="table table-hover">
             <?php
             $uid=$_SESSION['id'];
             $sel="Select name from users where year='2' and id<>'$uid' order by name";
             $selres=mysqli_query($con,$sel) or diemysqli_error($con);
             while($arr=mysqli_fetch_array($selres)) {
             $nm=$arr['name'];
             $sel1="Select id,year,image from users where name='$nm'";
             $selres1=mysqli_query($con,$sel1) or diemysqli_error($con);
             $arr1=mysqli_fetch_array($selres1) or diemysqli_error($con);
             ?>
                   
                    <tr>
                        <td>
                         <?php 
                         $img=$arr1['image'];
                         echo "<img src='$img' height='50px' width='50px' class='img-circle' ; /> " ?>
                        </td>
                 <td>
                     <h4><a href="profile1.php?id=<?php echo $arr1[0] ; ?> "><?php echo $arr['name']; ?></a></h4></td>
                 
                
                 <?php if(check_if_added($arr1[0])==1) {?>
                 <td>      <input type='button' class="btn btn-danger" value="Remove friend" onclick="location.href='friends_script1.php?id=<?php echo $arr1[0]; ?>'" />
                 
                 </td>
                 
                     <?php }else { ?>
                 <td>      <input type='button' class="btn btn-danger" value="Add as friend" onclick="location.href='friends_script.php?id=<?php echo $arr1[0]; ?>'" />
                 </td>
                     <?php } ?>
             </tr>
             <?php }
              ?>
                </table>
            </div>
            <div class="col-md-6">
                <h2 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em;color: #F1C40F;text-align: center;"><b>3rd Year Members</b></h2>
                <table class="table table-hover" cellspacing='50'>
             <?php
             $uid=$_SESSION['id'];
             $sel="Select name from users where year='3' and id<>'$uid' order by name";
             $selres=mysqli_query($con,$sel) or diemysqli_error($con);
             while($arr=mysqli_fetch_array($selres)) {
             $nm=$arr['name'];
             $sel1="Select id,year,image from users where name='$nm'";
             $selres1=mysqli_query($con,$sel1) or diemysqli_error($con);
             $arr1=mysqli_fetch_array($selres1) or diemysqli_error($con);
             ?>
                   
                    <tr>
                        <td>
                         <?php 
                         $img=$arr1['image'];
                         echo "<img src='$img' height='50px' width='50px' class='img-circle' ; /> " ?>
                        </td>
                 <td>
                     <h4 ><a href="profile1.php?id=<?php echo $arr1[0] ; ?> "><?php echo $arr['name']; ?></a></h4></td>
                 
                 
                 <?php if(check_if_added($arr1[0])==1) {?>
                 <td>      <input type='button' class="btn btn-danger" value="Remove friend" onclick="location.href='friends_script1.php?id=<?php echo $arr1[0]; ?>'" />
                 
                 </td>
                 
                     <?php }else { ?>
                 <td>      <input type='button' class="btn btn-danger" value="Add as friend" onclick="location.href='friends_script.php?id=<?php echo $arr1[0]; ?>'" />
                 </td>
                     <?php } ?>
             </tr>
             <?php }
              ?>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-hover" cellspacig='50'>
                    <h2 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em;color: #F1C40F;text-align: center;"><b>4th Year Members</b></h2>
             <?php
             $uid=$_SESSION['id'];
             $sel="Select name from users where year='4' and id<>'$uid' order by name";
             $selres=mysqli_query($con,$sel) or diemysqli_error($con);
             while($arr=mysqli_fetch_array($selres)) {
             $nm=$arr['name'];
             $sel1="Select id,year,image from users where name='$nm'";
             $selres1=mysqli_query($con,$sel1) or diemysqli_error($con);
             $arr1=mysqli_fetch_array($selres1) or diemysqli_error($con);
             ?>
                   
                    <tr>
                        <td>
                         <?php 
                         $img=$arr1['image'];
                         echo "<img src='$img' height='50px' width='50px' class='img-circle' ; /> " ?>
                        </td>
                 <td>
                     <h4><a href="profile1.php?id=<?php echo $arr1[0] ; ?> "><?php echo $arr['name']; ?></a></h4></td>
                 
                 
                 <?php if(check_if_added($arr1[0])==1) {?>
                 <td>      <input type='button' class="btn btn-danger" value="Remove friend" onclick="location.href='friends_script1.php?id=<?php echo $arr1[0]; ?>'" />
                 
                 </td>
                 
                     <?php }else { ?>
                 <td>      <input type='button' class="btn btn-danger" value="Add as friend" onclick="location.href='friends_script.php?id=<?php echo $arr1[0]; ?>'" />
                 </td>
                     <?php } ?>
             </tr>
             <?php }
              ?>
                </table>
            </div>

        </div>
    </body>
</html>
 <?php }
else{
    header("Location:index.php");
}
?>               