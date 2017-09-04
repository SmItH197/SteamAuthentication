# SteamAuthentication

SteamAuthentication is a basic set of PHP files that enable users to login using their steam account to view protected content on your website. it creates a session using their steamid as the sessionID and checks for the session when a user visits the page. It also includes a file which allows you to use their profile information such as their avatar and online status.

See a demo at https://bensmith.in/steam/

## Gambling Sites

I nor Steam condone the use of this library for the purpose of gambling sites. Any sites that use this library for this purpose violates their API agreement and will receive notices from Steam to cease operations.

Read more here:
http://store.steampowered.com/news/22883/

By downloading this library you agree that you will not use it for any gambling or illegal activity.

## Issues

For Issues relating directly to this SteamAuthentication Library feel free to create a Github Issue.

**For any general PHP or SQL problems please use [stackoverflow](http://stackoverflow.com/) or similar,
else we will generally close these straight away if created here, thanks!**

## Download

Please note the main repository is constantly being updated so may contain bugs and other bleeding edge risks. For a stable download please visit the releases page: https://github.com/SmItH197/SteamAuthentication/releases

## Foreword

Thanks goes to:
- JTX for the original steam openid script (http://pastebin.com/6vZT4RhD)
- The LightopenID library (http://gitorious.org/lightopenid)

**Using MySQL?** Don't forget to sanitise your inputs!

## To Install

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

##### Be aware that naming a file in your webpage root like any file in the steamauth folder will break SteamAuth.

### Choosing a login button style

by default `loginbutton();` will display ![image](https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_02.png)

You can choose the style of the login button by specifying a variable like the following:

loginbutton("rectangle"); 

![image](https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_01.png)


loginbutton();
-OR-
loginbutton("square"); 

![image](https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_02.png)

    
## Using Profile Variables

I have created a userInfo.php file which creates an array of ready to use variables that includes profile information of the steam user that has logged in:

* `$steamprofile['steamid']` - The user's unique SteamID
* `$steamprofile['communityvisibilitystate']` - This represents whether the profile is visible or not.
* `$steamprofile['profilestate']` - If set, indicates the user has a community profile configured (will be set to '1')
* `$steamprofile['personaname']` - Their current set profile name
* `$steamprofile['lastlogoff']` - Last time the user was online in unix time [Check out the wiki for help on converting to date/time](https://github.com/SmItH197/SteamAuthentication/wiki/Converting-Unix-Time-Stamp)
* `$steamprofile['profileurl']` - The URL to their steam profile
* `$steamprofile['avatar']` - The image URL to the smallest size of their avatar (32px x 32px)
* `$steamprofile['avatarmedium']` - The image URL to the medium sized version of their avatar (64px x 64px)
* `$steamprofile['avatarfull']` - The image URL to the largest size of their avatar (184px x 184px)
* `$steamprofile['personastate']` - The user's current state, 1 - Online, 2 - Busy, 3 - Away, 4 - Snooze, 5 - looking to trade, 6 - looking to play
* `$steamprofile['realname']` - The user's "real" name
* `$steamprofile['primaryclanid']` - The user's primary group
* `$steamprofile['timecreated']` - When the account was created in unix time [Check out the wiki for help on converting to date/time](https://github.com/SmItH197/SteamAuthentication/wiki/Converting-Unix-Time-Stamp)
* `$_SESSION['steam_uptodate']` - When profile information was last updated in unix time

Please note that some of these variables may be unavailable for some users as it depends on their privacy settings. 

#### Update User Information

To refresh a user's Steam profile data use:
html: `<a href="?update">update</a>` - recommended
-OR-
php: `$_GET['update']=true;` - this must be set before `require 'steamauth/steamauth.php';`

###### Automatically refresh Steam profile data if older than specified time when they next visit your site

change line 67 of `steamauth.php` 
From:
```php
if (isset($_GET['update'])){ 
```
To:
```php
if (isset($_GET['update']) || !empty($_SESSION['steam_uptodate']) && $_SESSION['steam_uptodate']+(24*60*60) < time()){ 
```
- example shown would update if older than 24 hours.

- the numbers in the brackets `$_SESSION['steam_uptodate']+(24*60*60)` should be the maximum number of seconds before refreshing a user's Steam Profile data.

---

For more help on laying out the document or using the $steamprofile variable see the example.php or the demo.php file!
 

