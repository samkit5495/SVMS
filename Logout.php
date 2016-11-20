
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
	.img-thumbnail
	{

		outline: none;
    border-color: red;
    box-shadow: 0 0 25px red;	
	}
	</style>
</head>
<?php
	session_start();
	$_SESSION['passchange']=true;
	$_SESSION['select1']=true;
?>
<body>

<form class="form-horizontal" action="#" target="mainframe" method="post"> 
	<div class="form-group">
		<div class="col-sm-2">
			<?php
				echo '<img class="img-circle" src="data:image/jpeg;base64,' . base64_encode($_SESSION['image']) . '" width="100" height="100">';
			?>
		</div>
	
		<div class="col-sm-10">
			<label for="Welcome" class="col-sm-1 control-label">Welcome <?php echo $_SESSION['username']?>; </label>
		</div>

	</div>

	
	<div class="form-group">
		<label class="col-sm-1 control-label"><a href="Change_Username/Edit_Username.php" target="mainframe">Change Username</a></label>
		<label class="col-sm-1 control-label"><a href="Forgot_Password/Forgot_Password1.php" target="mainframe">Change Password</a></label>

	
		<label class="col-sm-11 control-label">
		<?php
			if($_SESSION['type']=="Society")
			{
				echo '<a href="Society/Entry_System.php" target="mainframe">Entry System</a>';
				$settings="Edit_Society.php";
			}
			else
			{
				echo '<a href="Owner/My_Visitors.php" target="mainframe">My Visitors</a>';
				$settings="Society/Edit_Owner.php";
			}
		?>
		</label>
	</div>
	<input type="text" hidden name="select" value="<?php echo $_SESSION['username'];?>"/>
 <div class="form-group">       
 	<div class="col-sm-offset-1 col-sm-2">
 	<input type="Submit" class="btn btn-danger" value="Settings" name="settings" formaction="<?php echo $settings;?>"/>
 	<input type="Submit" class="btn btn-danger" value="Logout" name="logout" />
  </div>    
  </div>
</form>
</body>
</html>

<?php
	if(isset($_POST['logout']))
	{
?>
		<script type="text/javascript">
			var open_link_2 = window.open('','_parent');
			open_link_2.location="index.php";
		</script>
<?php
	}
?>