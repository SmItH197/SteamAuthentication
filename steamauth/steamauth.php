<?php


require 'openid.php';
$api_key = "";
function steamlogin()
{
try {
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID('localhost');
    if(!$openid->mode) {
        if(isset($_GET['login'])) {
            $openid->identity = 'http://steamcommunity.com/openid';
            header('Location: ' . $openid->authUrl());
        }
    echo "<form action=\"?login\" method=\"post\"> <input type=\"image\" src=\"http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_large_border.png\"></form>";
}

     elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
    } else {
        if($openid->validate()) { 
                $id = $openid->identity;
                $ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
                preg_match($ptn, $id, $matches);
                $api_key = "";
                $urla = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=";
                $urlb = $urla . $api_key;
                $urlc = "&steamids=";
                $urld = $urlb . $urlc;
                $url = $urld . $matches[1];
                $ch = curl_init();
                curl_setopt( $ch, CURLOPT_URL, $url);
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
                $content = curl_exec($ch);
                curl_close($ch);
                $content = json_decode($content, true);
                
                $steamprofile['steamid'] = $content[response][players][0][steamid];
                $steamprofile['communityvisibilitystate'] = $content[response][players][0][communityvisibilitystate];
                $steamprofile['profilestate'] = $content[response][players][0][profilestate];
                $steamprofile['personaname'] = $content[response][players][0][personaname];
                $steamprofile['lastlogoff'] = $content[response][players][0][lastlogoff];
                $steamprofile['profileurl'] = $content[response][players][0][profileurl];
                $steamprofile['avatar'] = $content[response][players][0][avatar];
                $steamprofile['avatarmedium'] = $content[response][players][0][avatarmedium];
                $steamprofile['avatarfull'] = $content[response][players][0][avatarfull];
                $steamprofile['personastate'] = $content[response][players][0][personastate];
                $steamprofile['realname'] = $content[response][players][0][realname];
                $steamprofile['primaryclanid'] = $content[response][players][0][primaryclanid];
                $steamprofile['timecreated'] = $content[response][players][0][timecreated];
              
                session_start();
                $_SESSION['steamid'] = $steamprofile['steamid']; 
        } else {
                echo "User is not logged in.\n";
        }

    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}
}

