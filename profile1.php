<?php

require 'includes/common.php';
?>
<html>
    <head>
        <title>profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      article{
			margin: 15px 0px;
			padding: 15px 5px;
			box-shadow: -1px -1px 6px #888888;
                        
		}
                td{
                    text-align: center;
                }
  </style>
    </head>
    <body>
        <?php include 'includes/header.php'; ?>
        <div class="container-fluid">
            <section style="background-color:#17202A;">
            <div class="col-md-2" >
                <h2 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;"> PROFILE</h2>
              <?php
              $uid4=$_GET['id'];
                $sel4="Select * from users where id='$uid4'";
                $selres4=mysqli_query($con,$sel4) or diemysqli_error($con);
                $arr= mysqli_fetch_array($selres4);
                ?>
                <h3 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:2em; color: #F1C40F;"><?php echo $arr[2]; ?></h3>
              <h4 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;"><?php echo $arr[1]; ?></h4>
          <?php    echo "<img src='$arr[9]' height='200px' width='200px' class='img-circle' ; /> " ?>
              <h4 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;">Clubs:<?php echo $arr[6]; ?></h4>
              <h4 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;">Branch:<?php echo $arr[7]; ?></h4>
              <h4 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;">About:<?php echo $arr[8]; ?></h4>
              
                
            </div>
            </section>
            <div class="col-md-7" style="background-color:#D7DBDD;" >
                <h4 style="text-align: center;">
                    <b style="font-family:Lucida Console, Monaco, monospace; font-size: 1.5em; color: #CB4335;">  POSTS</b>
                </h4>  
               
                <?php
                $uid3=$_GET['id'];
                $sel3="Select * from posts where userid='$uid3' order by time desc";
                $selres3=mysqli_query($con,$sel3) or diemysqli_error($con);
                while($row= mysqli_fetch_array($selres3))
                        
                {
                    $postid=$row['id'];
                    ?>
                <article>
                    <?php $sel1="Select * from users where id='$uid3'";
                $selres1=mysqli_query($con,$sel1) or diemysqli_error($con);
                $arr=mysqli_fetch_array($selres1);
                    echo "<img src='$arr[9]' height='50px' width='50px' class='img-circle' ; /> " ?>
                <h3 style="font-family: Verdana, Geneva, sans-serif; font-size: 1.2em; color: #CB4335;"><b>
             <?php   echo $arr[2]; ?></b>
                    
                </h3>
                <h4 style="color:blue;"><?php echo $row['time']; ?></h4>
                <br />
                <br />
                <p style="font-family: Trebuchet MS, Helvetica, sans-serif; font-size: 1.6em; color:black;"><?php echo $row[2]; ?></p>
                <br />
                
                <?php
                
                $sel3="Select time, comment from users_posts where users_posts.post_id='$postid' order by time desc";
                 $selres3=mysqli_query($con,$sel3) or diemysqli_error($con);
                 while($arr3=mysqli_fetch_array($selres3)){
                $sel2="Select name,image from users inner join users_posts on users.id=users_posts.user_id and users_posts.post_id='$postid' order by time asc";
                 $selres2=mysqli_query($con,$sel2) or diemysqli_error($con);
                 $arr2=mysqli_fetch_array($selres2);
                ?>
                <div style="border: 1px solid;">
                    <br />
                    <?php 
                    $img=$arr['image'];
                    echo "<img src='$img' height='50px' width='50px' class='img-circle' ; /> " ?>
                <h4 style='color:#CB4335;'><?php echo $arr2[0]; ?></h4>
                <?php 
                
                 ?>
                <h4 style="color:blue; "><?php echo $arr3[0]; ?></h4>
                <p style="font-family: Trebuchet MS, Helvetica, sans-serif; font-size: 1.6em; color:black;"><?php echo $arr3['time']; ?></p>
                <hr />
                </div>
                 <?php } ?>
                </article>
               <?php      } ?>
                <br />
               
        </div>
             
            <div class="col-md-3" style="background-color:#17202A;">
                <h3 style="text-align: center; font-family:Lucida Console, Monaco, monospace; font-size: 1.5em; color: #F1C40F;">
                    FRIENDS
                </h3>  
                <?php
                $uid=$_SESSION['id'];
                $sel="Select name, year,image from users inner join users_friends on users.id=users_friends.friend_id  where users_friends.user_id='$uid'";
                $selres=mysqli_query($con,$sel) or diemysqli_error($con);
                ?>
                <table class="table ">
                <?php    
                while ($arr= mysqli_fetch_array($selres)){
                ?>
                    <tr>
                       
                            <td>
                         <?php 
                         $img=$arr['image'];
                         echo "<img src='$img' height='50px' width='50px' class='img-circle' ; /> " ?>
                        
                        </td>
                        <td >
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #F1C40F;"><?php echo $arr[0]; ?></h3>
                        </td>
                        <td>
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #F1C40F;"><?php echo $arr[1]; ?></h3>
                        </td>
                    </tr>
               <?php } ?>
                </table>
                <?php
                $uid=$_GET['id'];
                $sel="Select name, year,image from users inner join users_friends on users.id=users_friends.user_id  where users_friends.friend_id='$uid'";
                $selres=mysqli_query($con,$sel) or diemysqli_error($con);
                ?>
                
                <table class="table" >
                <?php    
                while ($arr= mysqli_fetch_array($selres)){
                ?>
                    <tr>
                        <td>
                         <?php 
                         $img=$arr['image'];
                         echo "<img src='$img' height='50px' width='50px' class='img-circle' ; /> " ?>
                        </td>
                        <td >
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #F1C40F;"><?php echo $arr[0]; ?></h3>
                        </td>
                        <td>
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #F1C40F;"><?php echo $arr[1]; ?></h3>
                        </td>
                    </tr>
               <?php } ?>
                </table>
                
                
        </div>
                 
        </div>
    </body>
</html>