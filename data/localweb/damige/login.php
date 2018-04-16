<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		h1 { text-align: center; 	font-family: Calibri; }
		#cogs { display: block; padding-top: 20px; margin-left: auto; margin-right: auto; }		
	</style>
</head>
<body>

<h1>Enter your username and password.</h1>
<p>For testing only: user = admin, password = password</p>
<div align="left">
	<form action="validate_login.php" method="post">
	<fieldset>
        Username: <input type="text" name="user" required><br>
        Password: <input type="text" name="pass" required><br>
        <input type="submit">
	</fieldset>
    </form>
</div>
</body>
</html>
