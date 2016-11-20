<!--
Name – Jain Samkitkumar Hasmukhlal
Class – TE 	Roll. No. 20
Project Title: Society Visitors Maintaince System

Record_Added.php
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
		text-align: center;
		font-size: 6em;
		color: white;
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
			$fps=addslashes(file_get_contents($_FILES['simage']['tmp_name']));
			$ins_data=mysql_query("insert into society values('".$_POST['sname']."','{$fps}','".$_POST['address']."',".$_POST['wings'].",".$_POST['floors'].",".$_POST['flats'].",'".$_POST['username']."','".$_POST['pass']."','".$_POST['que']."','".$_POST['ans']."');");
			$addnew="Add_Society.php";
			$val="Registration";
		}
		if(isset($_POST['visitor']))
		{
			extract($_POST);
			$ins_data=mysql_query("insert into visitor values('".$_POST['vid']."','".$_POST['vno']."','".$_POST['vname']."','".$_POST['mobno']."','".$_POST['reason']."','".date('Y-m-d')."','".date('h:i:s A')."','".$_SESSION['username']."',".$_POST['wing'].",".$_POST['floor'].",".$_POST['flat'].");");
			$addnew="Society/Add_Visitor.php";
			$val="Add Visitor";
		}
		if(isset($_POST['owner']))
		{
			extract($_POST);
    		$fpo=addslashes(file_get_contents($_FILES['oimage']['tmp_name']));
			$ins_data=mysql_query("insert into owner values('".$_POST['oname']."','{$fpo}','".$_POST['contact']."','".$_SESSION['username']."',".$_POST['wing'].",".$_POST['floor'].",".$_POST['flat'].",'".$_POST['username']."','".$_POST['pass']."','".$_POST['que']."','".$_POST['ans']."');");
			$addnew="Society/Add_Owner.php";
			$val="Add Owner";
		}
	?>
</head>


<body>
<ol class="breadcrumb">
	<li><a href="Home.php">Home</a></li>
<?php
	if($val!="Registration")
?>
		<li><a href="Entry_System.php">Entry System</a></li>
	<li><a href="<?php echo $addnew;?>"><?php echo $val;?></a></li>
	<li class="active">Record Added</li>
</ol>

<h1 class="col-sm-offset-1">Record<br> Added<br> Successfully !!!</h1>
<form class="form-horizontal" action="<?php echo $addnew;?>" method="post">
	
	<div class="form-group">
 		<div class="col-sm-offset-6">
 			<input type="Submit" class="btn btn-primary" value="Add New"/>
		</div>
	</div>
	
</form>
</body>
</html>

