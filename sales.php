<! DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="script.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
include "session.php";
if (isset($_SESSION['lname'])) {
    $lname = $_SESSION['lname'];
} 
?>

<?php
// Check if there are remarks about items not added
if (isset($_SESSION['notAddedItems'])) {
    $notAddedItems = $_SESSION['notAddedItems'];
    // Unset the session variable to clear it
    unset($_SESSION['notAddedItems']);
} else {
    $notAddedItems = '';
}

// Check if there are any success messages
if (isset($_SESSION['successMessage'])) {
    $successMessage = $_SESSION['successMessage'];
    // Unset the session variable to clear it
    unset($_SESSION['successMessage']);
} else {
    $successMessage = '';
}

if (!empty($notAddedItems)) {
        echo "<p>$notAddedItems</p>";
    }
    if (!empty($successMessage)) {
        echo "<p>$successMessage</p>";
    }
?>

<body>

<div class="header">
  <div class="col1">
   SOKO MANAGEMENT SYSTEM
  </div>
  <div class="col2">
    Sales Management
    <div class="dropdown">
      <div class="user">
        <i class="fa fa-user-o"></i>
      </div>
      <div class="content">
        <div style="padding:10px;border-bottom:solid 1px #ccc;color: purple">
      logged in as: <?php echo "$lname"; ?>
        </div>
        <div class="item"> <i class='fa fa-cog'></i> Edit Profile 
        </div>

        <div class="item" onclick="window.location='logout.php'"> <i class='fa fa-sign-out'></i> Log-out </div>
      </div>  
    </div>
  </div>
</div>

<div class="rightpane bg-success" id='leftpane'>
  <div class="menu">
    <span id='bar1' class="text-success"  onclick="slideOut()"><i class="fa fa-bars"></i></span>
    <span id='bar2' class="text-primary"  onclick="slideIn()"><i class="fa fa-bars"></i></span>
  </div>
    <div class="ritem" onclick="window.location='dashboard.php'"><i class='fa fa-dashboard'></i> Dashboard</div>
  <div class="ritem" onclick="window.location='kibanda.php'"><i class='fa fa-home'></i> Vibanda Zangu</div>
  <div class="ritem" onclick="window.location='kibandaform.php'"><i class='fa fa-plus'></i> Ongeza Kibanda</div>
  <div class="ritem" onclick="window.location='sales.php'"><i class='fa fa-home'></i> Sales </div>
  <div class="ritem" onclick="window.location='logout.php'"><i class='fa fa-sign-out'></i> Logout</div>
</div>

<style>
   .box{
       cursor:pointer;
       } 
</style>

<div class="main" id="main">
  <div id='display'></div>
  <div class="inner" id="inner">
<!------------content goes here------------>

<button type=submit class="btn btn-success" onclick="window.location='salesform.php'" style="float:right;">Record Sales</button>

  <h5 align ="left"><b>My sales</b></h5>
  <table class="table table-secondary table-striped  table-responsive-sm" style="color:purple; text-align:center;">
    <thead>
      <tr>
        <th>No</th>
        <th>item</th>
        <th>Quantity</th>
        <th>Selling price</th>
        <th>total</th>
        <th>Profit/ Loss</th>
        <th>Receipt No</th>
        <th>Date</th>
        <th colspan="2" style="text-align: center;">Controls</th>
      </tr>
    </thead>

<?php 
if (isset($_SESSION['uid']) && isset($_SESSION['kid'])) {
    $uid = $_SESSION['uid'];
    $kid = $_SESSION['kid'];
} else {
    echo "<b>Error: User ID or Kid not set.</b>";
    exit;
}

// End of my session
include "confid.php";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM  `stock` where uid='$uid' && kid='$kid' && status='active' AND quantity > 0";

$result = $conn->query($sql);
$rowcount = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id=$row['id']; 
        $item = $row['item'];
        $description = $row['description'];
        $bp = $row['bp'];
        $quantity = $row['quantity'];
        $total = $row['total'];
        $sp = $row['sp'];
        $date = $row['date'];
    }
} else {       
    echo "<b>No available stock</b>";
}

$counter = 0;

$sql = "SELECT * FROM `sales` where uid='$uid' && kid='$kid'";
$result = $conn->query($sql);
$rowcount = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $counter++;
        $id=$row['id']; 
        $item = $row['item'];
        $quantity = $row['quantity'];
        $bp= $row['bp'];        
        $sp= $row['sp'];
        $total = $sp*$quantity;
        $profit = ($sp-$bp)*$quantity;
        $rct = $row['rctno'];
        $date = $row['date'];

        echo "
          <tr>
          <td>$counter</td>
           <td>$item</td>
           <td>$quantity</td>
           <td>$sp</td>
           <td>$total</td>
           <td>$profit</td>
           <td>$rct</td>
           <td>$date</td>

             <td width='15px'>
               <form method=post action='editsales.php'>
               <button type=submit class='btn btn-success'>Edit<i class='fa fa-edit'></i></button>
               <input type=text name=txtid value='$id' hidden>
               </form>
               </td>

               <td width='15px'>
               <form method=post action=gendelete.php  onsubmit='return confirmdelete()'>
               <button type=submit class='btn btn-danger'>Del <i class='fa fa-trash'></i></button>
               <input type=text name=txtid value='$id' hidden>
               <input type=text name=txtloc value='sales.php' hidden>
               <input type=text name=txttable value='sales' hidden>
               </form>
               </td>
          </tr> 
        ";
    }
} else {       
    echo "<b>No available sales</b>";
}
$conn->close();
?>

</table>
</body>
</html>
<!------------content goes here------------>
  </div>
</div>

</body>
</html>
