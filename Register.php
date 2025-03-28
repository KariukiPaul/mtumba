<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            background-color:rgb(81, 128, 208);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .registration-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            width: 400px;
        }

        .registration-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #000080;
            font-size: 24px;
            text-shadow: 2px 2px 5px rgba(255,255,255,0.5);
        }

        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-group input[type="submit"] {
            background-color: #0d6efd;
            color: white;
            cursor: pointer;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0b5ed7;
            transform: translateY(-1px);
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body class="login-register-background">


    <div class="registration-form">
        <h2>Register</h2>
        <form action="register_process.php" method="POST">
            <div class="form-group">
                <label for="name">UserName</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Register">
            </div>
        </form>
        <div class="login-link">
            Already have an account? <a href="index.php">Login here</a>
        </div>
    </div>
</body>
</html>
