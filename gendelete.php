<?php


	$id=$_POST["txtid"];
	$loc=$_POST["txtloc"];
	$table=$_POST['txttable'];


	include "confid.php";

    $conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Unable to connect to database");
} 

$sql = "UPDATE $table SET status='deleted' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<html><body onload=myFunction()>
			<script>
        	function myFunction() {
        	alert('Changes save successfuly');
	
			window.location.assign('$loc');
	    }
		</script></body></html>
	";
} else {
    echo "Error Reserving. Contact the database admin" ;
}

$conn->close();

?>
