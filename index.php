<?php session_start(); ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
		</style>
		<title>ITMO 544 Fall 2015</title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/demo.css">
		<style>
			header
			{
				color: black;
				height:80px;
				width:100%;
			}
			p.big 
			{
				line-height: 100%;
			}
		</style>
	</head>
	<body>
		<div class="container" width="100%">
			<div id="image" style="width:5%">
				<IMG style="height:60px;width:100%;margin-top:10px;margin-left:10px;float:left" SRC="images/IIT_Scarlet_Hawks.svg.png">
			</div>
			
			<div id="text" style="width=95%">
				<div id="headerText" style="color:FFFFCC;width:75%;padding-left:20%;font-family:calibri;font-size:300%;font-style:oblique;font-weight:bold;float:left">
					Enter User Details
				</div>
			</div>
		</div>
		<br>
		<center>
			<div id="cakeHook" class="form-group">
				<form enctype="multipart/form-data" action="submit.php" method="POST">
					<div>
						<!-- MAX_FILE_SIZE must precede the file input field -->
						<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
						<!-- Name of input element determines name in $_FILES array -->
						Send this file: <input name="userfile" type="file" />
					</div>
					<div><br/></div>
					<div>
						Enter User Name: <input type="name" name="username">
					</div>
					<div><br/></div>
					<div>
						Enter User Email: <input type="email" name="useremail">
					</div>
					<div><br/></div>
					<div>
						Enter User Phone(1-XXX-XXX-XXXX): <input type="phone" name="userphone">
					</div>
					<div><br/></div>
					<div align='center'>
						<input type="submit" value="Send File" />
					</div>
				</form>
			</div>
		</center>
	</body>
	
</html>
