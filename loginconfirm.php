<?php
session_start();

 $Email=$_POST['txtemail'];
 $Pass=$_POST['txtpass'];

 include "confid.php";

$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
  die("unable to connect to database");
}
$sql="SELECT * FROM `user` WHERE (email='$Email' AND pass='$Pass')";
$result=$conn->query($sql);
$rowcount=mysqli_num_rows($result);
if($result->num_rows >0){
    while($row=$result->fetch_assoc()){

    $_SESSION['phone']=$row['phone'];
    $_SESSION['lname']=$row['lname'];
    $_SESSION['uid']=$row['id'];
    $_SESSION['kid']=$row['kid']; // Assuming 'kid' is a column in the user table

    
    echo"
      <script>
        document.location='dashboard.php';
              </script>
    ";
}
}else{
      
 $_SESSION['display']="Wrong credentials";
    echo"
<script>
            document.location='index.php';
</script>
    ";

}
    $conn->close();
?>
