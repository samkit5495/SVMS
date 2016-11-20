<html>
<head>
<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
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

	if(document.register.pass.value=="" || document.register.pass.value==null)
	{
		document.getElementById('error').innerHTML="Enter your password!!!";
		return false;
	}

	if(document.register.cpass.value=="" || document.register.cpass.value==null)
	{
		document.getElementById('error').innerHTML="Enter confirm password!!!";
		return false;
	}
	
	if(document.register.pass.value!=document.register.cpass.value)
	{
		document.getElementById('error').innerHTML="Enter correct confirm password!!!";
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

</head>

<body>
<h1 class="col-sm-offset-4"><font color="white">Registration</font></h1>
<form class="form-horizontal" enctype="multipart/form-data" name="register" action="Record_Added.php" method="post" onsubmit="return validate();">
	<div class="form-group">
		

	<div class="form-group">
		 <div class="alert-danger col-sm-12" id="error"></div>
	</div>
		<label for= "Sname" class="col-sm-2 control-label">Name of Society </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" name="sname" placeholder="Enter Name of Society" size="10"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Society Photo/Logo</label> 
		<div class="col-sm-3">
			<input type="file"  onchange="readURL(this);" name="simage"  accept="image/jpeg" required/> 
			<p class="help-block">Browse your Photo from here.</p>
		</div>
		<div class="col-sm-7">
			<img class="img-thumbnail" id="blah" src="#" height="0" width="0" />
		</div>
	</div>

	<div class="form-group">
		<label for= "Address"   class="col-sm-2 control-label">Address of Society</label>
		<div class="col-sm-3">
			<textarea class="form-control" type="text" name="address" placeholder="Enter Address of Society" rows="3"></textarea>
		</div>
	</div>
	
	

	<div class="form-group">
		<label for= "Wings" class="col-sm-2 control-label">No. of wings</label>
		<div class="col-sm-1">
			<input class="form-control" type="text" name="wings"  size="2"/>
		</div>
		<label for= "Floors" class="col-sm-2 control-label">No. of Floors</label>
		<div class="col-sm-1">
			<input class="form-control" type="text" name="floors" size="2"/>
		</div>
		<label for= "Flats" class="col-sm-2 control-label">No. of Flats</label>
		<div class="col-sm-1">
			<input class="form-control" type="text" name="flats" size="2"/>
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
			<option>What is your birth-place ?</option></select>
		</div> 
	</div>

	<div class="form-group">
		<label for= "Ans" class="col-sm-2 control-label">Answer</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="ans" placeholder="Enter answer for selected question" size="10"/>
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

