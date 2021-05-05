<?php
session_start();
		
		$location=$_SESSION['location'];
		$con = new mysqli("localhost","root","","gymsystem");
		$sql="select 1+count(pid) from package"; 
		$rs=$con->query($sql);
		$row=$rs->fetch_assoc();
		$pid=$row['1+count(pid)'];
		if(isset($_POST['sa1']))
		{
			$pid=$_POST['te1'];
			$pname=$_POST['te2'];
			$pfees=$_POST['te3'];
			$duration=$_POST['te4'];
			$sql2="insert into package values('$pid','$pname','$pfees','$duration')";
			if($con->query($sql2)==true)
			{
				echo"<script> alert('package created')</script>";
				header("Refresh:0");
			}else{echo"error ".$con->error;}
		}
		
?>
<html>
<head>
<style>
</style>
<link rel="stylesheet" type="text/css" href="1.css">
</head>

<body>
<a href="home.php" style="color:orange; font-size:35px; text-decoration:none">home</a>
<form method="post" action="addp.php">
<center>
<br>
<table>
<tr>
<th colspan="2">add package</th></tr>
<tr>
<td> package id:&nbsp </td> <td> <input type="text" name="te1" value=<?php echo $pid; ?> ></td> 	</tr>
<tr> <td>package name:&nbsp <br> </td><td><input type="text" name="te2" ></td> </tr>
 <tr><td>fees:&nbsp </td> <td> <input type="text" name="te3"> <td></tr>
 <tr><td>duration:&nbsp </td> <td> <input type="text" name="te4"> </td> </tr>
 <tr ><td colspan="2" align="center"><input type="submit" name="sa1"></td></tr> 
 </form>
 </body>
 </html>