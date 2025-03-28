<?php

session_start();
$kid = $_POST["txtid"];
$loc= $_POST["txtloc"];
$_SESSION['kid'] = $kid;

header("Location: $loc");
exit;
?>