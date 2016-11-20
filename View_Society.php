<html>
<head>
<title>View Owner</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
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
	.img-thumbnail
	{

		outline: none;
	    border-color: red;
	    box-shadow: 0 0 25px red;	
	}
	</style>
</head>

<body>
<h1 class="col-sm-offset-4">View Society</h1>
	<h1 class="col-sm-12" >   </h1>

<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li class="active">View Society</li>
</ol>

<form class="form-horizontal" name="view_society" action="#" method="post" onsubmit="return validate();">

	<?php

		$con=mysql_connect('mysql.2freehosting.com','u158576178_svms','sam1565473')
    or die('Could not connect: ' .  mysql_error());
		$sel_db=mysql_select_db('u158576178_svms',$con);
		$data=mysql_query("select sname,image,address,wings,floors,flats,username from society;");
		$rownos=mysql_num_rows($data);
		if ( $rownos< 0)
			echo "No Record Found!";
		else
		{
			echo "<table align=center class='table table-hover'>";
			echo "<tr>";
			echo "<th></th>";
			echo "<th>Name</th>";
			echo "<th>Photo</th>";
			echo "<th>Address</th>";
			echo "<th>Wings</th>";
			echo "<th>Floors</th>";
			echo "<th>Flats</th>";
			echo "<th>Username</th>";
			echo "</tr>";
		    while($row = mysql_fetch_array($data))
		    {		   	
				echo "<tr>";
				echo "<td> <input type='radio' name='select' value='".$row['username']."'></td>";
				echo "<td>".$row['sname']."</td>";
				echo "<td>".'<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="100" height="100">'."</td>";
				echo "<td>".$row['address']."</td>";
				echo "<td>".$row['wings']."</td>";
				echo "<td>".$row['floors']."</td>";
				echo "<td>".$row['flats']."</td>";
				echo "<td>".$row['username']."</td>";				
				echo "</tr>";
			}
			echo "</table>";
		}
	?>
	
<h1 class="col-sm-offset-4" >   </h1>
<h1 class="col-sm-offset-4" >   </h1>
	<div class="form-group">       
 		<div class="col-sm-offset-3 col-sm-2"> 
 			<input type="Submit" class="btn btn-primary" value="Update" name="society_update"/>
		</div>
		<div class="col-sm-2"> 
 			<input type="Submit" class="btn btn-primary" value="Delete" name="society_delete"/>
		</div>
	</div>

</form>
</body>
</html>

<?php
	if(isset($_POST['society_delete']))
	{
		extract($_POST);
		$del_data=mysql_query("delete from society where username='".$_POST['select']."';");
	}
?>
