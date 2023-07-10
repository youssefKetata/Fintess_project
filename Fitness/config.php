<?php

$servername = "localhost";
$username = "root";
$password = "admin";
$database = "fitness";

$conn = new mysqli($servername, $username, $password);
if($conn){
    mysqli_select_db($conn, $database);
}
else{
    die('could not connet to mysql ');
}

?>