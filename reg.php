<?php
		session_start();
		
		$location=$_SESSION['location'];
		$con = new mysqli("localhost","root","","gymsystem");
		$sql="select 1+count(reno) from recipt"; 
		$rs=$con->query($sql);
		$row=$rs->fetch_assoc();
		$reno=$row['1+count(reno)'];
		$sql="select 1+count(gid) from gym_mem";
		$rs=$con->query($sql);
		$row=$rs->fetch_assoc();
		$gid=$row['1+count(gid)'];
		$date1=date("y-m-d");
		//echo $date1;
		
		if(isset($_POST['sa1']))
		{
			$rno=$_POST['te1'];
			$id=$_POST['te2'];
			$name=$_POST['te3'];
			$mobile=$_POST['te4'];
			$address=$_POST['te5'];
			$dob=$_POST['te6'];
			$weight=$_POST['te7'];
			$height=$_POST['te8'];
			$package=$_POST['te10'];
			$trainer=$_POST['te11'];
			$fees=$_POST['demoo'];
			$dura=$_POST['demoo2'];
			$dura="+".$dura;
			$datee=date("y-m-d");
			$nextdue=date("y-m-d", strtotime("$dura"));
			//echo "$rno $id $mobile $address $dob $weight $height $package $trainer $fees $nextdue";
			
			$sql3="insert into gym_mem values('$id','$name','$mobile','$address','$dob','$weight','$height','$date1','$package','$trainer')";
			if($con->query($sql3)==true)
			{
				echo"inserted<br>";
			}else{echo"error ".$con->error;}
			
			$sql4="insert into fees values('$id','$name','$package','$fees','$datee','$nextdue')";
			$con->query($sql4);
			echo $con->error."<br>";
			
			$sql5="insert into recipt values('$rno','$id','$name','$mobile','$package','$fees','$datee','$location')";
			$con->query($sql5);
			echo $con->error;
			echo"<script>location='gym.php'</script>";
			
		
		}
?>
<html>
<head>
<style>
</style>
<link rel="stylesheet" type="text/css" href="1.css">
</head>

<body>
<a href="home.php" style="color:grey; font-size:35px; text-decoration:none">home</a>
<form method="post" action="reg.php">
<center>
<br>
<table>
<tr>
<th colspan="2">Gym member registration</th></tr>
<tr>
<td> recipt no:&nbsp </td> <td> <input type="text" name="te1"  value="<?php echo"$reno"; ?>"></td> 	</tr>
<tr> <td>ID:&nbsp <br> </td><td><input type="text" name="te2" value="<?php echo"$gid"; ?>"></td> </tr>
 <tr><td>Name:&nbsp </td> <td> <input type="text" name="te3"> <td></tr>
 <tr><td>Mobile No:&nbsp </td> <td> <input type="text" name="te4"> </td> </tr>
 <tr><td>Address:&nbsp </td> <td> <input type="text" name="te5"></td> </tr> 
 <tr> <td>DOB:&nbsp </td> <td> <input type="date" name="te6"> </td></tr><br><br>
 <tr><td> Weight:&nbsp </td> <td><input type="text" name="te7"></td> </tr> 
 <tr><td> height:&nbsp </td> <td><input type="text" name="te8" id="te"></td> </tr> 
 <tr><td> Date:&nbsp </td> <td><input type="text" name="te9" value="<?php echo"$date1"; ?>" disabled></td> </tr> 
 <?php  
		$sql1="select pname  from package";
		$rs1=$con->query($sql1);
		echo"<tr><td>Select Package:</td><td><select name='te10' id='te10' onchange='showPrice(this.value)'><option value=''></option>";
		while($row1 = $rs1->fetch_assoc()) {
			$pname=$row1['pname'];
			echo"<option value='$pname'>$pname</option>";
				}
				echo"</select></td></tr>";
			
				$sql2="select tname  from traner";
		$rs2=$con->query($sql2);
		echo"<tr><td>Select trainer:</td><td><select name='te11'>";
		while($row2 = $rs2->fetch_assoc()) {
			$tname=$row2['tname'];
			echo"<option value='$tname'>$tname</option>";
				}
				echo"</select></td></tr>";
				
				
				?>
 <tr><td> fees:&nbsp </td> <td><input type="text" id="demoo" name="demoo"></td> </tr>
<tr><td> package duration:&nbsp </td> <td><input type="text" id="demoo2" name="demoo2"></td> </tr> 
 
 
 
 <tr><td colspan="2"><input type="submit" name="sa1"></td></tr>
 </table>
 
</center> 
</form>
<script> 
			function showPrice(str) {
  var xhttp; 
  if (str == "") {
    document.getElementById("demoo").innerHTML = "";
	document.getElementById("demoo2").innerHTML ="";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("demoo").value =this.responseText;
    }
  };
  xhttp.open("GET", "getfees.php?q="+str, true);
  xhttp.send();
  
  var xhttp; 
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("demoo2").value =this.responseText;
    }
  };
  xhttp.open("GET", "getdu.php?q="+str, true);
  xhttp.send();
}

			





</script>
</body>
</html>