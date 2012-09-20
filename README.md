=== Currently in beta! ===

See a demo at http://cyanpanda.com/demo/index.php !

=== To Install ===

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