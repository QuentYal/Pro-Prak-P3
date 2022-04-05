<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <title>Login</title>
        <link rel="icon" href="./img/Icon.png" type="png">
    </head>
    <body>
        <?php
            include("scripts/login_script.php");
            include("assets/navbar.php"); 
        ?>
        
        <div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="register.php">Click to Signup</a><br><br>
		</form>
	</div>

    </body>
</html>