<?php


function check_if_added($friend_id)
{
    $con = mysqli_connect("localhost", "root", "", "social") or die(mysqli_error($con));
    $user_id= $_SESSION['id'];
    $select_query="Select * from users_friends where friend_id='$friend_id' and user_id='$user_id' or friend_id='$user_id' and user_id='$friend_id'";
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

