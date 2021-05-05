<?php
session_start();
$uid=$_SESSION['location'];



//echo $d;
		
?>
<html>
<head>
<style>
body{
	background-image:url("gym 11.jpg");
	background-repeat:no-repeat;
	background-size:100% 100%;
}

a{
	background-color:Grey;
	color:white;
	padding-bottom:10px;
	text-decoration:none;	
	border:1px soild orange;
	border-radius:10px;
	font-size:38px;
	padding:4px;
}

a:hover{
	background-color:white;
	color:red;
}

</style>
</head>
<body>
<left>
<br><br>
<a href ="reg.php"> Register New GYM Member </a><br><br>
<a href ="addp.php"> Add New Package </a><br><br>
<a href ="addt.php"> Add Trainer </a><br><br>
<a href ="mio.php"> In out timinig gym member </a><br><br>
<a href ="tio.php"> In out timinig gym trainer </a><br><br>
<a href ="deletem.php"> Delete gym member </a><br><br>
<a href ="deletep.php"> Delete package </a><br><br>
<a href ="deletet.php"> Delete trainer </a><br><br>
<a href ="fetchm.php"> List gym member and fess not paid </a><br><br>
<a href ="iotw.php"> View in out Timinig Member and Trainer </a><br><br>
<a href ="payfees.php"> Pay fess </a><br><br>
</left>
</body>
</html>