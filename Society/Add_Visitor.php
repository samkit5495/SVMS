<!--
Name – Jain Samkitkumar Hasmukhlal
Class – TE 	Roll. No. 20
Project Title: Society Visitors Maintaince System

Add_Visitor.php
-->
<html>
<head>
<title>Add Visitor</title>
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
	
<?php
	if(!isset($_POST['find']))
	{
?>
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
<?php
	}	
?>
	return true;
}


function clock()
{
	
	var dt=new Date()
	var month = dt.getMonth() + 1;
	var day = dt.getDate();
	var year = dt.getFullYear();
	var hours=dt.getHours()
	var minutes=dt.getMinutes()
	var sec=dt.getSeconds()
	var x="A.M."
	if(hours>12)
	{
		x="P.M."
		hours=hours-12
	}
	if(hours==0)
		hours=12
	if(minutes<=9)
		minutes="0"+minutes
	if(sec<=9)
		sec="0"+sec
	document.getElementById('date').innerHTML="<b>Date:"+month+"/"+day+"/"+year
	document.getElementById('Clock').innerHTML="<b>Time:"+hours+":"+minutes+":"+sec+" "+x
	setTimeout("clock()",1000)
}

</script>

<?php
	session_start();
	$con=mysql_connect('mysql.2freehosting.com','u158576178_svms','sam1565473')
    or die('Could not connect: ' .  mysql_error());
	$sel_db=mysql_select_db('u158576178_svms',$con);	
	$data=mysql_query("select wings,floors,flats from society where username='".$_SESSION['username']."';");
	$row1 = mysql_fetch_array($data);
?>

</head>

<body onload="clock()">
<ol class="breadcrumb">
	<li><a href="../Home.php">Home</a></li>
	<li><a href="Entry_System.php">Entry System</a></li>
	<li class="active">Add Visitor</li>
</ol>
<h1 class="col-sm-offset-4" ><font color="white">Visitor Entry System</font></h1>
	<h1 class="col-sm-offset-12" >   </h1>

<form class="form-horizontal" name="visitor" action="#" method="post" onsubmit="return validate();">
	
	<div class="form-group">
		 <div class="alert-danger col-sm-12" id="error"></div>
	</div>
	<div class="form-group">
		<label for= "Id" class="col-sm-2 control-label">Visitor Id: </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="vid" placeholder="Enter visitor id" size="10"/>
		</div>

 		<div class="col-sm-1">          
 			<input type="Submit" class="btn btn-danger" value="Find" name="find"/>
		</div>
			<div id="Clock" class="col-sm-2"></div>
				<div id="date" class="col-sm-4"></div>
	</div>

<?php

	if(isset($_POST['find']))
	{

		$data=mysql_query("select * from visitor where vid='".$_POST['vid']."';");
		$rownos=mysql_num_rows($data);
		if ( $rownos<= 0)
		{
?>
			<script type="text/javascript">
			document.getElementById('error').innerHTML="No record found!!!";
			</script>
<?php
		}
		else
		    $row = mysql_fetch_array($data);
	}
?>


	<div class="form-group">
		<label for= "Vno" class="col-sm-2 control-label">Vehicle number: </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" value="<?php if(isset($_POST['find'])) echo $row['vno'];?>" name="vno" placeholder="Enter Vehicle no " size="10"/>
		</div>
		
	</div>		
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Visitor Name: </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="vname" value="<?php if(isset($_POST['find'])) echo $row['vname'];?>" placeholder="Enter name of visitor" size="10"/>
		</div>
	</div>

	<div class="form-group">
		<label for= "Mno" class="col-sm-2 control-label">Mobile no: </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="mobno" value="<?php if(isset($_POST['find'])) echo $row['mobno'];?>" placeholder="Enter Mobile no " size="12" maxlength="10"/>
		</div>
	</div>	


	<div class="form-group">
		<label for= "Reson" class="col-sm-2 control-label">Reason of visit: </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="reason" value="<?php if(isset($_POST['find'])) echo $row['reason'];?>" placeholder="Enter Reason" size="12" />
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
					if(isset($_POST['find'])&&$i==$row['wing'])
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
					if(isset($_POST['find'])&&$i==$row['floor'])
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
					if(isset($_POST['find'])&&$i==$row['flat'])
						echo "<option value='".$i."' selected>".$i."</option>";
					else
						echo "<option value='".$i."'>".$i."</option>";
				}
			?>
			</select>
		</div>			
	</div>
</fieldset>
	
<h1 class="col-sm-offset-4" >   </h1>
<h1 class="col-sm-offset-4" >   </h1>
	<div class="form-group">       
 		<div class="col-sm-offset-3 col-sm-2">          
 			<input type="Submit" class="btn btn-danger" name="visitor" formaction="../Record_Added.php"/>
		</div>

 		<div class="col-sm-2">          
 			<input type="reset" class="btn btn-danger"/>
		</div>
	</div>


	
</form>
</body>
</html>
