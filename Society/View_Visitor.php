<html>
<head>
<title>View Owner</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<style>
	
	.form-control:focus
	{
		outline: none;
    border-color: red;
    box-shadow: 0 0 25px red;
	}
	.img-thumbnail
	{

		outline: none;
    border-color: red;
    box-shadow: 0 0 25px red;	
	}
	
	body
	{
		margin: 5%;
	}
	h1
	{
		color: white;
	}
	</style>
</head>

<body>
<h1 class="col-sm-offset-4">View Visitor</h1>
	<h1 class="col-sm-12" >   </h1>
<form class="form-horizontal" name="view_visitor" action="#" method="post" onsubmit="return validate();">
<ol class="breadcrumb">
	<li><a href="../Home.php">Home</a></li>
	<li><a href="Entry_System.php">Entry System</a></li>
	<li class="active">View Visitor</li>
</ol>
	<div class="form-group">       
		<label for= "visitor" class="col-sm-2 col-sm-offset-2 control-label"><font color="white">Visitor Id of Visitor</font></label>
		<div class="col-sm-2">
			<input class="form-control" type="text"  name="vid"/>
		</div>
		<div>
			<input type="Submit" class="btn btn-danger" value="Search" name="visitor_search"/>
		</div>

	<div class="form-group">
	<?php
		session_start();
		$con=mysql_connect('mysql.2freehosting.com','u158576178_svms','sam1565473')
	    or die('Could not connect: ' .  mysql_error());
		$sel_db=mysql_select_db('u158576178_svms',$con);
		if(isset($_POST['visitor_search']))
		{
			extract($_POST);
			$data=mysql_query("select * from visitor where vid='".$_POST['vid']."';");
		}
		else
		$data=mysql_query("select vid,vno,vname,mobno,date,time,wing,floor,flat from visitor where society='".$_SESSION['username']."';");
		$rownos=mysql_num_rows($data);
		if ( $rownos<= 0)
			echo "<h1 align='center'>No Record Found!</h1>";
		else
		{
			echo "<table align=center class='table table-hover'>";
			echo "<tr>";
			echo "<th></th>";
			echo "<th>Visitor ID</th>";
			echo "<th>Vehicle No</th>";
			echo "<th>Visitor Name</th>";
			echo "<th>Mobile No</th>";
			echo "<th>Date</th>";
			echo "<th>Time</th>";
			echo "<th>Wing</th>";
			echo "<th>Floor</th>";
			echo "<th>Flat</th>";
			echo "</tr>";
		    while($row = mysql_fetch_array($data))
		    {		    	
				echo "<tr>";
				echo "<td> <input type='radio' name='select' value='".$row['vid']."'></td>";
				echo "<td>".$row['vid']."</td>";
				echo "<td>".$row['vno']."</td>";
				echo "<td>".$row['vname']."</td>";
				echo "<td>".$row['mobno']."</td>";
				echo "<td>".$row['date']."</td>";
				echo "<td>".$row['time']."</td>";
				echo "<td>".$row['wing']."</td>";
				echo "<td>".$row['floor']."</td>";
				echo "<td>".$row['flat']."</td>";			
				echo "</tr>";				
			}
			echo "</table>";
		}
	?>
	</div>
	
<h1 class="col-sm-offset-4" >   </h1>
<h1 class="col-sm-offset-4" >   </h1>
	<div class="form-group">       
 		<div class="col-sm-offset-3 col-sm-2"> 
 			<input type="Submit" class="btn btn-danger" value="Update" name="visitor_update" formaction="Edit_Visitor.php"/>
		</div>
		<div class="col-sm-2"> 
 			<input type="Submit" class="btn btn-danger" value="Delete" name="visitor_delete"/>
		</div>
	</div>
</form>
</body>
</html>

<?php

	if(isset($_POST['visitor_delete']))
	{
		extract($_POST);
		$del_data=mysql_query("delete from visitor where vid='".$_POST['select']."';");
	}
?>