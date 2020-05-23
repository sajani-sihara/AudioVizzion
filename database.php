<?php
 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "w1714883_DBCoursework";
 
 // Creating the databse connection
 $conn = mysqli_connect($servername, $username, $password, $database);
 
 // Checking the database connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
 
 ?> 