<?php
header('Location: ../index.php'); // Change this to where you want logged out users to be redirected to.
session_start();
unset($_SESSION['steamid']);
?>


