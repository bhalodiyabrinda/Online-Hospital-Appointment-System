<?php

$conn = mysqli_connect("localhost", "root", "", "hospital") ;
// $servername = "localhost";
// $username = "root";
// $password = "";

// Create connection
// $conn = new mysqli($servername, $username, $password);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// //Create database
// $sql = "CREATE DATABASE Resort";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $conn->error;
// }

// // $conn->close();

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "Resort";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }

// sql to create register table
// $sql = "CREATE TABLE register (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     username VARCHAR(255) NOT NULL UNIQUE,
//     email VARCHAR(255) NOT NULL UNIQUE,
//     phone VARCHAR(20) NOT NULL UNIQUE,
//     password VARCHAR(255) NOT NULL,
//     profile_pic VARCHAR(255), -- Assuming you'll store the path to the profile picture
//     verification_token VARCHAR(255) NOT NULL,
//     verified TINYINT(1) DEFAULT 0,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// )";


// $sql = "DROP TABLE register";
// if (mysqli_query($conn, $sql)) {
//     echo "Table deleted successfully<br>";
// } else {
//     echo "Error deleting table: " . mysqli_error($conn)."<br>";
// }

// if (mysqli_query($conn, $sql)) {
//   echo "Table Register created successfully";
// } else {
// echo "Error creating table: " . mysqli_error($conn);
// }

// $sql ="CREATE TABLE token (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     token VARCHAR(255) NOT NULL,
//     sent_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// )";
// if (mysqli_query($conn, $sql)) {
//   echo "Table Register created successfully";
// } else {
// echo "Error creating table: " . mysqli_error($conn);
// }


?>