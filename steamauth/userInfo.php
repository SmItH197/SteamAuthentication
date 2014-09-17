<?php

    $api_key = ""; // Insert API Key here!

    $url = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".$api_key."&steamids=".$_SESSION['steamid']); 
    $content = json_decode($url, true);

    $steamprofile['steamid'] = $content['response']['players'][0]['steamid'];
    $steamprofile['communityvisibilitystate'] = $content['response']['players'][0]['communityvisibilitystate'];
    $steamprofile['profilestate'] = $content['response']['players'][0]['profilestate'];
    $steamprofile['personaname'] = $content['response']['players'][0]['personaname'];
    $steamprofile['lastlogoff'] = $content['response']['players'][0]['lastlogoff'];
    $steamprofile['profileurl'] = $content['response']['players'][0]['profileurl'];
    $steamprofile['avatar'] = $content['response']['players'][0]['avatar'];
    $steamprofile['avatarmedium'] = $content['response']['players'][0]['avatarmedium'];
    $steamprofile['avatarfull'] = $content['response']['players'][0]['avatarfull'];
    $steamprofile['personastate'] = $content['response']['players'][0]['personastate'];
    $steamprofile['realname'] = $content['response']['players'][0]['realname'];
    $steamprofile['primaryclanid'] = $content['response']['players'][0]['primaryclanid'];
    $steamprofile['timecreated'] = $content['response']['players'][0]['timecreated'];
?>
    
