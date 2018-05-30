<html>
    <head>
       
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      body{
          background-color:#17202A;
      }
      .caption{
          position: absolute;
          left:35%;
          bottom: 45%;
      }
      .container1{
          text-align: center;
          position: relative;
      }
  </style>      
  <title>Fabricate your dream </title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
           <nav class="navbar navbar-inverse" style='background-color:#CB4335 ;color:#17202A  ;'>
            <div class="container-fluid">
                <div class="navbar-header">
                      <?php                 if (isset($_SESSION['email'])) {                     ?> 
                    <a class="navbar-brand" href="feed.php" style="font-family: Georgia, serif;color:#FDFEFE ;"><b>NITHUB</b></a>
                      <?php } else { ?>
                    <a class="navbar-brand" href="index.php" style="font-family: Georgia, serif; color:#FDFEFE ;"><b>NITHUB</b></a>
                      <?php } ?>
            </div>
                <ul class="nav navbar-nav">
              <?php      if (isset($_SESSION['email'])) {                     ?> 
                    <li style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif ; font-size: 1.2em; color:#FDFEFE  ;"><a href="members1.php"><b>MESSAGE FRIENDS</b></a></li>
                    <li style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif ; font-size: 1.2em;color:#FDFEFE  ; "><a href="members.php"><b>MEMBERS</b></a></li>
              <?php } else { ?>
                     <li style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif ; font-size: 1.2em; color:#FDFEFE  ;"><a href="login.php"><b>MESSAGE FRIENDS</b></a></li>
                    <li style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size: 1.2em; color:#FDFEFE  ; "><a href="login.php"><b>MEMBERS</b></a></li>
                    <?php } ?>  
                </ul>
                 <ul class="nav navbar-nav navbar-right">             
    <?php                 if (isset($_SESSION['email'])) {                     ?>               
                                              <li style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif ; font-size: 1.2em;color:#17202A  ;"><a href = "profile.php"><b> MY PROFILE</b></a></li> 
                                              <li style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif ; font-size: 1.2em;color:#17202A  ;"><a href = "settings.php"><b> SETTINGS</b></a></li> 
                                            <li style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif ; font-size: 1.2em;color:#17202A  ;"><a href = "logout_script.php"><span class = "glyphicon glyphicon-log-in"></span><b> LOGOUT</b></a></li>    
                                        

                  <?php 
                                             } else {        
                                                 ?>  
               
                        <li style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif ; font-size: 1.2em; color:#17202A  ;"><a href="signup.php"><span class="glyphicon glyphicon-user"></span><b> SIGN UP</b></a></li>      
                        <li style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif ; font-size: 1.2em; color:#17202A  ;"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span><b> LOGIN</b></a></li>       
                  <?php                   
                  }             
                  ?>         
                    </ul>     
            </div>
           </nav>
    </body>
</html>