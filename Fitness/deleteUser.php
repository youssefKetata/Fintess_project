<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$database = "fitness";
$conn = new mysqli($servername, $username, $password);
session_start();
if ($conn) {
    if (mysqli_select_db($conn, $database)) {
        $userId = $_SESSION['userId'];
        $sql = "DELETE from users where userID=$userId";
        if(mysqli_query($conn, $sql)){
            echo "user deleted";
        }
        else{
            echo "fail to delete user";
        }
    }
}
