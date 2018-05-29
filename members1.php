<?php

require 'includes/common.php';
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
            <div class="col-md-3">
                <table class="table table-hover " cellspacing='50'>
             <?php
             $uid=$_SESSION['id'];
             $sel="Select name, year from users inner join users_friends on users.id=users_friends.friend_id  where users_friends.user_id='$uid'";
                $selres=mysqli_query($con,$sel) or diemysqli_error($con);
             
             while($arr=mysqli_fetch_array($selres)) {
             $nm=$arr['name'];
             $sel1="Select id,year from users where name='$nm'";
             $selres1=mysqli_query($con,$sel1) or diemysqli_error($con);
             $arr1=mysqli_fetch_array($selres1) or diemysqli_error($con);
             ?>
                   
                    <tr>
                        <td class="col-md-8">
                     <h4><a href="profile1.php?id=<?php echo $arr1[0] ; ?> "><?php echo $arr['name']; ?></a></h4></td>
                 
                
                
                 <td class='col-md-4'>      <input type='button' class="btn btn-danger" value="Message" onclick="location.href='message.php?id=<?php echo $arr1[0]; ?>'" />
                 
                 </td>
                 
                     
             </tr>
             <?php }
              ?>
                </table>
                <table class="table table-hover" cellspacing='50'>
             <?php
             $uid=$_SESSION['id'];
             $sel="Select name, year from users inner join users_friends on users.id=users_friends.user_id  where users_friends.friend_id='$uid'";
                $selres=mysqli_query($con,$sel) or diemysqli_error($con);
             while($arr=mysqli_fetch_array($selres)) {
             $nm=$arr['name'];
             $sel1="Select id,year from users where name='$nm'";
             $selres1=mysqli_query($con,$sel1) or diemysqli_error($con);
             $arr1=mysqli_fetch_array($selres1) or diemysqli_error($con);
             ?>
                   
                    <tr>             

                 <td class='col-md-8'>
                     <h4><a href="profile1.php?id=<?php echo $arr1[0] ; ?> "><?php echo $arr['name']; ?></a></h4></td>
                 
                 
                
                 <td class='col-md-4'>      <input type='button' class="btn btn-danger" value="Message" onclick="location.href='message.php?id=<?php echo $arr1[0]; ?>'" />
                 
                 </td>
                 
                     
             </tr>
             <?php }
              ?>
                </table>
            </div>
            


        </div>
    </body>
</html>
                