<?php require_once 'steam-authentication.php'; ?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>STEAM AUTHENTICATION</title>
<style>

    table
    {
        width:100%;
        border-collapse:collapse;
        border-width:1px 1px 0 1px;
        border-style:solid;
        border-color:black;
    }
    td
    {
        padding:10px;
        border-bottom:1px solid black;
    }

</style>
</head>
<body>
<div class="container">
<h1>STEAM AUTHENTICATION</h1>
<?php if ( isset( $_SESSION[ 'steam_identity_number' ] ) ): ?> 
<?php steam_authentication_logout_button(); ?>
<h4>Steam WebAPI-Output:</h4>
<table>
<tr>
<td><b>VARIABLE NAME</b></td>
<td><b>VALUE</b></td>
<td><b>DESCRIPTION</b></td>
</tr>
<tr>
<td>$steam_authentication[ 'steam_identity_number' ]</td>
<td><?php echo $steam_authentication[ 'steam_identity_number' ]; ?></td>
<td>SteamID64 of the user</td>
</tr>
<tr>
<td>$steam_authentication[ 'communityvisibilitystate' ]</td>
<td><?php echo $steam_authentication[ 'communityvisibilitystate' ]; ?></td>
<td>1 - Account not visible; 3 - Account is public (Depends on the relationship of your account to the others)</td>
</tr>
<tr>
<td>$steam_authentication[ 'profilestate' ]</td>
<td><?php echo $steam_authentication[ 'profilestate' ]; ?></td>
<td>1 - The user has a Steam Community profile; 0 - if not</td>
</tr>
<tr>
<td>$steam_authentication[ 'personaname' ]</td>
<td><?php echo $steam_authentication[ 'personaname' ]; ?></td>
<td>Public name of the user</td>
</tr>
<tr>
<td>$steam_authentication[ 'lastlogoff' ]</td>
<td><?php echo $steam_authentication[ 'lastlogoff' ]; ?></td>
<td><a href="http://www.unixtimestamp.com/" target="_blank">Unix timestamp</a> of the user's last logoff</td>
</tr>
<tr>
<td>$steam_authentication[ 'profileurl' ]</td>
<td><?php echo $steam_authentication[ 'profileurl' ]; ?></td>
<td>Link to the user's profile</td>
</tr>
<tr>
<td>$steam_authentication[ 'personastate' ]</td>
<td><?php echo $steam_authentication[ 'personastate' ]; ?></td>
<td>0 - Offline, 1 - Online, 2 - Busy, 3 - Away, 4 - Snooze, 5 - looking to trade, 6 - looking to play</td>
</tr>
<tr>
<td>$steam_authentication[ 'realname' ]</td>
<td><?php echo $steam_authentication[ 'realname' ]; ?></td>
<td>"Real" name</td>
</tr>
<tr>
<td>$steam_authentication[ 'primaryclanid' ]</td>
<td><?php echo $steam_authentication[ 'primaryclanid' ]; ?></td>
<td>The ID of the user's primary group</td>
</tr>
<tr>
<td>$steam_authentication[ 'timecreated' ]</td>
<td><?php echo $steam_authentication[ 'timecreated' ]; ?></td>
<td><a href="http://www.unixtimestamp.com/" target="_blank">Unix timestamp</a> for the time the user's account was created</td>
</tr>
<tr>
<td>$steam_authentication[ 'up_to_date' ]</td>
<td><?php echo $steam_authentication[ 'up_to_date' ]; ?></td>
<td><a href="http://www.unixtimestamp.com/" target="_blank">Unix timestamp</a> for the time the user's account information was last updated</td>
</tr>
<tr>
<td>$steam_authentication[ 'avatar' ]</td>
<td><img src="<?php echo $steam_authentication[ 'avatar' ]; ?>"><br><?php echo $steam_authentication[ 'avatar' ]; ?>
</td>
<td>Address of the user's 32x32px avatar</td>
</tr>
<tr>
<td>$steam_authentication[ 'avatarmedium' ]</td>
<td><img src="<?php echo $steam_authentication[ 'avatarmedium' ]; ?>"><br><?php echo $steam_authentication[ 'avatarmedium' ]; ?></td>
<td>Address of the user's 64x64px avatar</td>
</tr>
<tr>
<td>$steam_authentication[ 'avatarfull' ]</td>
<td>
<img src="<?php echo $steam_authentication[ 'avatarfull' ]; ?>"><br><?php echo $steam_authentication[ 'avatarfull' ]; ?></td>
<td>Address of the user's 184x184px avatar</td>
</tr>
</table>
<?php else: ?> 
<div class="container">Welcome Guest! Please log in!<br>
<?php steam_authentication_login_button(); ?>
</div>
<?php endif; ?>
<div class="container">This page is powered by <a href="http://steampowered.com">Steam</a></div>
<div class="container"><a href="https://github.com/SmItH197/SteamAuthentication">GitHub</a></div>
<div class="container">Demo page by <a href="https://github.com/blackcetha" target="_blank">BlackCetha</a></div>
</div>
</body>
</html>