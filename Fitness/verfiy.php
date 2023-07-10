<?php
$servername = "localhost";
$username = "root";
$password = "admin";

$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn, 'fitness')
$sql = "SELECT * FROM users WHERE email= ?";
mysqli_query($conn, $query); 
?>