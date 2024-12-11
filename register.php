<?php
// Database connection
$conn = new mysqli("localhost", "username", "password", "database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture and sanitize form inputs
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Insert user into the database
$sql = "INSERT INTO Users (full_name, email, password) VALUES ('$name', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:greenyellow;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        .text-center {
            text-align: center;
            margin-top: 10px;
        }
        .text-center a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>REGISTER</h2>
        <form id="Registration Form">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" required>
                <div class="error" id="errorMessage"></div>
            </div>
            <button type="button" class="btn" onclick="validateForm()">Submit</button>
            <div class="text-center">
                <p>Already have an account? <a href="login.html">Login</a></p>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;
            const errorMessage = document.getElementById("errorMessage");

            if (password !== confirmPassword) {
                errorMessage.textContent = "Passwords do not match!";
            } else {
                errorMessage.textContent = "";
                alert("Registration successful!");
                // You can add additional logic to send data to the server here
            }
        }
    </script>
</body>
</html>
