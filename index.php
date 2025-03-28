<! DOCTYPE html>
<html>
<head>
	<title>MTUMBA SYSTEM</title>
</head>



<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<?php
session_start();

if (isset($_SESSION['display'])) {
    $info = $_SESSION['display'];
    // Display the information here as needed.

    // Clear the session data after displaying it once.
    unset($_SESSION['display']);
}
else{
	$info="";
}
?>




<style type="text/css">
	.pos{
		
		width:330px;
		border-left:5px solid red;
		border-top:5px solid blue;
		margin: auto;
		left: 35%;
		margin-top: 10%;
		cursor: pointer;
		border-radius: 10px 10px 10px 10px;
		box-shadow: 5px 5px black;
		background-color: #eee;
		}
.title{
	text-align: center;
	font-size: 33px;
	color:#000080;
    font-family: arial;
    text-shadow: 2px 2px 5px white;	
    font-weight: bold;
}

#btn {
  background-color: #4CAF50; 
  color: black; 
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 5px 5px 5px 5px;
  border: none;
}

#btn:hover {
  background-color: white;
  color: black;
  font-weight: bolder;
  border: 2px solid#4CAF50;
}
#txt{
	text-align: center;
	font-size: 23px;
	font-weight: bold;
	color:#000000;
	font-family: Arial;
}

</style>
<style>
    form{
        border:1px solid #ccc;
    }
</style>

<body style="background-color:lightblue">


<div class="pos">
    <h3 align="center" style="color:purple;">Mtumba Sales Management System</h3>
	<form method="post" action="loginconfirm.php">
<table cellpadding="15px">
	<tr>
		<td> <b> Email <i class="fa fa-envelope" style="color: red;"></i></b></td>
		<td><input type="text" name="txtemail" value="" required="" class="form-control"> </td>
	</tr>
	<tr>
		 <td> <b> Password <i class="fa fa-lock" style="color: red;"></i></b></td> 
		 <td><input type="password" name="txtpass" value="" required="" class="form-control"> </td>
	</tr>
	<tr>
	    <td colspan="2" align="center">
	        <span>  <font color="red">   <?php echo" $info";?>  </font></span>
	     </td>
	</tr>
	<tr>
		<td colspan="2" align="right">
					<button type="submit" id="btn">Log In</button>
		</td>
	</tr>

	<tr>
		<td colspan="2" align="center"> <b> Don't have an account? </b> <a href='Register.php'>Register</a></td>
	</tr>
</table>
	</form>

</body>
</html>