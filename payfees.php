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
		$sql="select gname from fees where nddate <='$date'"; 
		$rs=$con->query($sql);
		
		$sql2="select 1+count(reno) from recipt"; 
		$rs2=$con->query($sql2);
		$row2=$rs2->fetch_assoc();
		$reciptt=$row2['1+count(reno)'];
		
		echo"<body><form method='post' action='payfees.php'><center><select name='rgname'>";
		while($row=$rs->fetch_assoc())
		{
			$gname=$row['gname'];
		echo"<option value='$gname'>$gname</option>";
		}
		echo"</select> &nbsp <input type='submit' name='sa1'>";
		if(isset($_POST['sa1']))
		{
			$name=$_POST['rgname'];
			$sql1="select pname  from package";
		$rs1=$con->query($sql1);
		$sql4="select *  from fees where gname='$name'";
		$rs4=$con->query($sql4);
		$con->connect_error;
		$row4=$rs4->fetch_assoc();
		$ggid=$row4['gid'];
		$ggname=$row4['gname'];
		$pfess=$row4['pfees'];
		$ldate=$row4['ldate'];
		$nddate=$row4['nddate'];
		$sql5="select  mno from gym_mem where gname='$name'";
		$rs5=$con->query($sql5);
		$row5=$rs5->fetch_assoc();
		$mno=$row5['mno'];
		//echo"$mno";
		echo"<br><br><table><tr><td>recipt no:</td><td><input type='text' name='recipt' value='$reciptt' ></td></tr><tr><td>id :</td><td><input type='text' name='id' value='$ggid' ></td></tr><tr><td>name :</td><td><input type='text' name='ggname' value='$ggname' ></td></tr><tr><td>Select Package:</td><td><select name='package' id='package' onchange='showPrice(this.value)'><option value=''>select package</option>";
		while($row1 = $rs1->fetch_assoc()) {
			$pname=$row1['pname'];
			echo"<option value='$pname'>$pname</option>";
				}
				   echo"</select></td></tr><tr><td>fees   :</td><td><input type='text' name='fees' value='$pfess' ></td></tr><tr><td>last date :</td><td><input type='text' name='ldate' id='demoo' value='$ldate' ></td></tr><tr><td>next date :</td><td><input type='text' name='ndate' id='demoo2' value='$nddate' ></td></tr><tr><td>package duration :</td><td><input type='text' name='durationnew' id='demoo3' ></td></tr><tr><td>mobile no :</td><td><input type='text' name='mobileno' value='$mno' ></td></tr>
				   <tr><td><input type='submit' value='update package' name='sa2'><td></tr></table>";
				}
		if(isset($_POST['sa2']))
		{		
				$reno=$_POST['recipt'];
				$ggname=$_POST['ggname'];
				$ggid=$_POST['id'];
				$pname=$_POST['package'];
				$ldate=$_POST['ldate'];
				$fees=$_POST['fees'];
				$mobilen=$_POST['mobileno'];
			
				$nddate=$_POST['ndate'];
				$sqll="update fees set pname='$pname',pfees='$fees',ldate='$ldate',nddate='$nddate'";
				if($con->query($sqll)==true)
				{
					echo"insert";
				}else{
					echo $con->connect_error;
				}
				$sqll="insert into recipt values('$reno','$ggid','$ggname','$mobilen','$pname','$fees','$date','$location')";
				if($con->query($sqll)==true)
				{
					echo"insert";
					echo"<script> location='gym.php'</script>";
				}else{
					echo $con->connect_error;
				}
				
			
			//{header("refresh:0");}
			
		}
		?>
		
		<script> 
			function showPrice(str) {
  var xhttp; 
  if (str == "") {
    document.getElementById("demoo").innerHTML = "hello";
	document.getElementById("demoo2").innerHTML ="hello";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("demoo").value =this.responseText;
    }
  };
  xhttp.open("GET", "getderationajax.php?q="+str, true);
  xhttp.send();
  
  var xhttp; 
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("demoo2").value =this.responseText;
    }
  };
  xhttp.open("GET", "getnextdateajax.php?q="+str, true);
  xhttp.send();
  
  var xhttp; 
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("demoo3").value =this.responseText;
    }
  };
  xhttp.open("GET", "getdu.php?q="+str, true);
  xhttp.send();
}

</script>
</html>