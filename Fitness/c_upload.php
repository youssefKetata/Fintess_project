<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$database = "fitness";
$conn = new mysqli($servername, $username, $password);
if ($conn) {
    if (mysqli_select_db($conn, $database)) {
        if (
            isset($_POST['cName']) and !empty($_POST['cName']) and
            isset($_POST['rating']) and !empty($_POST['rating']) and
            isset($_POST['description']) and !empty($_POST['description']) and
            isset($_POST['imagesrc']) and !empty($_POST['imagesrc']) and
            isset($_POST['fb']) and !empty($_POST['fb']) and
            isset($_POST['ig']) and !empty($_POST['ig']) and
            isset($_POST['telegram']) and !empty($_POST['telegram'])
        ) {
            $cName = $_POST['cName'];
            $rating = $_POST['rating'];
            $description = $_POST['description'];
            $imagesrc = $_POST['imagesrc'];
            $fb = $_POST['fb'];
            $ig = $_POST['ig'];
            $telegram = $_POST['telegram'];
            $sql = "INSERT INTO coachs (c_name, c_photo, c_dsc, c_rating, c_ig,  c_fb, c_telegram) VALUES ('" . $cName . "', '" . $imagesrc . "', '" . $description . "', '" . $rating . "', '" . $ig . "','" . $fb . "','" . $telegram . "')";
            if (mysqli_query($conn, $sql)) {
                $location = 'addC.php';
                header("Location: $location?message=added");
            } /* else {
                $location = 'addC.php';
                header("Location: $location?message2=failed");
            } */
        } else {
            $location = 'addC.php';
            header("Location: $location?message3=failed");
        }
    }
}
