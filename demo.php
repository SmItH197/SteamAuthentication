<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SteamAuth Demo</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-color: #EEE;">
    <div class="container" style="margin-top: 30px; margin-bottom: 30px; padding-bottom: 10px; background-color: #FFF;">
		<h1>SteamAuth Demo</h1>
		<span class="small pull-left" style="padding-right: 10px;">for SteamAuth 2.0</span>
		<hr>
		<?php
		require ('steamauth/steamauth.php'); 
if(!isset($_SESSION['steamid'])) {
    echo "<div style='margin: 30px auto; text-align: center;'>Welcome Guest! Please log in!";
    steamlogin();
	echo "</div>";
	}  else {
    include ('steamauth/userInfo.php');
    echo "<div style='float:left;'><a href='https://github.com/SmItH197/SteamAuthentication'><button type='button' class='btn btn-success' style='margin: 2px 3px;'>GitHub Repo</button></a><a href='https://github.com/SmItH197/SteamAuthentication/releases'><button type='button' style='margin: 2px 3px;' class='btn btn-warning'>Download</button></a></div><br><br>
	<h4 style='margin-bottom: 3px; float:left;'>Steam WebAPI-Output:</h4><span style='float:right;'><a href='steamauth/logout.php'>Log out</a></span>
	<table class='table table-striped'><tr><td><b>Variable name</b></td><td><b>Value</b></td><td><b>Description</b></td></tr>
	<tr><td>\$steamprofile['steamid']</td><td>".$steamprofile['steamid']."</td><td>SteamID64 of the user</td></tr>
	<tr><td>\$steamprofile['communityvisibilitystate']</td><td>".$steamprofile['communityvisibilitystate']."</td><td>1 - Account not visible; 3 - Account is public (Depends on the relationship of your account to the others)</td></tr>
	<tr><td>\$steamprofile['profilestate']</td><td style='width: 586px;'>".$steamprofile['profilestate']."</td><td>1 - The user has a Steam Community profile; 0 - if not</td></tr>
	<tr><td>\$steamprofile['personaname']</td><td style='width: 586px;'>".$steamprofile['personaname']."</td><td>Public name of the user</td></tr>
	<tr><td>\$steamprofile['lastlogoff']</td><td style='width: 586px;'>".$steamprofile['lastlogoff']."</td><td><a href='http://www.unixtimestamp.com/' target='_blank'>Unix timestamp</a> of the user's last logoff</td></tr>
	<tr><td>\$steamprofile['profileurl']</td><td style='width: 586px;'>".$steamprofile['profileurl']."</td><td>Link to the user's profile</td></tr>
	<tr><td>\$steamprofile['personastate']</td><td style='width: 586px;'>".$steamprofile['personastate']."</td><td>0 - Offline, 1 - Online, 2 - Busy, 3 - Away, 4 - Snooze, 5 - looking to trade, 6 - looking to play</td></tr>
	<tr><td>\$steamprofile['realname']</td><td style='width: 586px;'>".$steamprofile['realname']."</td><td>\"Real\" name</td></tr>
	<tr><td>\$steamprofile['primaryclanid']</td><td style='width: 586px;'>".$steamprofile['primaryclanid']."</td><td>The ID of the user's primary group</td></tr>
	<tr><td>\$steamprofile['timecreated']</td><td style='width: 586px;'>".$steamprofile['timecreated']."</td><td><a href='http://www.unixtimestamp.com/' target='_blank'>Unix timestamp</a> for the time the user's account was created</td></tr>
	<tr><td>\$steamprofile['avatar']</td><td style='width: 586px;'><img src='".$steamprofile['avatar']."'><br>".$steamprofile['avatar']."</td><td>Adress of the user's 32x32px avatar</td></tr>
	<tr><td>\$steamprofile['avatarmedium']</td><td style='width: 586px;'><img src='".$steamprofile['avatarmedium']."'><br>".$steamprofile['avatarmedium']."</td><td>Adress of the user's 64x64px avatar</td></tr>
	<tr><td>\$steamprofile['avatarfull']</td><td style='width: 586px;'><img src='".$steamprofile['avatarfull']."'><br>".$steamprofile['avatarfull']."</td><td>Adress of the user's 184x184px avatar</td></tr>
	</table>";
	}    
	?>
	<hr>
	<div class="pull-right"><i>This page is powered by <a href="http://steampowered.com">Steam</a></i></div>
	<a href="https://github.com/SmItH197/SteamAuthentication">GitHub Repo</a><br>
	Demo page by <a href="https://github.com/blackcetha" target="_blank">BlackCetha</a></div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  </body>
</html>