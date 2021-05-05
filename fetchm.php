<html>
<head>
<style>
</style>
<link rel="stylesheet" type="text/css" href="2.css">
</head>
<body>
<a href="home.php" style="color:grey; font-size:35px; text-decoration:none">home</a>
<?php
session_start();
		date_default_timezone_set('Asia/Kolkata');
		$date=date("y-m-d");
		$location=$_SESSION['location'];
		$con = new mysqli("localhost","root","","gymsystem");
		echo"<form method='post' action='fetchm.php'><br><center><input type='submit' name='sa1' value='see all members' > &nbsp &nbsp <input type='submit' name='sa2' name='sa2' value='fess not paid'> <center><br>";
		if(isset($_POST['sa1']))
		{
			$sql1="select * from gym_mem";
			$rs1=$con->query($sql1);
			echo"<br><table><tr><td>idd</td><td>name</td><td>mobileno</td><td>address</td><td>dob</td><td>weight</td><td>height</td><td>date of joing</td><td>package</td><td>trainer</td></tr>";
			while($row=$rs1->fetch_assoc())
			{
			echo"<tr><td>".$row['gid']."</td><td>".$row['gname']."</td><td>".$row['mno']."</td><td>".$row['address']."</td><td>".$row['dob']."</td><td>".$row['weight']."</td><td>".$row['height']."</td><td>".$row['doj']."</td><td>".$row['pname']."</td><td>".$row['tname']."</td></tr>";
			}
		}
		if(isset($_POST['sa2']))
		{
			
			header("refresh:0");
			
		}
		if(isset($_POST['sa2']))
		{
			$sql2="select * from fees where nddate <='$date'"; 
			$rs2=$con->query($sql2);
			echo"<br><table><tr><td>id</td><td>name</td><td>package</td><td>fess</td><td>last date</td><td>next date</td><</tr>";
			while($row=$rs2->fetch_assoc())
			{
			echo"<tr><td>".$row['gid']."</td><td>".$row['gname']."</td><td>".$row['pname']."</td><td>".$row['pfees']."</td><td>".$row['ldate']."</td><td>".$row['nddate']."</td></tr>";
			}
			
			
			
			
			
			
		}
		?>
		</html>