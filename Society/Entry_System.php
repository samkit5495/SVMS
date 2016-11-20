<html>
<head>
<title>Entry System</title>
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
		margin: 3%;
	}
	
	
	label
	{
		font-size: 2em;
	}
	

	</style>
</head>

<body>


<form class="form-vertical" role="form">
	<div class="form-group">
			<label for= "owner" class="col-sm-2 col-sm-offset-2 control-label"><font color="white">Owner</font></label>
			<label for= "owner" class="col-sm-2 col-sm-offset-5 control-label"><font color="white">Visitor</font></label>
			<div class="col-sm-offset-2"></div>
	</div>

	<div class="col-sm-4 col-sm-offset-1">
			<img src="../Icons/owner.png"  height="250" width="270">
	</div>
		
	<div class="col-sm-4 col-sm-offset-3">
		<img src="../Icons/visitor.png" height="250" width="270">
	</div>

	<div class="form-group col-sm-12"> </div>

	<div class="form-group">  
	
		<div class="col-sm-offset-1">
 			<div class="col-sm-2 ">          
 				<input type="Submit" class="btn btn-danger" value="Add" name="Add_Owner" formaction="Add_Owner.php"/>
			</div>
		</div>

		<div class="col-sm-offset-3">
 			<div class="col-sm-2">          
 				<input type="Submit" class="btn btn-danger" value="View" name="View_Owner" formaction="View_Owner.php"/>
			</div>
		</div>

	</div>



	<div class="form-group">
		<div class="col-sm-offset-8">
 			<div class="col-sm-2 ">          
 				<input type="Submit" class="btn btn-danger" value="Add" name="Add_Visitor" formaction="Add_Visitor.php"/>
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-10">
 			<div class="col-sm-1">          
 				<input type="Submit" class="btn btn-danger" value="View" name="View_Visitor" formaction="View_Visitor.php"/>
			</div>
		</div>
	</div>
	

</form>
</body>
</html>

