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
		echo"<body><form method='post' action='mio.php'><center><select name='rgname'>";
		while($row=$rs->fetch_assoc())
		{
			$gname=$row['gname'];
		echo"<option value='$gname'>$gname</option>";
		}
		echo"</select> &nbsp <input type='submit' name='sa1'>";
		if(isset($_POST['sa1']))
		{
			$name=$_POST['rgname'];
			$sql1="select gid from gym_mem where gname='$name'";
			$rs1=$con->query($sql1);
			$row1=$rs1->fetch_assoc();
			$gid=$row1['gid'];
			$date=date("y-m-d");
			$time=date("h:i:sa");
			$etime=date("h:i:sa", strtotime("+1 Hours"));
			echo"<table> <th> gid </th><th> gname </th><th> in time </th><th> out time </th><th> date </th><th> location </th><tr><td><input type='text' name='gid' value='$gid'></td><td><input type='text' name='gname' value='$name'></td><td><input type='text' name='intime' value='$time' ></td><td><input type='text' name='outtime' value='$etime'></td><td><input type='text' name='cdate' value='$date'></td><td><input type='text' name='location' value='$location'></td></tr><tr><td colspan='6' align='center'><input type='submit' name='sa2'></td></tr></table>";
		}
		if(isset($_POST['sa2']))
		{
			$ggid=$_POST['gid'];
			$gname=$_POST['gname'];
			$intime=$_POST['intime'];
			$outtime=$_POST['outtime'];
			
			$sql3="insert into ginout values('$ggid','$gname','$intime','$outtime','$date','$location')";
			if($con->query($sql3)==true)
			{
				echo"inserted<br>";
				header("Refresh:0");
			}else{echo"error ".$con->error;}
			
		}

?>
</body>
</html>
