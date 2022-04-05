<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <title>Registreren</title>
        <link rel="icon" href="EricArchief/img/Icon.png" type="png">
    </head>
    <body>
      <?php
        include("scripts/register_script.php");
        include("assets/navbar.php");
      ?>
      
	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
    </body>
</html>