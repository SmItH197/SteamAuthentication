Currently in the process of creating a new, improved, cleaner version of this! (4th june 2013)
==========================

See a demo at *link coming soon - just updating my website ;) !

Foreword
==========================

Thanks goes to:
- JTX for the original steam openid script (http://pastebin.com/6vZT4RhD)
- The LightopenID library (http://gitorious.org/lightopenid)

To Install
==========================

Upload the `steamauth` folder.

Open up steamauth.php and change localhost to your domain
Find $api_key on line 5 and set it to the api key you got from http://steamcommunity.com/dev/apikey

Now in your file add the following:

    <?php

    require 'steamauth/steamauth.php';

    if(!isset($_SESSION['steamid'])) {

        steamlogin(); //login button
    
    }  else {
        //Protected content

        logoutbutton(); //Logout Button
    }     
    ?>
    
    
    
 

