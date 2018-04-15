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

<h1>Delivery Authentication</h1>
<div align="left">
	<form action="Validate.php" method="post">
	<fieldset>
        VRN: <input type="text" name="VRN" required><br>
        Driver-ID: <input type="text" name="ID" required><br>
        Venue-ID: <input type="text" name="venue" required><br>
        Date: <input type="date" name="date" required><br>
        <input type="submit">
	</fieldset>
    </form>
</div>
</body>
<Footer>
    <a href="ReadMe.txt">Help</a>
</Footer>
</html>
