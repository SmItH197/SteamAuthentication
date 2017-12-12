<?php

    // Your Steam WebAPI-Key found at http://steamcommunity.com/dev/apikey

    $steam_authentication_api_key = ''; 

    // The main URL of your website displayed in the login page

    $steam_authentication_domain_name = ''; 

    // Page to redirect to after a successfull logout (from the directory the SteamAuth-folder is located in) - NO slash at the beginning!

    $steam_authentication_logout_page = ''; 

    // Page to redirect to after a successfull login (from the directory the SteamAuth-folder is located in) - NO slash at the beginning!

    $steam_authentication_login_page = ''; 

    if ( empty( $steam_authentication_api_key ) ) 
    {
        die( 'Please supply an API-Key! Find this in steam-authentication-config.php, Find the <b>steam_authentication_api_key</b>.' );
    }

    if ( empty( $steam_authentication_domain_name ) )
    {
        $steam_authentication_domain_name = $_SERVER[ 'SERVER_NAME' ];
    }
    
    if ( empty( $steam_authentication_logout_page ) ) 
    {
        $steam_authentication_logout_page = $_SERVER[ 'PHP_SELF' ];
    }

    if ( empty( $steam_authentication_login_page ) ) 
    {
        $steam_authentication_login_page = $_SERVER[ 'PHP_SELF' ];
    }

?>
