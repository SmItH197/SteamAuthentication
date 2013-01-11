<?php


require 'openid.php';
$api_key = "802AA72CC7B09FDBD9F6F829F5634CE8";
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
              
                session_start();
                $_SESSION['steamid'] = $steamprofile['steamid']; 
                $_SESSION['back'] = htmlentities($_SERVER[’REQUEST_URI’]); 
                echo '<h2>Welcome '.$steamprofile['personaname'].' You have successfuly logged in, click back to go back to where you came from: .';
                echo '<a href="'.$_SESSION['back'].'">back</a></h2>';
        } else {
                echo "User is not logged in.\n";
        }

    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}
}

