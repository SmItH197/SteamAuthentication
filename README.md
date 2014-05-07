#SteamAuthenitication

SteamAuthentication is a basic set of PHP files that enable users to login using their steam account to view protected content on your website. it creates a session using their steamid as the sessionID and checks for the session when a user visits the page. It also includes a file which allows you to use their profile information such as their avatar and online status.

See a demo at http://bensmith.in/steam/demo/

Please note the main repository is constantly being updated so may contain bugs and other bleeding edge risks. For a stable download please visit the releases page.

##Foreword

Thanks goes to:
- JTX for the original steam openid script (http://pastebin.com/6vZT4RhD)
- The LightopenID library (http://gitorious.org/lightopenid)

##To Install

Upload the `steamauth` folder.

Open up steamauth.php and change localhost to your domain. Now find $api_key on line 5 and set it to the api key you got from http://steamcommunity.com/dev/apikey . Now do the same with the $api_key variable on line 3 of userInfo.php.

Now in your file add the following at the top:

    <?php

    require 'steamauth/steamauth.php';
    
    ?>
    
And where you want the protected content to be:

    <?php
    if(!isset($_SESSION['steamid'])) {

        steamlogin(); //login button
    
    }  else {
    
        include ('steamauth/userInfo.php'); //To access the $steamprofile array
        //Protected content

        logoutbutton(); //Logout Button
    }     
    ?>
    
By default, the logout button redirects to index.php, this can be changed in the `logout.php` file on line 2.
    
##Using Profile Variables

I have create a userInfo.php file which creates an array of ready to use variables that includes profile information of the steam user that has logged in:

* `$steamprofile['steamid']` - The users unique SteamID
* `$steamprofile['communityvisibilitystate']` - This represents whether the profile is visible or not.
* `$steamprofile['profilestate']` - If set, indicates the user has a community profile configured (will be set to '1')
* `$steamprofile['personaname']` - Their current set profile name
* `$steamprofile['lastlogoff']` - Last time the user was online in unix time
* `$steamprofile['profileurl']` - The URL to their steam profile
* `$steamprofile['avatar']` - The image URL to the smallest size of their avatar (32px x 32px)
* `$steamprofile['avatarmedium']` - The image URL to the medium sized version of their avatar (64px x 64px)
* `$steamprofile['avatarfull']` - The image URL to the largest size of their avatar (184px x 184px)
* `$steamprofile['personastate']` - The users current state, 1 - Online, 2 - Busy, 3 - Away, 4 - Snooze, 5 - looking to trade, 6 - looking to play
* `$steamprofile['realname']` - Get the real name
* `$steamprofile['primaryclanid']` - The users primary group
* `$steamprofile['timecreated']` - When the account was created

Please note that some of these variables may be unavailable for some users as it depends on their privacy settings. 

* For more help on laying out the document or using the $steamprofile variable see the example.php file!

 

