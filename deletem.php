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
		$sql="select gname from gym_mem"; 
		$rs=$con->query($sql);
		echo"<body><form method='post' action='deletem.php'><center><select name='rgname'>";
		while($row=$rs->fetch_assoc())
		{
			$gname=$row['gname'];
		echo"<option value='$gname'>$gname</option>";
		}
		echo"</select> &nbsp <input type='submit' name='sa1'>";
		if(isset($_POST['sa1']))
		{
			$name=$_POST['rgname'];
			$_SESSION['dmem']=$name;
			$sql1="select * from gym_mem where gname='$name'";
			$rs1=$con->query($sql1);
			$row=$rs1->fetch_assoc();
			echo" <br><br><div class='ffff' border='1px solid'><b>id :".$row['gid']."<br>name :".$row['gname']."<br>mobile no :".$row['mno']."<br>address :".$row['address']."<br>date of birth :".$row['dob']."<br>weight :".$row['weight']."<br>height :".$row['height']."<br>date :".$row['doj']."<br>package name :".$row['pname']."<br>trainer name :".$row['tname']."<br></b><input type='submit'value='Delete' name='sa2'></div>";
		}
		if(isset($_POST['sa2']))
		{
			$delete=$_SESSION['dmem'];
			//echo"hello";
			$sql2="delete from gym_mem where gname='$delete'";
			if($con->query($sql2)==true)
			{header("refresh:0");}
			
		}
		?>
		</html>