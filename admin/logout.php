<?php

session_start();


// Remove admin session

unset($_SESSION['admin_id']);
unset($_SESSION['admin_username']);


// Destroy session

session_destroy();


header("Location: login.php");

exit();

?>