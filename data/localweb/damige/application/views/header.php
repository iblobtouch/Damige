<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<style>
	#nav { font-family: Arial; font-size: 14px; width: 100%; float: left; margin: 0 0 1em 0; padding: 0; list-style: none;}
	#nav {list-style: none; border:0;}
	#rightnav { list-style: none; }
	#nav li { float: left; }
	#rightnav li { float: right; }
	#nav li a { alignment-adjust:central; font-size: 15px; display: block; padding: 50px 50px; text-decoration: none; color: #000; background-color: #f2f2f2; border: 1px solid #c1c1c1;}
	#nav li a:hover {background-color: #f2e4d5;}
	#nav a:link, a:visited {border-radius: 12px 12px 12px 12px; }		
	</style>
<body style="background-color:lightblue;"}>
<h1 style="text-align:center" ><u>DAMIGE SYSTEM</u></h1>
</head>

</body>
    
<?php
session_start();
if(!isset($_SESSION['login'])){ //if login in session is not set
    header("Location: /damige/login.php");
}
?>

<p style="font-family:courier;">This system allows staff and the Registration and Id Office (RIO) at Invicitus Games Events to manage Deliveries.</p>
	<div>
		<ul id="nav">
		<li><a href='<?php echo site_url('')?>'>Home</a></li>
        <li><a href='<?php echo site_url('main/supplier')?>'>Suppliers</a></li>
		<li><a href='<?php echo site_url('main/driver')?>'>Drivers</a></li>
        <li><a href='<?php echo site_url('main/driverId')?>'>Driver ID's</a></li>
        <li><a href='<?php echo site_url('main/vehicle')?>'>Vehicles</a></li>
        <li><a href='<?php echo site_url('main/delivery')?>'>Deliveries</a></li>
        <li><a href='<?php echo site_url('main/venue')?>'>Venues</a></li>
        <li><a href='<?php echo site_url('main/logs')?>'>Logs</a></li>
		
			<ul id="rightnav">
			<!--
            <li><a href='<?php echo site_url('main/blank')?>'>Blank Page</a></li>
			<li><a href='<?php echo site_url('main/querynav')?>'>Queries</a></li>
            -->
			</ul>
		</ul>
	</div>
</body>
</html>
