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

<body>

<div class="header">
  <div class="col1">
   SOKO MANAGEMENT SYSTEM
  </div>
  <div class="col2">
    Kibanda Management
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

  <! DOCTYPE html>
<html>
<head>
  <title></title>

  <style type="text/css">
    #btnback {
      float: right;
    }
    .btn {
      margin: 5px;
    }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

 <script type="text/javascript">
  function confirmdelete(){
      var result = confirm('Are you sure you want to delete this Kibanda?');
      if(result==false){
        return false;
      }
      
    }
</script>

<body>
  <h5 align="left"><b>vibanda zangu</b></h5>
  <table class="table table-secondary table-striped  table-responsive-sm" style="color:purple; text-align:center;">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th colspan="3" style="text-align: center;">Controls</th>
      </tr>
    </thead>

<?php 
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
}
// End of my session
include "confid.php";

$conn = new mysqli($servername, $username, $password, $dbname);
$counter = 0;
$sql = "SELECT * FROM `kibanda` where uid='$uid' && status='active'";
$result = $conn->query($sql);
$rowcount = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $counter++;
        $id=$row['id']; 
        $name = $row['name'];
   $_SESSION['name']=$name;

        echo "
          <tr>
          <td>$counter</td>
           <td>$name</td>
            <td width='10px'>
            <form method=post action=gensession.php>
              <button class='btn btn-primary'>Dashboard<i class='fa fa-home' style='font-size:24px'></i></button>
              <input type=text name=txtid value='$id' hidden>
              <input type=text name=txtloc value='stockform.php' hidden>
               </form>
            </td>  
            
             <td width='15px'>
               <form method=post action=editkibanda.php>
               <button type=submit class='btn btn-success'>Edit<i class='fa fa-edit'></i></button>
               <input type=text name=txtid value='$id' hidden>
               </form>
               </td>

               <td width='15px'>
               <form method=post action=gendelete.php  onsubmit='return confirmdelete()'>
               <button type=submit class='btn btn-danger'>Del <i class='fa fa-trash'></i></button>
               <input type=text name=txtid value='$id' hidden>
               <input type=text name=txtloc value='kibanda.php' hidden>
               <input type=text name=txttable value='kibanda' hidden>
               </form>
               </td>
            
          </tr> 
        ";
    }
} else {       
    echo "<b> No kibanda found </b>";
}
$conn->close();
?>

</table>
<button type='submit' onclick="window.location='kibandaform.php'" class="btn btn-success">Register kibanda</button>
</body>
</html>

<!------------content goes here------------>
  </div>
</div>



</body>
</html>






