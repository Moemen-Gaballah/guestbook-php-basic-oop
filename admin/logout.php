<?php 

session_start();

session_destroy();
header('LOCATION:login.php');
// exit('you are logged out. to go to login page <a href="login.php">Click here</a>');