
<html>

<head>

	<title>Login</title>
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
	</style>
	<?php
		session_start();
		$_SESSION['passchange']=false;
	?>
	<script type="text/javascript">
		function validate()
		{
			if(document.login.username.value=="" || document.login.username.value==null)
			{
				document.getElementById('error').innerHTML="Enter your username!!!";
				document.getElementById('username').setAttribute("class", "form-group has-error");
				return false;
			}
			else
				document.getElementById('username').setAttribute("class", "form-group");

			if(document.login.pass.value=="" || document.login.pass.value==null)
			{
				document.getElementById('error').innerHTML="Enter your password!!!";
				document.getElementById('pass').setAttribute("class", "form-group has-error");
				return false;
			}
			else
				document.getElementById('pass').setAttribute("class", "form-group");

			if(document.login.type[0].checked==false&&document.login.type[1].checked==false)
			{
				document.getElementById('error').innerHTML="Select Type!!!";
				return false;	
			}
			return true;
		}
	</script>
</head>

<body>

<form class="form-horizontal" target="login" action="#" method="post" name="login" onsubmit="return validate();">
	<div class="form-group" id="username">
		<label for="username" class="col-sm-1 control-label">Username </label>
		<div class="col-sm-2" >
			<input class="form-control" type="text" maxlength="20" name="username" placeholder="Enter Username" size="10"/>
		</div>
	</div>
	<div class="form-group" id="pass">
		<label for="password" class="col-sm-1 control-label">Password </label> 
		<div class="col-sm-2">
			<input class="form-control" id="password" type="password" maxlength="20" name="pass" placeholder="Enter Password" size="10"/>
		</div>
	</div>
	<div class="form-group">
		 <label class="checkbox-inline">
		 	<input type="radio" name="type" value="Society"> Society
		 </label>
		 <label class="checkbox-inline">
		 	<input type="radio" name="type" value="Owner"> Owner
		 </label>
	</div>
	<div class="form-group">
		 <div class="alert-danger col-sm-2" id="error"></div>
	</div>
		
 <div class="form-group">       
 	<div class="col-sm-offset-1 col-sm-2">          
	 	<input type="Submit" class="btn btn-danger" value="Login" name="login" />
	 	<label class="col-sm-1 control-label"><a href="Forgot_Password/Forgot_Password.php" target="mainframe">Forgot Password</a></label>
  	</div>    
  </div>
</form>
</body>
</html>

<?php
	$con=mysql_connect('mysql.2freehosting.com','u158576178_svms','sam1565473')
    or die('Could not connect: ' .  mysql_error());
	$sel_db=mysql_select_db('u158576178_svms',$con);
	if(isset($_POST['login']))
	{
		extract($_POST);
		if($_POST['type']=="Society")
		{
			$data=mysql_query("select * from society where username='".$_POST['username']."' and pass='".$_POST['pass']."';");
			$pg="Society/Entry_System.php";
		}
		else
		{
			$data=mysql_query("select * from owner where username='".$_POST['username']."' and pass='".$_POST['pass']."';");
			$pg="Owner/My_Visitors.php";
		}
		$num_rows = mysql_num_rows($data);
		if($num_rows>0)
		{
			$_SESSION['username'] =$_POST['username'];
			$_SESSION['type']=$_POST['type'];
			$row = mysql_fetch_array($data);
			$_SESSION['image']=$row['image'];
?>
			<script type="text/javascript">
				var open_link_1 = window.open('','login');
				open_link_1.location="Logout.php";

				var open_link_2 = window.open('','mainframe');
				open_link_2.location="<?php echo $pg;?>";
			</script>
<?php
		}
		else
		{
?>
			<script type="text/javascript">
				document.getElementById('error').innerHTML="Wrong Email ID or password!!!";
			</script>
<?php
		}
	}
?>