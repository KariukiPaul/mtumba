<?php

    $a=$_POST["txtid"];
    if (empty($a)) {
        echo "Error: User ID not set.";
        exit;
    }

    $item=$_POST['txtitem'];
    $quantity=$_POST['txtquantity'];
    

    include "confid.php";


    $conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Unable to connect to database");
} 

$sql = "UPDATE `sales` SET item='$item', quantity='$quantity' WHERE id='$a'";

if ($conn->query($sql) === TRUE) {
    echo "<html><body onload=myFunction()>
            <script>
            function myFunction() {
            alert('Changes save successfuly');
    
            window.location.assign('sales.php');
        }
        </script></body></html>
    ";
} else {
    echo "Error Reserving. Contact the database admin" ;
}

$conn->close();

?>
