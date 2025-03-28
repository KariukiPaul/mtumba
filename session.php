<?php


	session_start();

	if ((!isset($_SESSION['lname'])) && (!isset($_SESSION['phone']))) {
		header("Location: logout.php");
	}

	$phone = $_SESSION['phone'];
	 $lname = $_SESSION['lname'];
?>


<! DOCTYPE html>
<html>
<head>
  <title>Idle Redirect</title>
</head>
<body>

  <!-- Your page content goes here -->

  <script>
    // Set the timeout duration (in milliseconds) for the idle period
    const idleTimeout = 300000; // 5 minutes

    let idleTimer;

    // Function to redirect the user to "index.php"
    function redirectToIndex() {
      window.location.href = 'logout.php';
    }

    // Function to reset the idle timer
    function resetIdleTimer() {
      clearTimeout(idleTimer);
      idleTimer = setTimeout(redirectToIndex, idleTimeout); // Redirect to "index.php" after the specified timeout
    }

    // Add event listeners to track user activity
    document.addEventListener('mousemove', resetIdleTimer);
    document.addEventListener('keydown', resetIdleTimer);
    document.addEventListener('scroll', resetIdleTimer);

    // Start the initial timer
    resetIdleTimer();
  </script>
</body>
</html>
