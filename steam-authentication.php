<?php

    ob_start();

    session_start();

    require_once 'class-light-open-identification.php';
 
    require_once 'steam-authentication-config.php';

    //-------------------------------------------------
    // LOGIN / LOGOUT BUTTONS
    //-------------------------------------------------

    function steam_authentication_login_button() 
    {
        echo '<a href="?steam_authentication"><img src="https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_01.png"></a>';
    }

    function steam_authentication_logout_button() 
    {
        echo '<form action="" method="get"><button name="logout" type="submit">Logout</button></form>';
    }

    //-------------------------------------------------
    // GET STEAM USER DATA
    //-------------------------------------------------

    if ( isset( $_SESSION[ 'steam_identity_number' ] ) && empty( $_SESSION[ 'up_to_date' ] ) )
    {
        $content = file_get_contents( 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $steam_authentication_api_key . '&steamids=' . $_SESSION[ 'steam_identity_number' ] ); 
        
        $content = json_decode( $content, true );

        $_SESSION[ 'steam_identity_number' ] = isset( $content[ 'response' ][ 'players' ][ 0 ][ 'steamid' ] ) ? $content[ 'response' ][ 'players' ][ 0 ][ 'steamid' ] : 0;

        $_SESSION[ 'communityvisibilitystate' ] = isset( $content[ 'response' ][ 'players' ][ 0 ][ 'communityvisibilitystate' ] ) ? $content[ 'response' ][ 'players' ][ 0 ][ 'communityvisibilitystate' ] : 0;

        $_SESSION[ 'profilestate' ] = isset( $content[ 'response' ][ 'players' ][ 0 ][ 'profilestate' ] ) ? $content[ 'response' ][ 'players' ][ 0 ][ 'profilestate' ] : 0;

        $_SESSION[ 'personaname' ] = isset( $content[ 'response' ][ 'players' ][ 0 ][ 'personaname' ] ) ? $content[ 'response' ][ 'players' ][ 0 ][ 'personaname' ] : null;

        $_SESSION[ 'lastlogoff' ] = isset( $content[ 'response' ][ 'players' ][ 0 ][ 'lastlogoff' ] ) ? $content[ 'response' ][ 'players' ][ 0 ][ 'lastlogoff' ] : 0;

        $_SESSION[ 'profileurl' ] = isset( $content[ 'response' ][ 'players' ][ 0 ][ 'profileurl' ] ) ? $content[ 'response' ][ 'players' ][ 0 ][ 'profileurl' ] : null;

        $_SESSION[ 'avatar' ] = isset( $content[ 'response' ][ 'players' ][ 0 ][ 'avatar' ] ) ? $content[ 'response' ][ 'players' ][ 0 ][ 'avatar' ] : null;

        $_SESSION[ 'avatarmedium' ] = isset( $content[ 'response' ][ 'players' ][ 0 ][ 'avatarmedium' ] ) ? $content[ 'response' ][ 'players' ][ 0 ][ 'avatarmedium' ] : null;

        $_SESSION[ 'avatarfull' ] = isset( $content[ 'response' ][ 'players' ][ 0 ][ 'avatarfull' ] ) ? $content[ 'response' ][ 'players' ][ 0 ][ 'avatarfull' ] : null;

        $_SESSION[ 'personastate' ] = isset( $content[ 'response' ][ 'players' ][ 0 ][ 'personastate' ] ) ? $content[ 'response' ][ 'players' ][ 0 ][ 'personastate' ] : 0;

        $_SESSION[ 'realname' ] = isset( $content[ 'response' ][ 'players' ][ 0 ][ 'realname' ] ) ? $content[ 'response' ][ 'players' ][ 0 ][ 'realname' ] : null;

        $_SESSION[ 'primaryclanid' ] = isset( $content[ 'response' ][ 'players' ][ 0 ][ 'primaryclanid' ] ) ? $content[ 'response' ][ 'players' ][ 0 ][ 'primaryclanid' ] : 0;

        $_SESSION[ 'timecreated' ] = isset( $content[ 'response' ][ 'players' ][ 0 ][ 'timecreated' ] ) ? $content[ 'response' ][ 'players' ][ 0 ][ 'timecreated' ] : 0;

        $_SESSION[ 'up_to_date' ] = time();
    }

    //-------------------------------------------------
    // VAR
    //-------------------------------------------------

    $steam_authentication[ 'steam_identity_number' ] = isset( $_SESSION[ 'steam_identity_number' ] ) ? $_SESSION[ 'steam_identity_number' ] : 0;

    $steam_authentication[ 'communityvisibilitystate' ] = isset( $_SESSION[ 'communityvisibilitystate' ] ) ? $_SESSION[ 'communityvisibilitystate' ] : 0;

    $steam_authentication[ 'profilestate' ] = isset( $_SESSION[ 'profilestate' ] ) ? $_SESSION[ 'profilestate' ] : 0;

    $steam_authentication[ 'personaname' ] = isset( $_SESSION[ 'personaname' ] ) ? $_SESSION[ 'personaname' ] : null;

    $steam_authentication[ 'lastlogoff' ] = isset( $_SESSION[ 'lastlogoff' ] ) ? $_SESSION[ 'lastlogoff' ] : 0;

    $steam_authentication[ 'profileurl' ] = isset( $_SESSION[ 'profileurl' ] ) ? $_SESSION[ 'profileurl' ] : null;

    $steam_authentication[ 'avatar' ] = isset( $_SESSION[ 'avatar' ] ) ? $_SESSION[ 'avatar' ] : null;

    $steam_authentication[ 'avatarmedium' ] = isset( $_SESSION[ 'avatarmedium' ] ) ? $_SESSION[ 'avatarmedium' ] : null;

    $steam_authentication[ 'avatarfull' ] = isset( $_SESSION[ 'avatarfull' ] ) ? $_SESSION[ 'avatarfull' ] : null;

    $steam_authentication[ 'personastate' ] = isset( $_SESSION[ 'personastate' ] ) ? $_SESSION[ 'personastate' ] : 0;

    $steam_authentication[ 'realname' ] = isset( $_SESSION[ 'realname' ] ) ? $_SESSION[ 'realname' ] : null;

    $steam_authentication[ 'primaryclanid' ] = isset( $_SESSION[ 'primaryclanid' ] ) ? $_SESSION[ 'primaryclanid' ] : 0;

    $steam_authentication[ 'timecreated' ] = isset( $_SESSION[ 'timecreated' ] ) ? $_SESSION[ 'timecreated' ] : 0;

    $steam_authentication[ 'up_to_date' ] = isset( $_SESSION[ 'up_to_date' ] ) ? $_SESSION[ 'up_to_date' ] : 0;

    //-------------------------------------------------
    // STEAM AUTHENTICATION
    //-------------------------------------------------

    if ( isset( $_REQUEST[ 'steam_authentication' ] ) )
    {
        try
        {
            $light_open_id = new LightOpenID( $steam_authentication_domain_name );

            if ( $light_open_id->mode == false )
            {
                $light_open_id->identity = 'http://steamcommunity.com/openid';

                header( 'Location: ' . $light_open_id->authUrl() );

                exit;
            }

            if ( $light_open_id->validate() )
            {
                preg_match( '/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/', $light_open_id->identity, $matches );

                $_SESSION[ 'steam_identity_number' ] = $matches[ 1 ];

                header( 'Location: ' . $_SERVER[ 'PHP_SELF' ] );

                exit;
            }
        }
        catch ( ErrorException $e )
        {
            echo $e->getMessage();
        }
    }

    //-------------------------------------------------
    // LOGOUT
    //-------------------------------------------------

    if ( isset( $_REQUEST[ 'logout' ] ) )
    {
        session_unset();

        session_destroy();

        header( 'Location: ' . $steam_authentication_logout_page );

        exit;
    }

    //-------------------------------------------------
    // UPDATE
    //-------------------------------------------------

    if ( isset( $_REQUEST[ 'update' ] ) )
    {
        unset( $_SESSION[ 'steam_up_to_date' ] );

        header( 'Location: ' . $_SERVER[ 'PHP_SELF' ] );

        exit;
    }

?>