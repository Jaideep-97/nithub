<?php

require 'includes/common.php';
if(isset($_SESSION['id'])){
?>
<html>
    <head>
        <title>messsagefriends</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      td{
          text-align: center;
          
      }
  </style>
    </head>
    <body>
        <?php include 'includes/header.php';
        include 'ifadded.php' ;
        ?>
        
        <div class="container">
              <h1 style="text-align:center; font-family:Georgia, serif; color: #F1C40F;">MESSAGE FRIENDS</h1>
            <div class="col-md-6">
                <h2 style="text-align:center; font-family:Georgia, serif; color: #F1C40F;">ONLINE FRIENDS</h2>
                <table class="table table-hover " cellspacing='50'>
             <?php
             $uid=$_SESSION['id'];
             $sel="Select name, year,status,image from users inner join users_friends on users.id=users_friends.friend_id  where users_friends.user_id='$uid'";
                $selres=mysqli_query($con,$sel) or diemysqli_error($con);
             
             while($arr=mysqli_fetch_array($selres)) {
             $nm=$arr['name']; $sel1="Select id,year,image from users where name='$nm'";
             $selres1=mysqli_query($con,$sel1) or diemysqli_error($con);
             $arr1=mysqli_fetch_array($selres1) or diemysqli_error($con);
             if($arr['status']==1){
            
             ?>
                   
                    <tr>
                        <td>
                         <?php 
                         $img=$arr['image'];
                         echo "<img src='$img' height='50px' width='50px' class='img-circle' ; /> " ?>
                        </td>
                        <td >
                     <h4><a href="profile1.php?id=<?php echo $arr1[0] ; ?> "><?php echo $arr['name']; ?></a></h4></td>
                 
                
                
                 <td>      <input type='button' class="btn btn-danger" value="Message" onclick="location.href='message.php?id=<?php echo $arr1[0]; ?>'" />
                 
                 </td>
                 <td>
                 <?php
                 $nm1=$arr['name'];
                 $s="Select id from users where name='$nm1'";
                 $res=mysqli_query($con,$s) or diemysqli_error($con);
                 $arr2=mysqli_fetch_array($res);
                 $friendid=$arr1[0];
  $se1="Select COUNT(viewed_from)  from messages where (from_id='$friendid' and to_id='$uid') and viewed_from=0 ";
  $sere1=mysqli_query($con,$se1) or diemysqli_error($con);
  $row=mysqli_fetch_array($sere1);
  
      echo "<p style='font-family: Arial, Helvetica, sans-serif; font-size: 1.2em; color:#F1C40F;'>$row[0] Unread Messages</p>";
       ?>
                 </td>    
                 
                     
             </tr>
             <?php }
             
                }
              ?>
                </table>
                <table class="table table-hover" cellspacing='50'>
             <?php
             $uid=$_SESSION['id'];
             $se="Select name, year,status,image from users inner join users_friends on users.id=users_friends.user_id  where users_friends.friend_id='$uid'";
                $selre=mysqli_query($con,$se) or diemysqli_error($con);
             while($ar=mysqli_fetch_array($selre)) {
             $nm=$ar['name'];
             $sel1="Select id,year,image from users where name='$nm'";
             $selres1=mysqli_query($con,$sel1) or diemysqli_error($con);
             $ar1=mysqli_fetch_array($selres1) or diemysqli_error($con);
             if($ar['status']==1){
             ?>
                   
                    <tr>    
                        <td>
                         <?php 
                         $img=$ar['image'];
                         echo "<img src='$img' height='50px' width='50px' class='img-circle' ; /> " ?>
                        </td>

                 <td >
                     <h4><a href="profile1.php?id=<?php echo $ar1[0] ; ?> "><?php echo $ar['name']; ?></a></h4></td>
                 
                 
                
                 <td>      <input type='button' class="btn btn-danger" value="Message" onclick="location.href='message.php?id=<?php echo $ar1[0]; ?>'" />
                 
                 </td>
                   <td>
                 <?php
                  $nm1=$ar['name'];
                 $s="Select id from users where name='$nm1'";
                 $res=mysqli_query($con,$s) or diemysqli_error($con);
                 $arr2=mysqli_fetch_array($res);
                 $friendid=$ar1[0];
                 
  $se1="Select COUNT(viewed_from) from messages where (from_id='$friendid' and to_id='$uid') and viewed_from=0";
  $sere1=mysqli_query($con,$se1) or diemysqli_error($con);
  $row=mysqli_fetch_array($sere1);
      echo "<p style='font-family: Arial, Helvetica, sans-serif; font-size: 1.2em; color:#F1C40F;'>$row[0] Unread Messages</p>";
       
      ?>
                 </td>    
                     
             </tr>
             <?php } }
             ?>
                </table>
           
            
            </div>
               <div class="col-md-6">
                <h2 style="text-align:center; font-family:Georgia, serif; color: #F1C40F;">OFFLINE FRIENDS</h2>
                <table class="table table-hover " cellspacing='50'>
             <?php
             $uid=$_SESSION['id'];
             $sel="Select name, year,status,image from users inner join users_friends on users.id=users_friends.friend_id  where users_friends.user_id='$uid'";
                $selres=mysqli_query($con,$sel) or diemysqli_error($con);
             
             while($arr=mysqli_fetch_array($selres)) {
             $nm=$arr['name']; $sel1="Select id,year,image from users where name='$nm'";
             $selres1=mysqli_query($con,$sel1) or diemysqli_error($con);
             $arr1=mysqli_fetch_array($selres1) or diemysqli_error($con);
             if($arr['status']==0){
            
             ?>
                   
                    <tr>
                        <td>
                         <?php 
                         $img=$arr['image'];
                         echo "<img src='$img' height='50px' width='50px' class='img-circle' ; /> " ?>
                        </td>
                        <td >
                            <h4 style="color:#F1C40F;"><a href="profile1.php?id=<?php echo $arr1[0] ; ?> "><?php echo $arr['name']; ?></a></h4></td>
                 
                
                
                 <td>      <input type='button' class="btn btn-danger" value="Message" onclick="location.href='message.php?id=<?php echo $arr1[0]; ?>'" />
                 
                 </td>
                 <td>
                 <?php
                 $nm1=$arr['name'];
                 $s="Select id from users where name='$nm1'";
                 $res=mysqli_query($con,$s) or diemysqli_error($con);
                 $arr2=mysqli_fetch_array($res);
                 $friendid=$arr1[0];
  $se1="Select COUNT(viewed_from)  from messages where (from_id='$friendid' and to_id='$uid') and viewed_from=0 ";
  $sere1=mysqli_query($con,$se1) or diemysqli_error($con);
  $row=mysqli_fetch_array($sere1);
  
      echo "<p style='font-family: Arial, Helvetica, sans-serif; font-size: 1.2em; color:#F1C40F;'>$row[0] Unread Messages</p>";
       ?>
                 </td>    
                     
             </tr>
             <?php }
             
                }
              ?>
                </table>
                <table class="table table-hover" cellspacing='50'>
             <?php
             $uid=$_SESSION['id'];
             $se="Select name, year,status,image from users inner join users_friends on users.id=users_friends.user_id  where users_friends.friend_id='$uid'";
                $selre=mysqli_query($con,$se) or diemysqli_error($con);
             while($ar=mysqli_fetch_array($selre)) {
             $nm=$ar['name'];
             $sel1="Select id,year,image from users where name='$nm'";
             $selres1=mysqli_query($con,$sel1) or diemysqli_error($con);
             $ar1=mysqli_fetch_array($selres1) or diemysqli_error($con);
             if($ar['status']==0){
             ?>
                   
                    <tr>    
                        <td>
                         <?php 
                         $img=$ar['image'];
                         echo "<img src='$img' height='50px' width='50px' class='img-circle' ; /> " ?>
                        </td>

                 <td>
                     <h4 style='color:#F1C40F;'><a href="profile1.php?id=<?php echo $ar1[0] ; ?> "><?php echo $ar['name']; ?></a></h4></td>
                 
                 
                
                 <td>      <input type='button' class="btn btn-danger" value="Message" onclick="location.href='message.php?id=<?php echo $ar1[0]; ?>'" />
                 
                 </td>
                 <td>
                 <?php
                  $nm1=$ar['name'];
                 $s="Select id from users where name='$nm1'";
                 $res=mysqli_query($con,$s) or diemysqli_error($con);
                 $arr2=mysqli_fetch_array($res);
                 $friendid=$ar1[0];
                 
  $se1="Select COUNT(viewed_from) from messages where (from_id='$friendid' and to_id='$uid') and viewed_from=0";
  $sere1=mysqli_query($con,$se1) or diemysqli_error($con);
  $row=mysqli_fetch_array($sere1);
      echo "<p style='font-family: Arial, Helvetica, sans-serif; font-size: 1.2em; color:#F1C40F;'>$row[0] Unread Messages</p>";
       
      ?>
                 </td>    
                 
                     
             </tr>
             <?php } }
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