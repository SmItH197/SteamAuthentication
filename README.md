#SteamAuthentication

SteamAuthentication is a basic set of PHP files that enable users to login using their steam account to view protected content on your website. it creates a session using their steamid as the sessionID and checks for the session when a user visits the page. It also includes a file which allows you to use their profile information such as their avatar and online status.

See a demo at http://bensmith.in/example.php

##Download

Please note the main repository is constantly being updated so may contain bugs and other bleeding edge risks. For a stable download please visit the releases page: https://github.com/SmItH197/SteamAuthentication/releases

##Foreword

Thanks goes to:
- JTX for the original steam openid script (http://pastebin.com/6vZT4RhD)
- The LightopenID library (http://gitorious.org/lightopenid)

**Using MySQL?** Don't forget to sanitise your inputs!

##To Install

Upload the `steamauth` folder.

Open up `SteamConfig.php` 
- change `domainname` to your domain name.
- change `apikey` to your API-Key from http://steamcommunity.com/dev/apikey


Now in the page that you would like to use the steamauth library, add the following at the top:

```php
<?php

require 'steamauth/steamauth.php';

?>
```
And where you want the protected content to be:
```php
<?php
if(!isset($_SESSION['steamid'])) {

    loginbutton(); //login button

}  else {

    include ('steamauth/userInfo.php'); //To access the $steamprofile array
    //Protected content

    logoutbutton(); //Logout Button
}     
?>
```
By default, the logout & login buttons reload the current page, this can be changed in the SteamConfig file.

#####Be aware that naming a file in your webpage root like any file in the steamauth folder will break SteamAuth.

###Choosing a login button style

by default `loginbutton();` will display ![image](https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_large_noborder.png)

You can choose the style of the login button by specifying a variable like the following:

loginbutton("small"); 

![image](https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_small.png)


loginbutton();
-OR-
loginbutton("large_no"); 

![image](https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_large_noborder.png)

loginbutton("large"); 

![image](https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_large_border.png)

    
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
* `$steamprofile['realname']` - The users "real" name
* `$steamprofile['primaryclanid']` - The users primary group
* `$steamprofile['timecreated']` - When the account was created
* `$_SESSION['steam_uptodate']` - Unset to refresh data from Steam

Please note that some of these variables may be unavailable for some users as it depends on their privacy settings. 

* For more help on laying out the document or using the $steamprofile variable see the example.php file!

 

