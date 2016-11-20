
<html>

<head>

	<title>Forgot Password</title>
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
<?php
	$con=mysql_connect('mysql.2freehosting.com','u158576178_svms','sam1565473')
    or die('Could not connect: ' .  mysql_error());
	$sel_db=mysql_select_db('u158576178_svms',$con);
	extract($_POST);
	session_start();
	if($_SESSION['type']=="Society")
		$data=mysql_query("select que,ans,pass from society where username='".$_SESSION['username']."';");
	else
		$data=mysql_query("select que,ans,pass from owner where username='".$_SESSION['username']."';");
	$row = mysql_fetch_array($data);
?>
	<script type="text/javascript">
	function validate()
	{
<?php
		if(!$_SESSION['passchange'])
		{
?>
			if(document.forgotpass1.ans.value=="" || document.forgotpass1.ans.value==null)
			{
				document.getElementById('error').innerHTML="Enter answer!!!";
				return false;
			}
<?php
		}
		else
		{
?>
			if(document.forgotpass1.oldpass.value=="" || document.forgotpass1.oldpass.value==null)
			{
				document.getElementById('error').innerHTML="Enter your old password!!!";
				return false;
			}
<?php
		}
?>
		if(document.forgotpass1.pass.value=="" || document.forgotpass1.pass.value==null)
		{
			document.getElementById('error').innerHTML="Enter your password!!!";
			return false;
		}

		if(document.forgotpass1.cpass.value=="" || document.forgotpass1.cpass.value==null)
		{
			document.getElementById('error').innerHTML="Enter confirm password!!!";
			return false;
		}
		
		if(document.forgotpass1.pass.value!=document.forgotpass1.cpass.value)
		{
			document.getElementById('error').innerHTML="Enter correct confirm password!!!";
			return false;
		}
		return true;
	}
	</script>
</head>
<body>

<form class="form-horizontal" name="forgotpass1" onsubmit="return validate();" action="#" method="post">
<?php 
	if(!$_SESSION['passchange'])
	{
?>
		<div class="form-group">
			<label class="col-sm-3 control-label">Question </label> 
			<label class="col-sm-3 control-label"><?php echo $row['que'];?> </label> 
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Answer </label> 
			<div class="col-sm-3">
				<input class="form-control" type="text" name="ans" placeholder="Enter Answer" size="20"/>
			</div>
		</div>
<?php
	}
	else
	{
?>
		<div class="form-group">
			<label class="col-sm-3 control-label">Old Password </label> 
			<div class="col-sm-3">
				<input class="form-control" type="password" name="oldpass" placeholder="Enter Password" size="20"/>
			</div>
		</div>
<?php				
	}
?>
	<div class="form-group">
		<label class="col-sm-3 control-label">New Password </label> 
		<div class="col-sm-3">
			<input class="form-control" type="password" maxlength="20" name="pass" placeholder="Enter New Password" size="20"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Confirm New Password </label> 
		<div class="col-sm-3">
			<input class="form-control" type="password" maxlength="20" name="cpass" placeholder="Confirm New Password" size="20"/>
		</div>
	</div>
	<div class="form-group">
		 <div class="alert-danger col-sm-10 col-sm-offset-1" id="error"></div>
	</div>
 <div class="form-group">       
 	<div class="col-sm-offset-4 col-sm-12">          
 	<input type="Submit" class="btn btn-danger" name="btnforgotpass1" />
  </div>    
  </div>
</form>
</body>
</html>

<?php
	if(isset($_POST['btnforgotpass1']))
	{
		extract($_POST);
		if (!$_SESSION['passchange'] && $row['ans']!= $_POST['ans'])
		{
?>
			<script type="text/javascript">
				document.getElementById('error').innerHTML="Wrong Answer!!!";
			</script>
<?php
		}
		else if($_SESSION['passchange'] && $row['pass']!= $_POST['oldpass'])
		{
?>
			<script type="text/javascript">
				document.getElementById('error').innerHTML="Wrong Password!!!";
			</script>
<?php
		}
		else
		{
			if($_SESSION['type']=="Society")
				$data=mysql_query("update society set pass='".$_POST['pass']."' where username='".$_SESSION['username']."';");
			else
				$data=mysql_query("update owner set pass='".$_POST['pass']."' where username='".$_SESSION['username']."';");
?>
			<script type="text/javascript">
			var open_link_1 = window.open('','mainframe');
			open_link_1.location="Password_Change.php";
			</script>
<?php
		}
	}
?>