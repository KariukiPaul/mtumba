<! DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
}
// End of my session

	$name=$_POST['txtname'];
	$date=$_POST['txtdate'];
	$uid=$uid;
	include "confid.php";

	$conn=new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Unable to connect to database");
} 

$sql = "INSERT INTO kibanda (id, uid, name, date)VALUES (NULL, '$uid', '$name', '$date')";

if ($conn->query($sql) === TRUE) {
    echo "Registration succesful";
    header("Location:kibanda.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
</body>
</html>