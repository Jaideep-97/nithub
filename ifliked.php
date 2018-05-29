<?php

function check_if_liked($post_id)
{
    $con = mysqli_connect("localhost", "root", "", "social") or die(mysqli_error($con));
    $user_id= $_SESSION['id'];
    $select_query="Select * from users_posts1 where post_id='$post_id' and user_id='$user_id'";
    $select_query_res=mysqli_query($con,$select_query);
    $no_of_rows= mysqli_num_rows($select_query_res);
    if($no_of_rows>0)
    {
        return 1;
    }
 else {
     return 0;
    }
    
}
?>
