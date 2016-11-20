<html>
<head>
<title>Registration</title>
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


	if(document.owner.pass.value=="" || document.owner.pass.value==null)
	{
		document.getElementById('error').innerHTML="Enter your password!!!";
		return false;
	}

	if(document.owner.cpass.value=="" || document.owner.cpass.value==null)
	{
		document.getElementById('error').innerHTML="Enter confirm password!!!";
		return false;
	}
	
	if(document.owner.pass.value!=document.owner.cpass.value)
	{
		document.getElementById('error').innerHTML="Enter correct confirm password!!!";
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
	$data=mysql_query("select wings,floors,flats from society where username='".$_SESSION['username']."';");
	$row = mysql_fetch_array($data);
?>
</head>
<body>

<h1 class="col-sm-offset-2"><font color="white">Registration of Owner</font></h1>
	
<form class="form-horizontal" enctype="multipart/form-data" name="owner" action="../Record_Added.php" method="post" onsubmit="return validate();">
<ol class="breadcrumb">
	<li><a href="../Home.php">Home</a></li>
	<li><a href="Entry_System.php">Entry System</a></li>
	<li class="active">Add Owner</li>
</ol>
	
	
	<div class="form-group">
		 <div class="alert-danger col-sm-12" id="error"></div>
	</div>
	<div class="form-group">
		<label for= "Oname" class="col-sm-2 control-label">Name of Owner: </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="oname" placeholder="Enter name of  owner" size="10"/>
		</div>

		<div class="col-sm-7">
			<img class="img-thumbnail" id="blah" src="#" alt="Your Image" height="0" width="0" />
		</div>
	
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Your Photo</label> 
		<div class="col-sm-3">
			<input type="file"  onchange="readURL(this);" name="oimage"  accept="image/jpeg" required/> 
			<p class="help-block">Browse your Photo from here.</p>
		</div>
	</div>
 
	<div class="form-group">
		<label for= "Contact" class="col-sm-2 control-label">Contact no: </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="contact" placeholder="Enter your contact no" size="10"/>
		</div>
	</div>


	
	<div class="form-group">
		<label for= "Wing" class="col-sm-2 control-label">Building no./ Wing:</label>
		<div class="col-sm-1">
			<select class="form-control" name="wing"/>
			<?php
				for ($i=1; $i <= $row['wings']; $i++)
				{ 
					echo "<option>".$i."</option>";
				}
			?>
			</select>
		</div>
		
		<label for= "Floor" class="col-sm-2 control-label"> Floor no.:</label>
		<div class="col-sm-1">
			<select class="form-control" type="text" name="floor"/>
			<?php
				for ($i=1; $i <= $row['floors']; $i++)
				{ 
					echo "<option>".$i."</option>";
				}
			?>
			</select>
		</div>
		
		<label for= "Flat" class="col-sm-2 control-label">Flat No.</label>
		<div class="col-sm-1">
			<select class="form-control" type="text" name="flat">
			<?php
				for ($i=1; $i <= $row['flats']; $i++)
				{ 
					echo "<option>".$i."</option>";
				}
			?>
			</select>
		</div>			
	</div>

	<div class="form-group">
		<label for= "Username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="username" placeholder="Enter your Username" size="15"/>
		</div>	
	</div>

	<div class="form-group">
		<label for= "Pass" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-3">
			<input class="form-control" type="password" name="pass" placeholder="Enter your Password" size="10"/>
		</div>	
	</div>

	<div class="form-group">
		<label for= "Cpass" class="col-sm-2 control-label">Confirm password</label>
		<div class="col-sm-3">
			<input class="form-control" type="password" name="cpass" placeholder="Confirm password" size="10"/>
		</div>	
	</div>
	

	<div class="form-group">
		<label for= "Que" class="col-sm-2 control-label">Security question:</label>
		<div class="col-sm-3">
			<select class="form-control" name="que" required>
				<option>What is your nick name ?</option>
				<option>Last two digits of your mobile no.</option>
				<option>What is your birth-place ?</option>
			</select>
		</div> 
	</div>

	<div class="form-group">
		<label for= "Ans" class="col-sm-2 control-label">Answer</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="ans" placeholder="Enter answer for selected question" size="10"/>
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

