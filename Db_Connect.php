<?php

$servername = "localhost"; // Usually localhost
$username = "root";        // Default username for localhost
$password = "";  
$database = "user_authentication_wad"; // Change this to your database name          // Default password for localhost (empty for XAMPP, 'root' for MAMP)

// Create connection without specifying the database name
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create database if it does not exist
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS user_authentication_wad";
if ($conn->query($sqlCreateDB) === TRUE) {
    echo "Database created successfully <br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select the database
$conn->select_db("user_authentication_wad");

// SQL to create table if it does not exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sqlCreateTable) === TRUE) {
    echo "Table 'users' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Use $conn to perform your database queries

?>


