<?php
    session_start();
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();

//echo "All session variables are now removed, and the session is destroyed." ;
header("Location:index.php");
exit;
?>

