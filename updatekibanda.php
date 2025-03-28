<?php

	$a=$_POST["txtid"];
	$name=$_POST["txtname"];
	$date=$_POST["txtdate"];

	include "confid.php";


    $conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Unable to connect to database");
} 

$sql = "UPDATE `kibanda` SET name='$name', date='$date' WHERE id='$a'";

if ($conn->query($sql) === TRUE) {
    echo "<html><body onload=myFunction()>
			<script>
        	function myFunction() {
        	alert('Changes save successfuly');
	
			window.location.assign('kibanda.php');
	    }
		</script></body></html>
	";
} else {
    echo "Error Reserving. Contact the database admin" ;
}

$conn->close();

?>
