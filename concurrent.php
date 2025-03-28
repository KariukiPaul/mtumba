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


<body>

<div class="header">
  <div class="col1">
   SOKO MANAGEMENT SYSTEM
  </div>
  <div class="col2">
    
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

<?php 
session_start();

if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
}
// End of session

include "confid.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT r.item1, r.item2, COUNT(*) AS total_times_bought
        FROM (
            SELECT s1.item AS item1, s2.item AS item2, s1.rctno
            FROM `sales` s1
            INNER JOIN `sales` s2 ON s1.rctno = s2.rctno AND s1.item < s2.item
            WHERE s1.uid='$uid'
        ) AS r
        GROUP BY r.item1, r.item2
        ORDER BY total_times_bought DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h5>Concurrent Sales</h5>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-dark table-striped'>";
    echo "<thead><tr><th>#</th><th>Item 1</th><th>Item 2</th><th>Number of Times Bought</th></tr></thead>";
    echo "<tbody>";
    $counter = 0;
    while ($row = $result->fetch_assoc()) {
        $counter++;
        echo "<tr>";
        echo "<td>" . $counter . "</td>";
        echo "<td>" . $row["item1"] . "</td>";
        echo "<td>" . $row["item2"] . "</td>";
        echo "<td>" . $row["total_times_bought"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "<b>No sales data available</b>";
}

$conn->close();
?>




<!------------content goes here------------>
  </div>
</div>



</body>
</html>

