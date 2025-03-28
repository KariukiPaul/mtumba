<!DOCTYPE html>
<html>
<head>
    <title>Add Sales</title>
</head>
<body>
<?php
session_start();
include "confid.php";

// Ensure $uid and $kid are set
$uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : null;
$kid = isset($_SESSION['kid']) ? $_SESSION['kid'] : null;

if (!$uid || !$kid) {
    die("User ID or Kid ID is not set. Please log in.");
}

// Fetch available stocks
$sql = "SELECT * FROM stock WHERE uid='$uid' AND kid='$kid' AND status='active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Available Stocks</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Item</th><th>Quantity</th><th>Buying Price</th><th>Selling Price</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['item']) . "</td>";
        echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bp']) . "</td>";
        echo "<td>" . htmlspecialchars($row['sp']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<b>No stock available</b>";
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = isset($_POST['itemName']) ? $_POST['itemName'] : '';
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;

    // Fetch stock details
    $stockQuery = "SELECT * FROM stock WHERE uid='$uid' AND kid='$kid' AND item='$item' AND status='active'";
    $stockResult = $conn->query($stockQuery);

    if ($stockResult->num_rows > 0) {
        $stock = $stockResult->fetch_assoc();
        $sp = $stock['sp'];
        $bp = $stock['bp'];

        $total = $sp * $quantity;
        $profit = ($sp - $bp) * $quantity;

        // Insert into sales table
        $sql = "INSERT INTO sales (id, uid, kid, item, quantity, sp, total, profit, rctno, date) 
                VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE())";
        $stmt = $conn->prepare($sql);
        $rctno = rand(1000, 9999); // Generate a random receipt number
        $stmt->bind_param("iisiddds", $uid, $kid, $item, $quantity, $sp, $total, $profit, $rctno);

        if ($stmt->execute()) {
            header("Location:sales.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Item not found in stock.";
    }
}

$conn->close();
?>
</body>
</html>