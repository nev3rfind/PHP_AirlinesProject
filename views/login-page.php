<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Login form</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  <link href="../css/logins.css" media="all" rel="stylesheet" type="text/css"/>
</head>

<body>
  <h1>Welcome to Queensgate Airlines</h1>

   <form id="login" action="../models/login-process.php" method="post">
     <div class="login-form">
     <h1>Log in</h1>
     <div class="form-group">
     <input id ="UserName" type="email" class="form-control" id="email" name="email" placeholder="Username" autofocus required>
     <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
     <input id="Password" type="password" class="form-control" id="password" name="password" placeholder="Password" required>
   <i class="fa fa-lock"></i>
 </div>
 <div >
 <?php
if(isset($_SESSION["error_msg"])){
 echo "<span class='alert'>{$_SESSION["error_msg"]}</span>";
}
  ?>
</div>
    <input type="submit" class="log-btn" id="submit" name="login" value="Log in">
  </div>
     </form>

   </body>
   </html>
