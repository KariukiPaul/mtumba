<?php 
include "confid.php"; 

	$email=$_POST['txtemail'];
	
$conn=new mysqli($servername,$username,$password,$dbname);

$sql="SELECT * FROM `user` WHERE email='$email'";
$result=$conn->query($sql);
$rowcount=mysqli_num_rows($result);
if($result->num_rows >0){
    while($row=$result->fetch_assoc()){
        echo"
            <script>
                alert('This email has already been registered. Sign-in using a different Email');
                window.location.assign('Register.php');
            </script>
        ";
        die('');
    }
}else{

}
    $conn->close();
?>



<?php


	$fname=$_POST['txtfname'];
    $lname=$_POST['txtlname'];
    $gender=$_POST['txtgender'];
	$phone=$_POST['txtphone'];
	$email=$_POST['txtemail'];
	$pass=$_POST['txtpass'];



	$conn=new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Unable to connect to database");
} 

$sql = "INSERT INTO user (id, fname, lname,  gender, phone, email, pass)VALUES (NULL, '$fname', '$lname',  '$gender', '$phone', '$email', '$pass')";

if ($conn->query($sql) === TRUE)
 {
    echo "
    <script>
    alert('Registration succesful');
    window.location.assign('index.php');
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
