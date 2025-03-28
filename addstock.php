<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['uid']) || !isset($_SESSION['kid'])) {
    header("Location: login.php");
    exit("Unauthorized access. Please log in.");
}

// Retrieve session variables
$uid = $_SESSION['uid'];
$kid = $_SESSION['kid'];

// Include database connection parameters
include 'confid.php';

// Create connections
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$item = $_POST['txtitem'];
$description = $_POST['txtdescription'];
$bp = $_POST['txtbp'];
$quantity = $_POST['txtquantity'];
$total = $bp * $quantity;
$sp = $_POST['txtsp'];
$date = $_POST['txtdate'];

// Check if the item already exists in the stock
$sql = "SELECT * FROM `stock` WHERE uid='$uid' AND kid='$kid' AND item='$item' AND status='active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Item exists, update the record
    $row = $result->fetch_assoc();
    $existingQuantity = $row['quantity'];
    $existingTotal = $row['total'];
    $existingBp = $row['bp'];
    $existingSp = $row['sp'];

    // Calculate new total, quantity, bp, and sp
    $newQuantity = $existingQuantity + $quantity;
    $newBp = $bp;
    $newTotal = $newBp * $newQuantity;
    $newSp = $sp; // Assuming you don't update the selling price for existing items

    // Update the existing record
    $updateSql = "UPDATE `stock` SET quantity='$newQuantity', total='$newTotal', bp='$newBp', sp='$newSp', date='$date' WHERE uid='$uid' AND kid='$kid' AND item='$item' AND status='active'";

    if ($conn->query($updateSql) === TRUE) {
        echo "Record updated successfully";
        header("Location: stockform.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Item doesn't exist, insert a new record
    $insertSql = "INSERT INTO `stock` (uid, kid, item, description, bp, quantity, total, sp, date) VALUES ('$uid', '$kid', '$item', '$description', '$bp', '$quantity', '$total', '$sp', '$date')";

    if ($conn->query($insertSql) === TRUE) {
        echo "New record created successfully";
        header("Location: stockform.php");
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
