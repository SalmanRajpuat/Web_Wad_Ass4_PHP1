<?php
// Include the database connection file
include_once 'Db_Connect.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve user data from the database based on the provided email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Password is correct, set session variables and redirect to dashboard
            session_start();
            $_SESSION["email"] = $email; // Store user's email in session for future use
            header('Location: index.html?login=success');
            exit(); // Ensure that no further code execution occurs after the redirect
        } else {
            // Password is incorrect
            echo "Invalid email or password";
        }
    } else {
        // User not found
        echo "Invalid email or password";
    }
}

