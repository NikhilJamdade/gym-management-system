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
		$sql="select gname from gym_mem"; 
		$rs=$con->query($sql);
		echo"<body><form method='post' action='iotw.php'><center><select name='rgname'>";
		while($row=$rs->fetch_assoc())
		{
			$gname=$row['gname'];
			
		echo"<option value='$gname'>$gname</option>";
		}
		echo"</select> &nbsp <input type='submit' name='sa1'> &nbsp &nbsp <input type='submit'name='sa2' value='all members'>&nbsp &nbsp &nbsp &nbsp<input type='submit' name='sa3' value='all trainer'>";
		if(isset($_POST['sa1']))
		{
			$name=$_POST['rgname'];
			$_SESSION['dmem']=$name;
			$sql1="select * from ginout where gname='$name'";
			$rs1=$con->query($sql1);
			echo"<br><table><tr><td>id</td><td>name</td><td>intime</td><td>out time</td><td>date</td><td>location</td></tr>";
			while($row=$rs1->fetch_assoc())
			{
				echo"<tr><td>".$row['gid']."</td><td>".$row['gname']."</td><td>".$row['intime']."</td><td>".$row['outtime']."</td><td>".$row['iodate']."</td><td>".$row['location']."</td></tr>";
			}
		
			
			
		}
		if(isset($_POST['sa2']))
		{
			
			
			$sql1="select * from ginout ";
			$rs1=$con->query($sql1);
			echo"<br><table><tr><td>id</td><td>name</td><td>intime</td><td>out time</td><td>date</td><td>location</td></tr>";
			while($row=$rs1->fetch_assoc())
			{
				echo"<tr><td>".$row['gid']."</td><td>".$row['gname']."</td><td>".$row['intime']."</td><td>".$row['outtime']."</td><td>".$row['iodate']."</td><td>".$row['location']."</td></tr>";
			}
			
		}
		?>
		</html>