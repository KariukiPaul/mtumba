<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['uid']) || !isset($_SESSION['kid'])) {
    // Redirect to login page if session variables are not set
    header("Location: login.php");
    exit("Unauthorized access. Please log in.");
}

// Retrieve session variables
$uid = $_SESSION['uid'];
$kid = $_SESSION['kid'];

// Generating receipt number
$rctno = rand(1, 100);

// Include database connection parameters
include 'confid.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the data to be inserted
$item = isset($_POST['itemName']) ? $_POST['itemName'] : array();
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : array();

// Arrays to store items not found and found
$notFoundItems = array();
$foundItems = array();

// SQL statement to insert sales data
$sql = "INSERT INTO `sales` (uid, kid, item, quantity, bp, sp, total, profit, rctno, date) VALUES ";

// Build the values part of the SQL statement
$values = array();
foreach ($item as $key => $value) {
    // Check if the item exists in stock
    $itemValue = $conn->real_escape_string($value);
    $stockQuery = "SELECT * FROM `stock` WHERE uid='$uid' AND kid='$kid' AND item='$itemValue' AND status='active' LIMIT 1";
    $stockResult = $conn->query($stockQuery);

    if ($stockResult->num_rows > 0) {
        // Item exists in stock, retrieve bp and sp
        $stockData = $stockResult->fetch_assoc();
        $bp = $stockData['bp'];
        $sp = $stockData['sp'];

        // Item found, add to foundItems array
        $foundItems[] = $value;

        // Sanitize input
        $itemValue = $conn->real_escape_string($value);
        $quantityValue = $conn->real_escape_string($quantity[$key]);
        $values[] = "('$uid', '$kid', '$itemValue', '$quantityValue', '$bp', '$sp', '1', '1', '$rctno', NOW())";
    } else {
        // Item not found, add to notFoundItems array
        $notFoundItems[] = $value;
    }
}

// Execute the SQL statement if there are found items
if (!empty($values)) {
    $sql .= implode(", ", $values);

    if ($conn->query($sql) === TRUE) {
        $successMessage = "Records inserted successfully for items: " . implode(", ", $foundItems);
        if (!empty($notFoundItems)) {
            $_SESSION['notAddedItems'] = "Items not found in database: " . implode(", ", $notFoundItems);
        }
        $_SESSION['successMessage'] = $successMessage;
        // Redirect after successful insertion
        header("Location: sales.php");
        exit;
    } else {
        // Log error instead of echoing
        error_log("Error: " . $sql . "<br>" . $conn->error);
        echo "Error occurred. Please try again later.";
    }
} else {
    // Notify user about items not found
    if (!empty($notFoundItems)) {
        $_SESSION['notAddedItems'] = "Items not found in database: " . implode(", ", $notFoundItems);
    }
    // Redirect to sales.php since there are no items to insert
    header("Location: sales.php");
    exit;
}

// Close connection
$conn->close();
?>
