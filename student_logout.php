<?php
session_start();
unset($_SESSION['user_id']);
session_destroy();
echo 'You are successfully logged out.. '; 
echo '<a href="index.html">Click Here</a>';
exit;
?>