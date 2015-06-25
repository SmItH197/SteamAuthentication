<?php
    require ('steamauth/steamauth.php');  
    
	# You would uncomment the line beneath to make it refresh the data every time the page is loaded
	// $_SESSION['steam_uptodate'] = false;
?>
<html>
<head>
    <title>page</title>
</head>
<body>
<?php
if(!isset($_SESSION['steamid'])) {

    echo "welcome guest! please login \n \n";
    echo steamlogin(); //login button
    
}  else {
    include ('steamauth/userInfo.php');

    //Protected content
    echo "Welcome back " . $steamprofile['personaname'] . "</br>";
    echo "here is your avatar: </br>" . '<img src="'.$steamprofile['avatarfull'].'" title="" alt="" />'; // Display their avatar!
    
    logoutbutton();
}    
?>  
</body>
</html>