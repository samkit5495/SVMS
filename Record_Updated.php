<!--
Name – Jain Samkitkumar Hasmukhlal
Class – TE 	Roll. No. 20
Project Title: Society Visitors Maintaince System

Record_Updated.php
-->
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
	h1
	{
		color: white;
		text-align: center;
		font-size: 6em;
	}
	</style>
	<?php
		session_start();
		$con=mysql_connect('mysql.2freehosting.com','u158576178_svms','sam1565473')
    or die('Could not connect: ' .  mysql_error());
		$sel_db=mysql_select_db('u158576178_svms',$con);
		if(isset($_POST['society']))
		{	
			extract($_POST);
			if(!empty($_FILES))
			{			
				$fps=addslashes(file_get_contents($_FILES['simage']['tmp_name']));
				$update_data=mysql_query("update society set sname='".$_POST['sname']."',image='{$fps}',address='".$_POST['address']."',wings=".$_POST['wings'].",floors=".$_POST['floors'].",flats=".$_POST['flats'].",que='".$_POST['que']."',ans='".$_POST['ans']."' where username='".$_SESSION['username']."';");
			}
			else
				$update_data=mysql_query("update society set sname='".$_POST['sname']."',address='".$_POST['address']."',wings=".$_POST['wings'].",floors=".$_POST['floors'].",flats=".$_POST['flats'].",que='".$_POST['que']."',ans='".$_POST['ans']."' where username='".$_SESSION['username']."';");
			$view="Society/Entry_System.php";
			$val="Entry System";

		}
		if(isset($_POST['visitor']))
		{
			extract($_POST);
			$update_data=mysql_query("update visitor set vno='".$_POST['vno']."',vname='".$_POST['vname']."',mobno='".$_POST['mobno']."',reason='".$_POST['reason']."',wing=".$_POST['wing'].",floor=".$_POST['floor'].",flat=".$_POST['flat']." where vid='".$_SESSION['select']."';");
			$view="Society/View_Visitor.php";
			$val="View Visitor";
		}
		if(isset($_POST['owner']))
		{
			extract($_POST);
			if(!empty($_FILES))
			{
	    		$fpo=addslashes(file_get_contents($_FILES['oimage']['tmp_name']));
				$update_data=mysql_query("update owner set oname='".$_POST['oname']."',image='{$fpo}',contact='".$_POST['contact']."',wing=".$_POST['wing'].",floor=".$_POST['floor'].",flat=".$_POST['flat'].",que='".$_POST['que']."',ans='".$_POST['ans']."' where username='".$_SESSION['select']."';");
			}
			else
				$update_data=mysql_query("update owner set oname='".$_POST['oname']."',contact='".$_POST['contact']."',wing=".$_POST['wing'].",floor=".$_POST['floor'].",flat=".$_POST['flat'].",que='".$_POST['que']."',ans='".$_POST['ans']."' where username='".$_SESSION['select']."';");
			if($_SESSION['select1'])
			{
				$view="Owner/My_Visitors.php";
				$val="My Visitors";
			}
			else
			{
				$view="Society/View_Owner.php";
				$val="View Owner";
			}
		}
	?>
</head>

<body>
<ol class="breadcrumb">
	<li><a href="Home.php">Home</a></li>
	<li><a href="<?php echo $view;?>"><?php echo $val;?></a></li>
<?php
	if($val=="Entry System")
	{
?>
		<li><a href="Edit_Society.php">Settings</a></li>
<?php
	}
	else if($val=="My Visitors")
	{
?>
		<li><a href="Society/Edit_Owner.php">Settings</a></li>
<?php
	}
	else
	{
?>
	<li><a href="Entry_System.php">Entry System</a></li>
<?php
	}
?>
	<li class="active">Record Updated</li>
</ol>

<h1 class="col-sm-offset-1">Record<br> Updated<br> Successfully !!!</h1>
<form class="form-horizontal" method="post">
	
	<div class="form-group">
 		<div class="col-sm-offset-6">
 			<input type="submit" class="btn btn-primary" value="<?php echo $val;?>" formaction="<?php echo $view;?>" />
		</div>
	</div>
	
</form>
</body>
</html>