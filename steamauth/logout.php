<?php
include("settings.php");
header("Location: ./".$logout_page);
session_start();
unset($_SESSION['steamid']);
unset($_SESSION['steam_uptodate']);
?>