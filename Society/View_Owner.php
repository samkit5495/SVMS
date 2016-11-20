<!--
Name – Jain Samkitkumar Hasmukhlal
Class – TE 	Roll. No. 20
Project Title: Society Visitors Maintaince System

View_Owner.php
-->
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
    border-color: orange;
    box-shadow: 0 0 25px red;	
	}
	
	body
	{
		margin: 5%;
	}
	
	h1{
		color: white;
	}
	</style>
</head>

<body>
<h1 class="col-sm-offset-4">View Owner</h1>
	<h1 class="col-sm-12" >   </h1>
<form class="form-horizontal" name="view_owner" action="#" method="post" onsubmit="return validate();">
<ol class="breadcrumb">
	<li><a href="../Home.php">Home</a></li>
	<li><a href="Entry_System.php">Entry System</a></li>
	<li class="active">View Owner</li>
</ol>

	<div class="form-group">       
		<label for= "owner" class="col-sm-2 col-sm-offset-2 control-label">Username of Owner</label>
		<div class="col-sm-2">
			<input class="form-control" type="text"  name="username"/>
		</div>
		<div>
			<input type="Submit" class="btn btn-danger" value="Search" name="owner_search"/>
		
		</div>
 		
 			
	</div>
	<div class="form-group">
	<?php
		session_start();
		$con=mysql_connect('mysql.2freehosting.com','u158576178_svms','sam1565473')
    or die('Could not connect: ' .  mysql_error());
		$sel_db=mysql_select_db('u158576178_svms',$con);
		if(isset($_POST['owner_search']))
		{
			extract($_POST);
			$data=mysql_query("select * from owner where username='".$_POST['username']."';");
		}
		else
			$data=mysql_query("select oname,image,contact,wing,floor,flat,username from owner where society='".$_SESSION['username']."';");
		$rownos=mysql_num_rows($data);
		
		if ( $rownos<= 0)
			echo "<h1 align='center'>No Record Found!</h1>";
		else
		{
			echo "<table align=center class='table table-hover'>";
			echo "<tr>";
			echo "<th></th>";
			echo "<th>Name</th>";
			echo "<th>Photo</th>";
			echo "<th>Contact No</th>";
			echo "<th>Wing</th>";
			echo "<th>Floor</th>";
			echo "<th>Flat</th>";
			echo "<th>Username</th>";
			echo "</tr>";
		    while($row = mysql_fetch_array($data))
		    {		    	
				echo "<tr>";
				echo "<td> <input type='radio' name='select' value='".$row['username']."'></td>";
				echo "<td>".$row['oname']."</td>";
				echo "<td>".'<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="100" height="100">'."</td>";
				echo "<td>".$row['contact']."</td>";
				echo "<td>".$row['wing']."</td>";
				echo "<td>".$row['floor']."</td>";
				echo "<td>".$row['flat']."</td>";
				echo "<td>".$row['username']."</td>";				
				echo "</tr>";				
			}
			echo "</table>";
	?>
	</div>
	
<h1 class="col-sm-offset-12" >   </h1>
	<div class="form-group">       
 		<div class="col-sm-offset-3 col-sm-2"> 
 			<input type="Submit" class="btn btn-danger" value="Update" name="owner_update" formaction="Edit_Owner.php"/>
		</div>
		<div class="col-sm-2"> 
 			<input type="Submit" class="btn btn-danger" value="Delete" name="owner_delete"/>
		</div>
	</div>
	
</form>
<?php
	}
?>
</body>
</html>

<?php

	if(isset($_POST['owner_delete']))
	{
		extract($_POST);
		$del_data=mysql_query("delete from owner where username='".$_POST['select']."';");
?>
		<script type="text/javascript">
			var open_link_1 = window.open('','mainframe');
			open_link_1.location="View_Owner.php";
		</script>
<?php
	}
?>