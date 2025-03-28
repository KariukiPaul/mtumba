<?php
// Database connection
$host = 'localhost';
$db   = 'soko';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input
    $errors = [];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($name)) {
        $errors[] = 'Name is required';
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required';
    }

    if (empty($password) || strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters';
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM `user` WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $errors[] = 'Email already registered';
        } else {
            // Store the password as plaintext (not recommended)sword as plaintext (not recommended)
            $plaintextPassword = $password;

            // Insert new user
            $stmt = $pdo->prepare("INSERT INTO `user` (fname, email, pass, date) VALUES (?, ?, ?, CURDATE())");

            $stmt->execute([$name, $email, $plaintextPassword]);

            // Redirect to login page
            header('Location: index.php');
            exit;
        }
    }

    // If there are errors, store them in session and redirect back
    if (!empty($errors)) {
        session_start();
        $_SESSION['errors'] = $errors;
        header('Location: Register.php');
        exit;
    }
}
?>
