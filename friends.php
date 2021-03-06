<?php

require 'includes/common.php';
?><!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 
<style>
body {
    margin: 0 auto;
    max-width: 600px;
    padding: 0 20px;
}

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

<h2>Chat Messages</h2>
<div class="container">
<?php
$uid=$_SESSION['id'];
$friendid=$_GET['id'];
$sel="Select message,time from messages where from_id='$uid' and to_id='$friendid' order by time desc";
$selres=mysqli_query($con,$sel) or diemysqli_error($con);
?>
<div class="container">
  <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
  <p>Sweet! So, what do you wanna do today?</p>
  <span id="time-right">11:02</span>
</div>

<div class="container darker">
  <img src="/w3images/avatar_g2.jpg" alt="Avatar" style="width:100%;">
  <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
  <span id="time-left">11:05</span>
</div>
<form class="form-group">
    <input type="textarea" placeholder="Type your message here!" class="form-control" />
    <br />
    <input type="submit" class="btn btn-warning" value="Send" />
</form>
</div>
</body>
</html>
