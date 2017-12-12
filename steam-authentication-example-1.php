<?php require_once 'steam-authentication.php'; ?>
<!DOCTYPE html>
<html>
<title>STEAM AUTHENTICATION</title>
<body>
<?php if ( isset( $_SESSION[ 'steam_identity_number' ] ) ): ?>
Welcome back <?php echo $steam_authentication[ 'personaname' ]; ?>
<br>
here is your avatar:
<br>
<img src="<?php echo $steam_authentication[ 'avatarfull' ]; ?>" title="" alt="">
<br>
<?php echo steam_authentication_logout_button(); ?>
<?php else: ?>
welcome guest! please login
<br>
<br>
<?php echo steam_authentication_login_button(); ?>
<?php endif; ?> 
</body>
</html>