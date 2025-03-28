<! DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="script.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
include "session.php";
if (isset($_SESSION['lname'])) {
    $lname = $_SESSION['lname'];
} 
?>

<body>

<div class="header">
	<div class="col1">
	 SOKO MANAGEMENT SYSTEM
	</div>
	<div class="col2">
		MTUMBA MANAGEMENT SYSTEM

		<div class="dropdown">
			<div class="user">
				<i class="fa fa-user-o"></i>
			</div>
			<div class="content">
				<div style="padding:10px;border-bottom:solid 1px #ccc;color: purple">
			logged in as:	<?php echo "$lname"; ?>
				</div>
				<div class="item"> <i class='fa fa-cog'></i> Edit Profile 
				</div>

				<div class="item" onclick="window.location='logout.php'"> <i class='fa fa-sign-out'></i> Log-out </div>
			</div>	
		</div>
	</div>
</div>


<div class="rightpane bg-success" id='leftpane'>
	<div class="menu">
		<span id='bar1' class="text-success"  onclick="slideOut()"><i class="fa fa-bars"></i></span>
		<span id='bar2' class="text-primary"  onclick="slideIn()"><i class="fa fa-bars"></i></span>
	</div>
    <div class="ritem" onclick="window.location='dashboard.php'"><i class='fa fa-dashboard'></i> Dashboard</div>
  <div class="ritem" onclick="window.location='kibanda.php'"><i class='fa fa-home'></i> Vibanda Zangu</div>
  <div class="ritem" onclick="window.location='kibandaform.php'"><i class='fa fa-plus'></i> Ongeza Kibanda</div>
  <div class="ritem" onclick="window.location='sales.php'"><i class='fa fa-home'></i> Sales</div>
  <div class="ritem" onclick="window.location='logout.php'"><i class='fa fa-sign-out'></i> Logout</div></div>
  
</div>

<style>
   .box{
       cursor:pointer;
          } 
</style>

<div class="main" id="main">
	<div id='display'></div>
	<div class="inner" id="inner">
<!------------content goes here------------>

	<div class="box">
		<div class="boxinner bg-primary" onclick="window.location='kibanda.php'">	
			<i class="fa fa-home" style="font-size:36px"></i>
			<br>
			<hr color="#eee">
			Vibanda Zangu
		</div>
	</div>
	<div class="box" onclick="window.location='kibandaform.php'">
		<div class="boxinner bg-warning">	
			<i class="fa fa-book" style="font-size:36px"></i>
			<br>
			<hr color="#eee">
			Register Kibanda
		</div>
	</div>
	<div class="box" onclick="window.location='Concurrent.php'">
		<div class="boxinner bg-success">	
			<i class="fa fa-dollar fa-2x"></i>
			<br>
			<hr color="#eee">
			Concurrent Sales
		</div>
	</div>

<!------------content goes here------------>
	</div>
</div>



</body>
</html>