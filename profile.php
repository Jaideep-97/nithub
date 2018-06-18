<?php

require 'includes/common.php';
if(isset($_SESSION['id'])){
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
        <?php include 'includes/header.php';
        include 'ifliked.php';
        ?>
        <div class="container-fluid">
            <div class="col-md-2" style="">
                <h2 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;">YOUR PROFILE</h2>
              <?php
              $uid=$_SESSION['id'];
                $sel="Select * from users where id='$uid'";
                $selres=mysqli_query($con,$sel) or diemysqli_error($con);
                $arr= mysqli_fetch_array($selres);
                ?>
                <h3 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:2em; color: #F1C40F;"><?php echo $arr[2]; ?></h3>
              
             
              <form action="upload-handle.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="file" value='Choose file:' class="btn btn-danger">
                  <br />
                  <input type="submit" name="submit" value="Upload" class="btn btn-danger">
</form>
              <?php
              $userid=$_SESSION['id'];
              $sel1="Select image from users where id='$userid'";
$selres1= mysqli_query($con, $sel1) or diemysqli_error($con);
$arr1= mysqli_fetch_array($selres1);
$image_path=$arr1['image'];
echo "<img src='$image_path' height='200px' width='200px' class='img-circle' ; /> "
                ?>
              <h4 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;">Year:<?php echo $arr[4]; ?></h4>
              <h4 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;">Clubs:<?php echo $arr[7]; ?></h4>
              <h4 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;">Branch:<?php echo $arr[6]; ?></h4>
              <h4 style="font-family: Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:1.2em; color: #F1C40F;">About:<?php echo $arr[8]; ?></h4>
              
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-6" style="background-color:#D7DBDD;" >
          
                <h4 style="text-align: center;">
                    <b style="font-family:Lucida Console, Monaco, monospace; font-size: 1.5em;color: #CB4335;">  POST YOUR STORY</b>
                </h4>  
                <form class="form-group" method="POST" action="post.php" >
                    <input type="textarea" name="text" placeholder="Write your post here" class="form-control" />
                    <br />
                 <input class="btn btn-danger" value="POST" type="submit" />   
                </form>
                
                
                <?php
                $uid=$_SESSION['id'];
                $sel="Select * from posts where userid='$uid' order by time desc";
                $selres=mysqli_query($con,$sel) or diemysqli_error($con);
                while($row= mysqli_fetch_array($selres))
                        
                {
                    $postid=$row['id'];
                    ?>
                <article>
                     <?php
              $userid=$_SESSION['id'];
              $sel1="Select image from users where id='$userid'";
$selres1= mysqli_query($con, $sel1) or diemysqli_error($con);
$arr1= mysqli_fetch_array($selres1);
$image_path=$arr1['image'];
echo "<img src='$image_path' height='50px' width='50px' class='img-circle' ; /> "
                ?>
                <h3 style="font-family: Verdana, Geneva, sans-serif; font-size: 1.2em; color: #CB4335;"><b><?php $sel1="Select * from users where id='$uid'";
                $selres1=mysqli_query($con,$sel1) or diemysqli_error($con);
                $arr=mysqli_fetch_array($selres1);
                echo $arr[2]; ?></b>
                    
                </h3>
                <h4 style="color:blue;"><?php echo $row[4]; ?></h4>
                <br />
                <br />
                <p style="font-family: Trebuchet MS, Helvetica, sans-serif; font-size: 1.6em; color:black;"><?php echo $row[2]; ?></p>
                <br />
                
                <input type='button' class="btn btn-danger" onclick="location.href='delete.php?id=<?php echo $postid; ?>'" value='DELETE POST'/>
                <br />
                <br />
                <form class="form-group" method='POST' action='comment.php?id=<?php echo $postid ; ?>'>
                    <input type='textarea' name='comment' placeholder="Type your comment here!" class="form-control" />
                    <br />
                <input type='submit' class="btn btn-danger"  value='COMMENT'/>
                </form>
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
              $userid=$_SESSION['id'];
              $sel1="Select image from users where id='$userid'";
$selres1= mysqli_query($con, $sel1) or diemysqli_error($con);
$arr1= mysqli_fetch_array($selres1);
$image_path=$arr2['image'];
echo "<img src='$image_path' height='50px' width='50px' class='img-circle' ; /> "
                ?>
                
                <h4 style='color:#CB4335;;'><?php echo $arr2[0]; ?></h4>
                <?php 
                
                 ?>
                <h4 style="color:blue; "><?php echo $arr3[0]; ?></h4>
                <p style="font-family: Trebuchet MS, Helvetica, sans-serif; font-size: 1.6em; color:black;"><?php echo $arr3[1]; ?></p>
                <hr />
                </div>
                 <?php } ?>
                </article>
               <?php      } ?>
                <br />
               
        </div>
             
            <div class="col-md-3" style="">
                <h3 style="text-align: center; font-family:Lucida Console, Monaco, monospace; font-size: 1.5em; color: #F1C40F;">
                    FRIENDS
                </h3>  
                <?php
                $uid=$_SESSION['id'];
                $on="Online";
                $off="Offline";
                $sel="Select name, year,status,image from users inner join users_friends on users.id=users_friends.friend_id  where users_friends.user_id='$uid'";
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
                        <td   >
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #F1C40F;"><?php echo $arr[0]; ?></h3>
                        </td>
                        <td >
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #F1C40F;"><?php echo $arr[1]; ?></h3>
                        </td>
                        <td >
                            <?php if($arr[2]==1) { ?>
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #28B463;"><b><?php echo $on; ?></b></h3>
                        
                            <?php } else { ?>
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #CB4335  ;"><b><?php echo $off;   } ?></b></h3>
                        </td>
                    </tr>
               <?php } ?>
                </table>
                <?php
                $uid=$_SESSION['id'];
                $sel="Select name, year,status,image from users inner join users_friends on users.id=users_friends.user_id  where users_friends.friend_id='$uid'";
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
                         <td >
                            <?php if($arr[2]==1) { ?>
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #28B463;"><b><?php echo $on;  ?></b></h3>
                       
                <?php } else { ?>
                            <h3 style="font-family:Lucida Console, Monaco, monospace; font-size: 1.2em; color: #CB4335  ;"><b><?php echo $off;   } ?></b></h3>
                        </td>
                    </tr>
               <?php } ?>
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