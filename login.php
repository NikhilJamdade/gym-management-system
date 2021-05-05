<html>
<head>
<style>
span{
	font-size:30px;
	color:white;
	background-color:orange;
	border-radius:10px;
	}
input{
	font-size:30px;
	
}	
</style>
<link rel="stylesheet" type="text/css" href="1.css">
</head>

<body>
<form method="post" action="login.php">
<br><br>
<center>
<span>enter your id:</span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="t1"><br><br>
<span>enter your password: </span>&nbsp <input type="password" name="t2"><br><br>
<input type="submit" name="su1">
</center>
</form>
</body>
<?php 
		session_start();
		if(isset($_POST['su1']))
		{
			$conn = new mysqli("localhost","root","","gymsystem");
			if ($conn->connect_error) 
			{
			die("Connection failed: " . $conn->connect_error);
			} 
		     $pass=$_POST['t2'];
			 $user=$_POST['t1'];
			$cmd="select * from login where uname='$user' and pass='$pass'";
			$rs=$conn->query($cmd);
			//echo"1";
			if($rs->num_rows > 0)
			{	
				$row=$rs->fetch_assoc();
				$_SESSION['location']=$row['location'];
				//echo $_SESSION['location'];
				echo"<script> location='home.php'</script>";				
			}
			else
			{	echo"4";
				echo"<script>alert('incorect user or password')</script>";
				echo"<script>location='login.php'</script>";
			}
		}
		?>
		</html>