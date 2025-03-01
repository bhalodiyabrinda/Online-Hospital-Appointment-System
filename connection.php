<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "Hospital";
// // Create connection
$con = mysqli_connect("localhost","root","","hospital");
// if (!$conn) {
//   // die("Connection failed: " . mysqli_connect_error());
// }
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// // Create database
// $sql = "CREATE DATABASE Hospital";
// if ($con->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $con->error;
// }


// $q = "create table registration(
//   fullname varchar(255) not null,
//   username varchar(255) not null,
//   email varchar(255) primary key,
//   mobile int(10) not null,
//   password Varchar(30) NOT NULL,
//   picture longblob NOT NULL,
// )";
// if (mysqli_query($conn, $q)) {
//     echo "Database created";
// } else {
//     echo "error creating database";
//   }

// mysqli_close($conn);

// // sql to create table
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


// if (mysqli_query($con, $sql)) {
//   echo "Table Register created successfully";
// } else {
// echo "Error creating table: " . mysqli_error($conn);
// }

// $sql = "CREATE TABLE token (
//     id int(11) NOT NULL,
//     email varchar(50) NOT NULL,
//     sent_time timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
//     token varchar(256) NOT NULL,
//     otp int(6) NOT NULL
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 " ;
  
// if (mysqli_query($con, $sql)) {
//   echo "Table Register created successfully";
// } else {
// echo "Error creating table: " . mysqli_error($con);
// }


// $sql="CREATE TABLE crud (
//   id int(11) NOT NULL,
//   name varchar(100) NOT NULL,
//   email varchar(100) NOT NULL,
//   mobile varchar(20) NOT NULL,
//   password varchar(255) NOT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

// if (mysqli_query($con, $sql)) {
//       echo "Table Register created successfully";
//     } else {
//     echo "Error creating table: " . mysqli_error($con);
//     }

// $sql = "CREATE TABLE doctors (
//     id int(11) NOT NULL,
//     photo varchar(255) NOT NULL,
//     name varchar(255) NOT NULL,
//     specialist varchar(255) NOT NULL,
//     status varchar(8) NOT NULL DEFAULT 'Inactive'
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

//   if (mysqli_query($con, $sql)) {
//       echo "Table Register created successfully";
//     } else {
//     echo "Error creating table: " . mysqli_error($con);
//     }

// $sql = "CREATE TABLE dbname (
//     id int(100) NOT NULL,
//     Departmentname varchar(255) NOT NULL,
//     Description varchar(100) NOT NULL
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

  
//   if (mysqli_query($con, $sql)) {
//       echo "Table Register created successfully";
//     } else {
//     echo "Error creating table: " . mysqli_error($con);
//     }

// $sql ="CREATE TABLE adminuser(
//     id int(100) NOT NULL,
//     name varchar(255) NOT NULL,
//     email varchar(255) PRIMARY KEY,
//     password varchar(255) NOT NULL,
//     profie_pic varchar(255) NOT NULL
// )";
//   if(mysqli_query($con, $sql)) {
//       echo "Table Register created successfully";
//     } else {
//     echo "Error creating table: " . mysqli_error($con);
//     }
// $sql = "CREATE TABLE appointments (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(50) NOT NULL,
//     email VARCHAR(100) NOT NULL,
//     phone VARCHAR(20) NOT NULL,
//     date DATE NOT NULL,
//     time TIME NOT NULL,
//     reason TEXT NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// )";
//   if(mysqli_query($con, $sql)) {
//       echo "Table Register created successfully";
//     } else {
//     echo "Error creating table: " . mysqli_error($con);
//     }

?>