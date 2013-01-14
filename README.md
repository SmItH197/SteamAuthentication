Currently in alpha!
==========================

See a demo at http://cyanpanda.com/demo/index.php !

Foreword
==========================

Thanks goes to:
- JTX for the original steam openid script (http://pastebin.com/6vZT4RhD)
- The LightopenID library (http://gitorious.org/lightopenid)

To Install
==========================

Upload the files.

Open up steamauth.php and change localhost to your domain
Find $api_key and set it to the api key you got from http://steamcommunity.com/dev/apikey
Go to line 27 and add you API key there as well.

Now in your file:

add the following:

    <?php

    require 'steamauth/profilevars.php';

    if(!isset($_SESSION['steamid'])) {

        echo "welcome guest! please login \n \n";
        steamlogin(); //login button
    
    }  else {
        //Protected content
        echo "OMG! You logged in! :D \n";
        echo "your steam ID is: " . $_SESSION['steamid'] . "\n"; //prints their steam ID!
        logoutbutton();
    }     
    ?>
    
    
    
 

