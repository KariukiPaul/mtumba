<?php
// generating receipt number
$min=1;
$max=100;

$rctno=rand($min, $max);



//displaying stock
session_start();

if (isset($_SESSION['uid']) && (isset($_SESSION['kid']))) {
    $uid = $_SESSION['uid'];
    $kid=$_SESSION['kid'];
}
// End of my session



include 'confid.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `stock` where uid='$uid' && kid='$kid' && status='active'";
$result = $conn->query($sql);
$rowcount = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id=$row['id']; 
        $item = $row['item'];
        $bp = $row['bp'];
        $sp = $row['sp'];
          

    }
}

// Prepare the data to be inserted
	$item=$_POST['itemName'];
	$quantity=$_POST['quantity'];
	$sp=$sp;
	$total=$sp;
	$profit=$sp;

// Combine first names and last names into arrays of arrays
$data = array();
for ($i = 0; $i < count($firstNames); $i++) {
    $data[] = array($firstNames[$i], $lastNames[$i]);
}

// SQL statement to insert multiple rows
$sql = "INSERT INTO `sales` (id, uid, kid, item, quantity, sp, total, profit, rctno, date) VALUES ";
$values = array();

// Build the values part of the SQL statement
foreach ($data as $row) {
    $values[] = "('" . $conn->real_escape_string($row[0]) . "', '" . $conn->real_escape_string($row[1]) . "')";
}

$sql .= implode(", ", $values);

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Multiple records inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
