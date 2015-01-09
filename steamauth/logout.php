<?php
include("settings.php");
$parent = dirname($_SERVER['REQUEST_URI']);
header("Location: $parent/".$logout_page);
session_start();
unset($_SESSION['steamid']);
unset($_SESSION['steam_uptodate']);
?>
