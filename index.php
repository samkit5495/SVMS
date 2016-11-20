<!--
Name – Jain Samkitkumar Hasmukhlal
Class – TE 	Roll. No. 20
Project Title: Society Visitors Maintaince System

index.php
-->
<!DOCTYPE html>
<html>
<head>
	<title>SVMS</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<?php
	session_start();
	if(isset($_POST['logout']))
	{
		session_destroy();
	}
?>
<body>
<div id="base">
	<div>
		<div id="title" align="center">
			Society Visitors Maintaince System
		</div>
		<div id="menu" >
			<ul class="nav nav-tabs" >
				<li><a href="Home.php" target="mainframe">Home</a></li>
				<li><a href="Gallery.php" target="mainframe">Registered Societies</a></li>
				<li><a href="Add_Society.php" target="mainframe">Register</a></li>
				<li><a href="Contact Us.php" target="mainframe">Contact Us</a></li>

  				<ul class="nav nav-tabs navbar-right">

					<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Login <span class="caret"></span>
				</a>
					<ul class="dropdown-menu">
						<li>
							<iframe src="Login.php" name="login" height="280em" width="280em" frameborder="0" scrolling="no"></iframe>
						</li>
					</ul>
				</li>
				</ul> 
			</ul>  
		</div>
	</div>
	<div id="main">
	<iframe src="Home.php" name="mainframe" height="100%" width="100%" align="center" frameborder="0" seamless scrolling="auto"></iframe>
	</div>
	<div id="footer">
		<div>
			<div style="float:left;width:77%" align="center">Copyright &copy <?php echo date('Y');?></div>
            <div class="s_icons"><a href="http://www.facebook.com/" target="_blank"><img src="Social/icon-facebook.png" alt="fb" /></a></div>
            <div class="s_icons"><a href="http://www.twitter.com/" target="_blank"><img src="Social/icon-twitter.png" alt="twitter" /></a></div>
            <div class="s_icons"><a href="http://www.tumblr.com/" target="_blank"><img src="Social/icon-tumblr.png" alt="tumblr" /></a></div>
            <div class="s_icons"><a href="http://www.plus.google.com/" target="_blank"><img src="Social/icon-googleplus.png" alt="google+" /></a></div>
            <div class="s_icons"><a href="http://www.instagram.com/" target="_blank"><img src="Social/icon-insta.png" alt="instagram" /></a></div>
        </div>
	</div>
</div>
</body>
</html>