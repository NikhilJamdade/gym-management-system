<html>
<head>
<style>
</style>
<link rel="stylesheet" type="text/css" href="2.css">
</head>
<body>
<a href="home.php" style="color:orange; font-size:35px; text-decoration:none">home</a>

<?php
session_start();
		date_default_timezone_set('Asia/Kolkata');
		$date=date("y-m-d");
		$location=$_SESSION['location'];
		$con = new mysqli("localhost","root","","gymsystem");
		$sql="select pname from package"; 
		$rs=$con->query($sql);
		echo"<body><form method='post' action='deletep.php'><center><select name='rgname'>";
		while($row=$rs->fetch_assoc())
		{
			$gname=$row['pname'];
		echo"<option value='$gname'>$gname</option>";
		}
		echo"</select> &nbsp <input type='submit' name='sa1'>";
		if(isset($_POST['sa1']))
		{
			$name=$_POST['rgname'];
			$_SESSION['dmem']=$name;
			$sql1="select * from package where pname='$name'";
			$rs1=$con->query($sql1);
			$row=$rs1->fetch_assoc();
			echo" <br><br><div class='ffff' border='1px solid'><b>id :".$row['pid']."<br>package name :".$row['pname']."<br>fees :".$row['pfees']."<br>duration :".$row['duration']."<br></b><input type='submit' name='sa2' value='delete'></div>";
		}
		if(isset($_POST['sa2']))
		{
			$delete=$_SESSION['dmem'];
			//echo"hello";
			$sql2="delete from package where pname='$delete'";
			if($con->query($sql2)==true)
			{header("refresh:0");}
			
		}
		?>
		</html>