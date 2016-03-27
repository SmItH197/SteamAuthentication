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
		require("SteamConfig.php");
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
				if (!headers_sent()) {
                    			header('Location: '.$steamauth['loginpage']);
                    			exit;
                		} else {
					echo '<script type="text/javascript">';
                    			echo 'window.location.href="'.$steamauth['loginpage'].'";';
                    			echo '</script>';
                    			echo '<noscript>';
                    			echo '<meta http-equiv="refresh" content="0;url='.$steamauth['loginpage'].'" />';
                    			echo '</noscript>'; exit;
                		}
			} else {
				echo "User is not logged in.\n";
			}
		}
	} catch(ErrorException $e) {
		echo $e->getMessage();
	}
}

if (isset($_GET['logout'])){
	include("SteamConfig.php");
	session_unset();
	session_destroy();
	header('Location: '.$steamauth['logoutpage']);
}

if (isset($_GET['update'])){
	unset($_SESSION['steam_uptodate']);
	include("userinfo.php");
	header('Location: '.$_SERVER['PHP_SELF']);
}
?>
