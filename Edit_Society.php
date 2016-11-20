<html>
<head>
<title>Registration</title>
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
	<script type="text/javascript">
	function validate()
	{
	if(document.register.sname.value=="" || document.register.sname.value==null)
	{
		document.getElementById('error').innerHTML="Enter name of Society!!!";
		return false;
	}

	if(document.register.address.value=="" || document.register.address.value==null)
	{
		document.getElementById('error').innerHTML="Enter address of Society";
		return false;
	}

	if(document.register.wings.value=="" || document.register.wings.value==null)
	{
		document.getElementById('error').innerHTML="Enter no of wings!!!";
		return false;
	}

	if(document.register.floors.value=="" || document.register.floors.value==null)
	{
		document.getElementById('error').innerHTML="Enter no of floors!!!";
		return false;
	}

	if(document.register.flats.value=="" || document.register.flats.value==null)
	{
		document.getElementById('error').innerHTML="Enter no of flats!!!";
		return false;
	}

	if(document.register.username.value=="" || document.register.username.value==null)
	{
		document.getElementById('error').innerHTML="Enter your username!!!";
		return false;
	}

	if(document.register.ans.value=="" || document.register.ans.value==null)
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
	$data=mysql_query("select * from society where username='".$_SESSION['username']."';");	
	$row = mysql_fetch_array($data);

	if($row['que']=="What is your nick name ?")
		$q=0;
	else if($row['que']=="What is your birth-place ?")
		$q=1;
	else
		$q=2;
?>
</head>

<body>
<h1 class="col-sm-offset-4">Settings</h1>
<form class="form-horizontal" enctype="multipart/form-data" name="register" action="Record_Updated.php" method="post" onsubmit="return validate();">

	
	<div class="form-group">
		 <div class="alert-danger col-sm-12" id="error"></div>
	</div>
	<div class="form-group">
		<label for= "Sname" class="col-sm-2 control-label">Name of Society </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="sname" value="<?php echo $row['sname'];?>" placeholder="Enter Name of Society" size="10"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Society Photo/Logo</label> 
		<div class="col-sm-3">
			<input type="file"  onchange="readURL(this);" name="simage" accept="image/jpeg"/> 
			<p class="help-block">Browse your Photo from here.</p>
		</div>
		<div class="col-sm-7">
			<?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Your Image" height="200" width="150" class="img-thumbnail" id="blah" />';?>
		</div>
	</div>

	<div class="form-group">
		<label for= "Address" class="col-sm-2 control-label">Address of Society</label>
		<div class="col-sm-3">
			<textarea class="form-control" type="text" name="address" placeholder="Enter Address of Society" rows="3"><?php echo $row['address'];?></textarea>
		</div>
	</div>
	
	

	<div class="form-group">
		<label for= "Wings" class="col-sm-2 control-label">No. of wings</label>
		<div class="col-sm-1">
			<input class="form-control" type="text" value="<?php echo $row['wings'];?>" name="wings"  size="2"/>
		</div>
		<label for= "Floors" class="col-sm-2 control-label">No. of Floors</label>
		<div class="col-sm-1">
			<input class="form-control" type="text" value="<?php echo $row['floors'];?>" name="floors" size="2"/>
		</div>
		<label for= "Flats" class="col-sm-2 control-label">No. of Flats</label>
		<div class="col-sm-1">
			<input class="form-control" type="text" value="<?php echo $row['flats'];?>" name="flats" size="2"/>
		</div>				
	</div>

	<div class="form-group">
		<label for= "Username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-3">
			<input class="form-control" disabled type="text" value="<?php echo $row['username'];?>" name="username" placeholder="Enter your Username" size="15"/>
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
			<input type="text" class="form-control" value="<?php echo $row['ans'];?>" name="ans" placeholder="Enter answer for selected question" size="10"/>
		</div>
	</div>



	<div class="form-group">       
 		<div class="col-sm-offset-3 col-sm-2">          
 			<input type="Submit" class="btn btn-danger" name="society" value="Submit"/>
		</div>
		<div class="col-sm-2">          
 			<input type="reset" class="btn btn-danger"/>
		</div>
	</div>

	
</form>
</body>
</html>

