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
              
  
 
              $id=$_GET['id'];
 
 
                $sel4="Select name,email,year,club,branch,about,image from users where id=?";
                $stmt = $con->stmt_init();

                if ($stmt->prepare($sel4)) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($name,$email,$year,$club,$branch,$about,$image);
    $stmt->fetch();
                
                
                ?>
                <h3 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:2em; color: #F1C40F;"><?php echo $name; ?></h3>
              
          <?php    echo "<img src='$image' height='200px' width='200px' class='img-circle' ; /> " ?>
              <h4 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;">Year:<?php echo $year; ?></h4>
              <h4 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;">Club:<?php echo $club; ?></h4>
              
              <h4 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;">Branch:<?php echo $branch; ?></h4>
              <h4 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;">About:<?php echo $about; ?></h4>
                
            </div>
            </section>
                <?php }  ?>
            <div class="col-md-7" style="background-color:#D7DBDD;" >
                <h4 style="text-align: center;">
                    <b style="font-family:Lucida Console, Monaco, monospace; font-size: 1.5em; color: #CB4335;">  POSTS</b>
                </h4>  
               
                <?php
                
                $id=$_GET['id'];
 
 
                $stmt = $con->stmt_init();

                
                
                
                $sel3="Select message,time,id from posts where userid=? order by time desc";
                if ($stmt->prepare($sel3)) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($message,$time,$id1);
    
                }                while($stmt->fetch())
                        
                {
                    $postid=$id1;
                    ?>
                <article>
                    <?php $sel1="Select name,image from users where id=?";
                    $stmt1=$con->stmt_init();
                    if ($stmt1->prepare($sel1)) {
    $stmt1->bind_param("i", $id);
    $stmt1->execute();
                  
                  $stmt1->store_result();
                  $stmt1->bind_result($name,$image);
                    }
                $stmt1->fetch();
                    echo "<img src='$image' height='50px' width='50px' class='img-circle' ; /> " ?>
                <h3 style="font-family: Verdana, Geneva, sans-serif; font-size: 1.2em; color: #CB4335;"><b>
             <?php   echo $name; ?></b>
                    
                </h3>
                <h4 style="color:blue;"><?php echo $time; ?></h4>
                <br />
                <br />
                <p style="font-family: Trebuchet MS, Helvetica, sans-serif; font-size: 1.6em; color:black;"><?php echo $message; ?></p>
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
                 <?php break; } ?>
                </article>
               <?php      } ?>
                <br />
               
        </div>
             
            <div class="col-md-3" style="">
                <h3 style="text-align: center; font-family:Lucida Console, Monaco, monospace; font-size: 1.5em; color: #F1C40F;">
                    FRIENDS
                </h3>  
                <?php
                $id=$_GET['id'];
                $sel="Select name, year,image from users inner join users_friends on users.id=users_friends.friend_id  where users_friends.user_id=?";
                 if ($stmt->prepare($sel)) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
                 
                $stmt->store_result();
                $stmt->bind_result($name,$year,$image);}
               
                ?>
                <table class="table ">
                <?php    
                while ($stmt->fetch()){
                ?>
                    <tr>
                       
                            <td>
                         <?php 
                         $img=$image;
                         echo "<img src='$img' height='50px' width='50px' class='img-circle' ; /> " ?>
                        
                        </td>
                        <td >
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #F1C40F;"><?php echo $name; ?></h3>
                        </td>
                        <td>
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #F1C40F;"><?php echo $year; ?></h3>
                        </td>
                    </tr>
               <?php } ?>
                </table>
                <?php
                $id=$_GET['id'];
                $sel="Select name, year,image from users inner join users_friends on users.id=users_friends.user_id  where users_friends.friend_id=?";
                 if ($stmt->prepare($sel)) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
                 
                 $stmt->store_result();
                 $stmt->bind_result($name,$year,$image);
                 }
                ?>
                
                <table class="table" >
                <?php    
                while ($stmt->fetch()){
                ?>
                    <tr>
                        <td>
                         <?php 
                         $img=$image;
                         echo "<img src='$img' height='50px' width='50px' class='img-circle' ; /> " ?>
                        </td>
                        <td >
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #F1C40F;"><?php echo $name; ?></h3>
                        </td>
                        <td>
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #F1C40F;"><?php echo $year; ?></h3>
                        </td>
                    </tr>
               <?php } ?>
                </table>
                
                
        </div>
                 
        </div>
    </body>
</html>