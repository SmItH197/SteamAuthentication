<?php
    require ('steamauth/steamauth.php');  
    
	# You would uncomment the line beneath to make it refresh the data every time the page is loaded
	// $_SESSION['steam_uptodate'] = false;
?>
<html>
<head>
    <title>page</title>
</head>
<body>
<?php
if(!isset($_SESSION['steamid'])) {

    echo "welcome guest! please login \n \n";
    steamlogin(); //login button
    
}  else {
    include ('steamauth/userInfo.php');
<<<<<<< HEAD
    echo "<div style='float:left;'><a href='https://github.com/SmItH197/SteamAuthentication'><button type='button' class='btn btn-success' style='margin: 2px 3px;'>GitHub Repo</button></a><a href='https://github.com/SmItH197/SteamAuthentication/releases'><button type='button' style='margin: 2px 3px;' class='btn btn-warning'>Download</button></a></div><br><br>
	<h4 style='margin-bottom: 3px; float:left;'>Steam WebAPI-Output:</h4><span style='float:right;'><a href='steamauth/logout.php'>Log out</a></span>
	<table class='table table-striped'><tr><td><b>Variable name</b></td><td><b>Value</b></td><td><b>Description</b></td></tr>
	<tr><td>\$steamprofile['steamid']</td><td>".$steamprofile['steamid']."</td><td>SteamID64 of the user</td></tr>
	<tr><td>\$steamprofile['communityvisibilitystate']</td><td>".$steamprofile['communityvisibilitystate']."</td><td>1 - Account not visible; 3 - Account is public (Depends on the relationship of your account to the others)</td></tr>
	<tr><td>\$steamprofile['profilestate']</td><td>".$steamprofile['profilestate']."</td><td>1 - The user has a Steam Community profile; 0 - if not</td></tr>
	<tr><td>\$steamprofile['personaname']</td><td>".$steamprofile['personaname']."</td><td>Public name of the user</td></tr>
	<tr><td>\$steamprofile['lastlogoff']</td><td>".$steamprofile['lastlogoff']."</td><td><a href='http://www.unixtimestamp.com/' target='_blank'>Unix timestamp</a> of the user's last logoff</td></tr>
	<tr><td>\$steamprofile['profileurl']</td><td>".$steamprofile['profileurl']."</td><td>Link to the user's profile</td></tr>
	<tr><td>\$steamprofile['personastate']</td><td>".$steamprofile['personastate']."</td><td>0 - Offline, 1 - Online, 2 - Busy, 3 - Away, 4 - Snooze, 5 - looking to trade, 6 - looking to play</td></tr>
	<tr><td>\$steamprofile['realname']</td><td>".$steamprofile['realname']."</td><td>\"Real\" name</td></tr>
	<tr><td>\$steamprofile['primaryclanid']</td><td>".$steamprofile['primaryclanid']."</td><td>The ID of the user's primary group</td></tr>
	<tr><td>\$steamprofile['timecreated']</td><td>".$steamprofile['timecreated']."</td><td><a href='http://www.unixtimestamp.com/' target='_blank'>Unix timestamp</a> for the time the user's account was created</td></tr>
	<tr><td>\$steamprofile['avatar']</td><td><img src='".$steamprofile['avatar']."'><br>".$steamprofile['avatar']."</td><td>Adress of the user's 32x32px avatar</td></tr>
	<tr><td>\$steamprofile['avatarmedium']</td><td><img src='".$steamprofile['avatarmedium']."'><br>".$steamprofile['avatarmedium']."</td><td>Adress of the user's 64x64px avatar</td></tr>
	<tr><td>\$steamprofile['avatarfull']</td><td><img src='".$steamprofile['avatarfull']."'><br>".$steamprofile['avatarfull']."</td><td>Adress of the user's 184x184px avatar</td></tr>
	</table>";
	}    
	?>
	<hr>
	<div class="pull-right"><i>This page uses Bootstrap because it's fancy</i></div>
	<a href="https://github.com/SmItH197/SteamAuthentication">GitHub Repo</a><br>
	Demo page by <a href="https://github.com/blackcetha" target="_blank">BlackCetha</a></div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  </body>
=======

    //Protected content
    echo "Welcome back " . $steamprofile['personaname'] . "</br>";
    echo "here is your avatar: </br>" . '<img src="'.$steamprofile['avatarfull'].'" title="" alt="" />'; // Display their avatar!
    
    logoutbutton();
}    
?>  
</body>
>>>>>>> parent of 216edbb... Styled example.php that lists all variables
</html>