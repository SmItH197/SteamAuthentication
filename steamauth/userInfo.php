<?php

    $urla = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key="; //Insert API Key after ?key
    $urlb = "&steamids=";
    $urlc = $urla . $urlb;
    $url = $urlc . $_SESSION['steamid'];
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $url);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    $content = curl_exec($ch);
    curl_close($ch);
    $content = json_decode($content, true);

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

    