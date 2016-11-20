
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
		margin: 2%;
	}
	</style>
	<script type="text/javascript">
		function validate()
		{
			if(document.forgotpass.username.value==""||document.forgotpass.username.value==null)
			{
				document.getElementById('error').innerHTML="Enter Username!!!";
				return false;
			}
			if(document.forgotpass.type[0].checked==false&&document.forgotpass.type[1].checked==false)
			{
				document.getElementById('error').innerHTML="Select Type!!!";
				return false;	
			}
			return true;
		}
	</script>
</head>

<body>

<form class="form-horizontal" name="forgotpass" action="#" onsubmit="return validate();" method="post">
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-4">
		<img src="../Icons/question-mark-man.jpg" class="img-thumbnail"></img>
		</div>
	</div>
	<div class="form-group">
		<label for="username" class="col-sm-3 control-label">Username </label>
		<div class="col-sm-3">
			<input class="form-control" type="text" maxlength="12" name="username" placeholder="Enter Username" size="20"/>
		</div>
	</div>

	<div class="form-group">
		 <label class="checkbox-inline col-sm-offset-3">
		 	<input type="radio" name="type" value="Society"> Society
		 </label>
		 <label class="checkbox-inline">
		 	<input type="radio" name="type" value="Owner"> Owner
		 </label>
	</div>


	<div class="form-group">
		 <div class="alert-danger col-sm-10 col-sm-offset-1" id="error"></div>
	</div>

 <div class="form-group">       
 	<div class="col-sm-offset-4 col-sm-12">          
 	<input type="Submit" class="btn btn-danger" name="btnforgotpass" />
  </div>    
  </div>
</form>
</body>
</html>

<?php
	$con=mysql_connect('mysql.2freehosting.com','u158576178_svms','sam1565473')
    or die('Could not connect: ' .  mysql_error());
	$sel_db=mysql_select_db('u158576178_svms',$con);
	if(isset($_POST['btnforgotpass']))
	{
		extract($_POST);
		if($_POST['type']=="Society")
			$data=mysql_query("select * from society where username='".$_POST['username']."';");
		else
			$data=mysql_query("select * from owner  where username='".$_POST['username']."';");
		$rownos=mysql_num_rows($data);
		if ( $rownos<= 0)
		{
?>
			<script type="text/javascript">
				document.getElementById('error').innerHTML="Enter Valid Username or Type!!!";
			</script>
<?php
		}
		else
		{
			session_start();
			$_SESSION['username']=$_POST['username'];
			$_SESSION['type']=$_POST['type'];
?>
			<script type="text/javascript">
			var open_link_1 = window.open('','mainframe');
			open_link_1.location="Forgot_Password1.php";
			</script>
<?php
		}
	}
?>