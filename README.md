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

    session_start();
    if(isset($_SESSION['steamid'])) {

    //Protected content
    echo "<form action=\"steamauth/logout.php\" method=\"post\"><input value=\"Logout\" type=\"submit\" /></form>"; //logout button
    }  
    else {
    steamlogin(); //login button
    }    
    ?>
    
    
    
PLEASE NOTE:
=============

When the user returns to your site after logging in they will no be returned to the page they were previously at! 
An example of this can be seen on the demo site (http://cyanpanda.com/demo/index.php) the url will look something like:

 http://cyanpanda.com/demo/index.php?login&openid.ns=http%3A%2F%2Fspecs.openid.net%.....
 
**Users will not be able to see the content they logged in for!**

**However if they then go to the page they were at before. Example:**
 
 http://cyanpanda.com/demo/index.php
 
**Users can now see the secured content! I am currently working my way round it! Thanks for your patience!**
 

