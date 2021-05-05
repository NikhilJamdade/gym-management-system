<?php
		session_start();
		date_default_timezone_set('Asia/Kolkata');
		$location=$_SESSION['location'];
		$con=new mysqli("localhost","root","","gymsystem");
		$sql="select * from recipt where reno=(select max(reno) from recipt) ";
		$rs=$con->query($sql);
		$row=$rs->fetch_assoc();
		$reno=$row['reno'];
		$gname=$row['gname'];
		$mno=$row['mno'];
		$pname=$row['pname'];
		$pfees=$row['pfees'];
		$rdate=$row['rdate'];
		
		
		
		
	
	
?>
<html>
<head>
<style>
td{
	padding:10px;
	font-size:30px;
	font-weight:bold;
}
table{
	border:1px solid;
	padding-bottom:30px;

}
</style>

</head>

<body>

<center>

<table>
<tr>
 <td> <img src="gymsymbol.jpg" style="height:100px;width:100px"> Gym</td> 
 <td>Date <?php echo"$rdate"; ?> </td>
 </tr>

 <tr>
 <td colspan="2">_______________________________</td> 
 </tr>


<tr>
 <td>Receipt no:</td> 
 <td><?php echo"$reno"; ?></td>
</tr>

<tr>
<td>Name </td>
 <td><?php echo"$gname"; ?> </td>
</tr>

<tr>
<td>Mobile </td>
 <td><?php echo"$mno"; ?> </td>
</tr>

<tr>
<td>Packag </td>
 <td><?php echo"$pname"; ?> </td>
</tr>

<tr>
<td>Fess </td>
 <td><?php echo"$pfees"; ?> </td>
</tr>

<tr>
 <td colspan="2">_______________________________</td> 
 </tr>

<tr>
<td>Authorized Sign </td>
 <td>Member Sign </td>
</tr>


</table>
</body>
</html>
<script> print() </script>
