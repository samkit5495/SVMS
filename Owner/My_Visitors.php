<!--
Name – Jain Samkitkumar Hasmukhlal
Class – TE 	Roll. No. 20
Project Title: Society Visitors Maintaince System

My_Visitors.php
-->
<html>
<head>
<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<style>
	body
	{
		margin: 5%;
	}
	
	.form-control:focus
	{
		outline: none;
    border-color: red;
    box-shadow: 0 0 25px red;
	}
	h1
	{
		color: white;
	}
	</style>
</head>

<body>
<h1 class="col-sm-offset-4" >Visitors Details</h1>
	<h1 class="col-sm-offset-12" >   </h1>
<form class="form-horizontal" role="form" method="post" action="#" >

	<div class="form-group">
		<label class="col-sm-2 control-label">Date </label>
		<div class="col-sm-3">
			<input class="form-control" type="date" name="date"/>
		</div>
		<div class="col-sm-2"> 
 			<input type="Submit" class="btn btn-danger" name="submit"/>
		</div>
	</div>
	
</form>
</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		session_start();
		$con=mysql_connect('mysql.2freehosting.com','u158576178_svms','sam1565473')
    or die('Could not connect: ' .  mysql_error());
		$sel_db=mysql_select_db('u158576178_svms',$con);

		$data=mysql_query("select society,wing,floor,flat from owner where username='".$_SESSION['username']."';");
		$row = mysql_fetch_array($data);
		$data=mysql_query("select vno,vname,mobno,reason,time from visitor where society='".$row['society']."' and wing=".$row['wing']." and floor=".$row['floor']." and flat=".$row['flat']." order by time desc;");
		$rownos=mysql_num_rows($data);
		if ( $rownos< 0)
			echo "No Record Found!";
		else
		{
			echo "<table class='table table-hover'>";
			echo "<tr>";
			echo "<th>Vehicle no</th>";
			echo "<th>Visitor name</th>";
			echo "<th>Mobile no</th>";
			echo "<th>Reason</th>";
			echo "<th>Time</th>";
			echo "</tr>";
		    while($row = mysql_fetch_array($data))
		    {		    	
				echo "<tr>";
				echo "<td>".$row['vno']."</td>";
				echo "<td>".$row['vname']."</td>";
				echo "<td>".$row['mobno']."</td>";
				echo "<td>".$row['reason']."</td>";
				echo "<td>".$row['time']."</td>";
				echo "</tr>";				
			}
			echo "</table>";
		}
	}

	?>


 
