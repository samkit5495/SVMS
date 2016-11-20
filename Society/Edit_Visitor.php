<html>
<head>
<title>Edit Visitor</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<style>
	
	.form-control:focus
	{
		outline: none;
    border-color: orange;
    box-shadow: 0 0 20px orange;
	}
	.img-thumbnail
	{

		outline: none;
    border-color: orange;
    box-shadow: 0 0 20px orange;	
	}
	
	body
	{
		margin: 5%;
	}
	</style>	

<script type="text/javascript">
function validate()
{

	if(document.visitor.vid.value=="" || document.visitor.vid.value==null)
	{
		document.getElementById('error').innerHTML="Enter visitor id!!!";
		return false;
	}
	

	if(document.visitor.vno.value=="" || document.visitor.vno.value==null)
	{
		document.getElementById('error').innerHTML="Enter vehicle no!!!";
		return false;
	}

	if(document.visitor.vname.value=="" || document.visitor.vname.value==null)
	{
		document.getElementById('error').innerHTML="Enter name of vistior!!!";
		return false;
	}


	if(document.visitor.vname.value=="" || document.visitor.vname.value==null)
	{
		document.getElementById('error').innerHTML="Enter name of vistior!!!";
		return false;
	}

	if(document.visitor.mobno.value=="" || document.visitor.mobno.value==null)
	{
		document.getElementById('error').innerHTML="Enter Mobile no!!!";
		return false;
	}
	if(isNaN(document.visitor.mno.value))
	{
		document.getElementById('error').innerHTML="Enter only no!!!";
		return false;
	}
	if(document.visitor.mno.value.length!=10)
	{
		document.getElementById('error').innerHTML="Enter 10 digit no!!!";
		return false;
	}
	return true;
}

</script>

<?php
	session_start();
	$con=mysql_connect('mysql.2freehosting.com','u158576178_svms','sam1565473')
    or die('Could not connect: ' .  mysql_error());
	$sel_db=mysql_select_db('u158576178_svms',$con);	
	$data=mysql_query("select wings,floors,flats from society where username='".$_SESSION['username']."';");
	$row1 = mysql_fetch_array($data);
	$data=mysql_query("select * from visitor where vid='".$_POST['select']."';");	
	$row = mysql_fetch_array($data);
	$_SESSION['select']=$_POST['select'];
?>

</head>

<body onload="clock()">
<ol class="breadcrumb">
	<li><a href="../Home.php">Home</a></li>
	<li><a href="Entry_System.php">Entry System</a></li>
	<li><a href="View_Visitor.php">View Visitors</a></li>
	<li class="active">Edit Visitor</li>
</ol>
<h1 class="col-sm-offset-4" >Visitor Entry System</h1>
	<h1 class="col-sm-offset-12" >   </h1>
<form class="form-horizontal" name="visitor" action="../Record_Updated.php" method="post" onsubmit="return validate();">
	
	<div class="form-group">
		 <div class="alert-danger col-sm-12" id="error"></div>
	</div>

	<div class="form-group">
		<label for= "Id" class="col-sm-2 control-label">Visitor Id: </label>
		<div class="col-sm-3">
			<input class="form-control" disabled type="text" value="<?php echo $row['vid'];?>" name="vid" placeholder="Enter visitor id" size="10"/>
		</div>

		<div class="col-sm-2"><?php echo $row['time'];?></div>
			<div class="col-sm-4"><?php echo $row['date'];?></div>
	</div>

	<div class="form-group">
		<label for= "Vno" class="col-sm-2 control-label">Vehicle number: </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" value="<?php echo $row['vno'];?>" name="vno" placeholder="Enter Vehicle no " size="10"/>
		</div>		
	</div>		
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Visitor Name: </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" value="<?php echo $row['vname'];?>" name="vname" placeholder="Enter name of visitor" size="10"/>
		</div>
	</div>

	<div class="form-group">
		<label for= "Mno" class="col-sm-2 control-label">Mobile no: </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" value="<?php echo $row['mobno'];?>" name="mobno" placeholder="Enter Mobile no " size="12" maxlength="10"/>
		</div>
	</div>	

	
	
	<h1 class="col-sm-offset-12" >   </h1>
	<fieldset>
	<legend>Select Information about vistior place</legend>
	<div class="form-group">
		<label for= "Wing" class="col-sm-2 control-label">Building no./ Wing:</label>
		<div class="col-sm-1">
			<select class="form-control" name="wing">
			<?php
				for ($i=1; $i <= $row1['wings']; $i++)
				{ 
					if($i==$row['wing'])
						echo "<option value='".$i."' selected>".$i."</option>";
					else
						echo "<option value='".$i."'>".$i."</option>";
				}
			?>
			</select>
		</div>
		
		<label for= "Floor" class="col-sm-2 control-label"> Floor no.:</label>
		<div class="col-sm-1">
			<select class="form-control" name="floor">
			<?php
				for ($i=1; $i <= $row1['floors']; $i++)
				{ 
					if($i==$row['floor'])
						echo "<option value='".$i."' selected>".$i."</option>";
					else
						echo "<option value='".$i."'>".$i."</option>";
				}
			?>
			</select>
		</div>
		
		<label for= "Flat" class="col-sm-2 control-label">Flat No.</label>
		<div class="col-sm-1">
			<select class="form-control" name="flat">
				<?php
				for ($i=1; $i <= $row1['flats']; $i++)
				{ 
					if($row1['flats']==$row['flat'])
						echo "<option value='".$row1['flats']."' selected>".$i."</option>";
					else
						echo "<option value='".$row1['flats']."'>".$i."</option>";
				}
			?>
			</select>
		</div>			
	</div>
	
<h1 class="col-sm-offset-4" >   </h1>
<h1 class="col-sm-offset-4" >   </h1>
	<div class="form-group">       
 		<div class="col-sm-offset-3 col-sm-2">          
 			<input type="Submit" class="btn btn-danger" name="visitor"/>
		</div>

 		<div class="col-sm-2">          
 			<input type="reset" class="btn btn-danger"/>
		</div>
	</div>


	
</form>
</body>
</html>
