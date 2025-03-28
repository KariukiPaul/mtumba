<?php

session_start();
$kid = $_POST["txtkid"];
$uid = $_POST["txtuid"];
$loc= $_POST["txtloc"];
$_SESSION['kid'] = $kid;
$_SESSION['uid'] = $uid;

header("Location: $loc");
exit;
?>