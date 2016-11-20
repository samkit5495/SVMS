
<html>
<head>

	<title>Change Username</title>
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
		$data=mysql_query("select username,pass from society where username='".$_SESSION['username']."';");
	else
		$data=mysql_query("select username,pass from owner where username='".$_SESSION['username']."';");
	$row = mysql_fetch_array($data);
?>
	<script type="text/javascript">
	function validate()
	{
		if(document.changeusername.oldusername.value=="" || document.changeusername.oldusername.value==null)
		{
			document.getElementById('error').innerHTML="Enter Old Username!!!";
			return false;
		}

		if(document.changeusername.newusername.value=="" || document.changeusername.newusername.value==null)
		{
			document.getElementById('error').innerHTML="Enter your new username!!!";
			return false;
		}

		if(document.changeusername.newusername.value!=document.changeusername.cusername.value)
		{
			document.getElementById('error').innerHTML="Enter correct confirm username!!!";
			return false;
		}

		if(document.changeusername.pass.value=="" || document.changeusername.pass.value==null)
		{
			document.getElementById('error').innerHTML="Enter your password!!!";
			return false;
		}
		return true;
	}
	</script>
</head>
<body>

<form class="form-horizontal" name="changeusername" onsubmit="return validate();" action="#" method="post">
		<div class="form-group">
			<label class="col-sm-3 control-label">Old Username </label> 
			<div class="col-sm-3">
				<input class="form-control" type="text" name="oldusername" placeholder="Enter Old Username" size="20"/>
			</div>
		</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">New Username </label> 
		<div class="col-sm-3">
			<input class="form-control" type="text" maxlength="20" name="newusername" placeholder="Enter New Username" size="20"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Confirm New Username </label> 
		<div class="col-sm-3">
			<input class="form-control" type="text" maxlength="20" name="cusername" placeholder="Confirm New Username" size="20"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label">Password </label> 
		<div class="col-sm-3">
			<input class="form-control" type="password" maxlength="20" name="pass" placeholder="Enter your password" size="20"/>
		</div>
	</div>
	<div class="form-group">
		 <div class="alert-danger col-sm-10 col-sm-offset-1" id="error"></div>
	</div>
 <div class="form-group">       
 	<div class="col-sm-offset-4 col-sm-12">          
 	<input type="Submit" class="btn btn-danger" name="btnchangeusername" />
  </div>    
  </div>
</form>
</body>
</html>
<?php
	if(isset($_POST['btnchangeusername']))
	{
		extract($_POST);
		if ( $row['username']!= $_POST['oldusername'])
		{
?>
			<script type="text/javascript">
				document.getElementById('error').innerHTML="Wrong Username!!!";
			</script>
<?php
		}
		else if($row['pass']!= $_POST['pass'])
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
				$data=mysql_query("update society set username='".$_POST['newusername']."' where username='".$_SESSION['username']."';");
			else
				$data=mysql_query("update owner set username='".$_POST['newusername']."' where username='".$_SESSION['username']."';");
			$_SESSION['username']=$_POST['newusername'];
?>
			<script type="text/javascript">
			var open_link_1 = window.open('','mainframe');
			open_link_1.location="Username_Change.php";
			</script>
<?php
		}
	}
?>