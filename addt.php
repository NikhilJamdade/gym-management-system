<?php
session_start();
		
		$location=$_SESSION['location'];
		$con = new mysqli("localhost","root","","gymsystem");
		$sql="select 1+count(tid) from traner"; 
		$rs=$con->query($sql);
		$row=$rs->fetch_assoc();
		$tid=$row['1+count(tid)'];
		if(isset($_POST['sa1']))
		{
			$tid=$_POST['te1'];
			$tname=$_POST['te2'];
			$tjoin=$_POST['te3'];
			$tsal=$_POST['te4'];
			$address=$_POST['te5'];
			$mobile=$_POST['te6'];
			$sql2="insert into traner values('$tid','$tname','$tjoin','$tsal','$address','$mobile')";
			if($con->query($sql2)==true)
			{
				echo"<script> alert('trainer added')</script>";
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
<form method="post" action="addt.php">
<center>
<br>
<table>
<tr>
<th colspan="2">add trainer</th></tr>
<tr>
<td> trainer id:&nbsp </td> <td> <input type="text" name="te1" value=<?php echo $tid; ?> ></td> 	</tr>
<tr> <td>trainer name:&nbsp <br> </td><td><input type="text" name="te2" ></td> </tr>
 <tr><td>trainer joing date:&nbsp </td> <td> <input type="date" name="te3"> <td></tr>
 <tr><td>trainer salary:&nbsp </td> <td> <input type="text" name="te4"> </td> </tr>
 <tr><td>address:&nbsp </td> <td> <input type="text" name="te5"> </td> </tr>
 <tr><td>mobile no:&nbsp </td> <td> <input type="text" name="te6"> </td> </tr>
 <tr ><td colspan="2" align="center"><input type="submit" name="sa1"></td></tr> 
 </form>
 </body>
 </html>