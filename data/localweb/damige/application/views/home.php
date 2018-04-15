<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		h1 { text-align: center; 	font-family: Calibri; }
		p.p-centre { text-align: center; font-family: Arial; }
		#cogs { display: block; padding-top: 20px; margin-left: auto; margin-right: auto; }		
	</style>
</head>
<body>

<h1>DAMIGE SYSTEM</h1>

<p class="p-centre">This system allows staff and the Registration and Id Office (RIO) at Invicitus Games Events to manage Deliveries.</p>
<p class="p-centre">Click one of the navigation links to begin.</p>

<div align="center">
	<form action="Validate.php" method="post">
        VRN: <input type="text" name="VRN" required><br>
        Driver-ID: <input type="text" name="ID" required><br>
        Venue: <input type="text" name="venue" required><br>
        Date: <input type="date" name="date" required><br>
        <input type="submit">
    </form>
</div>
</body>
</html>
