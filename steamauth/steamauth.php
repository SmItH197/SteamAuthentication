<?php
ob_start();
session_start();
require ('openid.php');

function logoutbutton() {
    echo "<form action='' method='get'><button name='logout' type='submit'>Logout</button></form>"; //logout button
}

function loginbutton($buttonstyle = "large_no") {
	$button['small'] = "small";
	$button['large_no'] = "large_noborder";
	$button['large'] = "large_border";
	$button = "<a href='?login'><img src='http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_".$button[$buttonstyle].".png'></a>";
	
	echo $button;
}

if (isset($_GET['login'])){
	try {
		require("settings.php");
		$openid = new LightOpenID($steamauth['domainname']);
		
		
		if(!$openid->mode) {
			$openid->identity = 'http://steamcommunity.com/openid';
			header('Location: ' . $openid->authUrl());
		} elseif ($openid->mode == 'cancel') {
			echo 'User has canceled authentication!';
		} else {
			if($openid->validate()) { 
				$id = $openid->identity;
				$ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
				preg_match($ptn, $id, $matches);
			  
				$_SESSION['steamid'] = $matches[1]; 
				header('Location: '.$steamauth['loginpage']);
			} else {
				echo "User is not logged in.\n";
			}
		}
	} catch(ErrorException $e) {
		echo $e->getMessage();
	}
}

if (isset($_GET['logout'])){
	include("settings.php");
	unset($_SESSION['steamid']);
	unset($_SESSION['steam_uptodate']);
	header('Location: '.$steamauth['logoutpage']);
}

if (isset($_GET['update'])){
	unset($_SESSION['steam_uptodate']);
	include("userinfo.php");
	header('Location: '.$_SERVER['PHP_SELF']);
}
?>
