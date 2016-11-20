<!--
Name – Jain Samkitkumar Hasmukhlal
Class – TE 	Roll. No. 20
Project Title: Society Visitors Maintaince System

Edit_Owner.php
-->
<html>
<head>
<title>Edit Owner</title>
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
	if(document.owner.oname.value=="" || document.owner.oname.value==null)
	{
		document.getElementById('error').innerHTML="Enter Name of owner!!!";
		return false;
	}

	if(document.owner.contact.value=="" || document.owner.contact.value==null)
	{
		document.getElementById('error').innerHTML="Enter Contact no!!!";
		return false;
	}
	if(isNaN(document.owner.contact.value))
	{
		document.getElementById('error').innerHTML="Enter only no!!!";
		return false;
	}
	if(document.owner.contact.value.length!=10)
	{
		document.getElementById('error').innerHTML="Enter 10 digit no!!!";
		return false;
	}
	if(document.owner.username.value=="" || document.owner.username.value==null)
	{
		document.getElementById('error').innerHTML="Enter your username!!!";
		return false;
	}

	if(document.owner.ans.value=="" || document.owner.ans.value==null)
	{
		document.getElementById('error').innerHTML="Enter answer!!!";
		return false;
	}
	return true;
}

function readURL(input)
{
    if (input.files && input.files[0])
    {
        var reader = new FileReader();

        reader.onload = function (e) 
        {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<?php
	session_start();
	$con=mysql_connect('mysql.2freehosting.com','u158576178_svms','sam1565473')
    or die('Could not connect: ' .  mysql_error());
	$sel_db=mysql_select_db('u158576178_svms',$con);
	$data=mysql_query("select * from owner where username='".$_POST['select']."';");	
	$row = mysql_fetch_array($data);
	$data=mysql_query("select wings,floors,flats from society where username='".$row['society']."';");
	$row1 = mysql_fetch_array($data);
	$_SESSION['select']=$_POST['select'];

	if($row['que']=="What is your nick name ?")
		$q=0;
	else if($row['que']=="What is your birth-place ?")
		$q=1;
	else
		$q=2;
?>
</head>
<body>

<h1 class="col-sm-offset-2"><font color="white">Registration of Owner</font></h1>
	<h1 class="col-sm-12" >   </h1>
<form class="form-horizontal" enctype="multipart/form-data" name="owner" action="../Record_Updated.php" method="post" onsubmit="return validate();">
<ol class="breadcrumb">
	<li><a href="../Home.php">Home</a></li>
	<li><a href="Entry_System.php">Entry System</a></li>
	<li><a href="View_Owner.php">View Owner</a></li>
	<li class="active">Edit Owner</li>
</ol>

	
	<div class="form-group">
		 <div class="alert-danger col-sm-12" id="error"></div>
	</div>
	<div class="form-group">
		<label for= "Oname" class="col-sm-2 control-label">Name of Owner: </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" value="<?php echo $row['oname'];?>" name="oname" placeholder="Enter name of  owner" size="10"/>
		</div>

		<div class="col-sm-7">
			<?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Your Image" height="200" width="150" class="img-thumbnail" id="blah" />';?>
		</div>
	
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Your Photo</label> 
		<div class="col-sm-3">
			<input type="file"  onchange="readURL(this);" name="oimage" accept="image/jpeg"/> 
			<p class="help-block">Browse your Photo from here.</p>
		</div>
	</div>
 
	<div class="form-group">
		<label for= "Contact" class="col-sm-2 control-label">Contact no: </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" value="<?php echo $row['contact'];?>" name="contact" placeholder="Enter your contact no" size="10"/>
		</div>
	</div>


	
	<div class="form-group">
		<label for= "Wing" class="col-sm-2 control-label">Building no./ Wing:</label>
		<div class="col-sm-1">
			<select class="form-control" value="<?php echo $row['wing'];?>" name="wing"/>
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
			<select class="form-control" type="text" value="<?php echo $row['floor'];?>" name="floor"/>
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
			<select class="form-control" type="text" value="<?php echo $row['flat'];?>" name="flat">
			<?php
				for ($i=1; $i <= $row1['flats']; $i++)
				{ 
					if($i==$row['flat'])
						echo "<option value='".$i."' selected>".$i."</option>";
					else
						echo "<option value='".$i."'>".$i."</option>";
				}
			?>
			</select>
		</div>			
	</div>

	<div class="form-group">
		<label for= "Username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="username" disabled value="<?php echo $row['username'];?>" placeholder="Enter your Username" size="15"/>
		</div>	
	</div>

	<div class="form-group">
		<label for= "Que" class="col-sm-2 control-label">Security question:</label>
		<div class="col-sm-3">
			<select class="form-control" name="que">
				<option <?php if($q==0)echo "selected"?>>What is your nick name ?</option>
				<option <?php if($q==1)echo "selected"?>>What is your birth-place ?</option>
				<option <?php if($q==2)echo "selected"?>>Last two digits of your mobile no.</option>
			</select>
		</div> 
	</div>

	<div class="form-group">
		<label for= "Ans" class="col-sm-2 control-label">Answer</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="ans" value="<?php echo $row['ans'];?>" placeholder="Enter answer for selected question" size="10"/>
		</div>
	</div>

	

<h1 class="col-sm-offset-4" >   </h1>
<h1 class="col-sm-offset-4" >   </h1>
	<div class="form-group">       
 		<div class="col-sm-offset-3 col-sm-2"> 
 			<input type="Submit" class="btn btn-danger" name="owner"/>
		</div>
		<div class="col-sm-2">          
 			<input type="reset" class="btn btn-danger"/>
		</div>
	</div>

</form>
</body>
</html>

