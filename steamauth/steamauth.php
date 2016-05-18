<?php
ob_start();
session_start();

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
	require 'openid.php';
	try {
		require 'SteamConfig.php';
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
				
				if (isset($_GET['urlparam'])){
					$returnpage = $steamauth['loginpage'].'?param='.$_GET['urlparam'];
				}
				else{
					$returnpage = $steamauth['loginpage'];
				}
				
				if (!headers_sent()) {
					header('Location: '.$returnpage);
					exit;
				} else {
					?>
					<script type="text/javascript">
						window.location.href="<?=$returnpage?>";
					</script>
					<noscript>
						<meta http-equiv="refresh" content="0;url=<?=$returnpage?>" />
					</noscript>
					<?php
					exit;
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
	require 'SteamConfig.php';
	session_unset();
	session_destroy();
	header('Location: '.$steamauth['logoutpage']);
	exit;
}

if (isset($_GET['update'])){
	unset($_SESSION['steam_uptodate']);
	require 'userInfo.php';
	header('Location: '.$_SERVER['PHP_SELF']);
	exit;
}
?>
