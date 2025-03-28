<?php

	$a=$_POST["txtid"];
	$item=$_POST['txtitem'];
	$description=$_POST['txtdescription'];
	$bp=$_POST['txtbp'];
	$quantity=$_POST['txtquantity'];
	$total=$bp*$quantity;
	$sp=$_POST['txtsp'];
	$date=$_POST['txtdate'];

	include "confid.php";


    $conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Unable to connect to database");
} 

$sql = "UPDATE stock SET item='$item', description='$description', bp='$bp', quantity='$quantity', total='$total', sp='$sp', date='$date' WHERE id='$a'";

if ($conn->query($sql) === TRUE) {
    echo "<html><body onload=myFunction()>
			<script>
        	function myFunction() {
        	alert('Changes save successfuly');
	
			window.location.assign('stock.php');
	    }
		</script></body></html>
	";
} else {
    echo "Error Reserving. Contact the database admin" ;
}

$conn->close();

?>
