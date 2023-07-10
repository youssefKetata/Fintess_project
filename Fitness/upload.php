<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$database = "fitness";
$conn = new mysqli($servername, $username, $password);
if ($conn) {
    if (mysqli_select_db($conn, $database)) {
        if (
            isset($_POST['exName']) and !empty($_POST['exName']) and
            isset($_POST['targetMuscle']) and !empty($_POST['targetMuscle']) and
            isset($_POST['label']) and !empty($_POST['label']) and
            isset($_POST['description']) and !empty($_POST['description']) and
            isset($_POST['imagesrc']) and !empty($_POST['imagesrc']) and
            isset($_POST['video']) and !empty($_POST['video'])
        ) {
            $exName = $_POST['exName'];
            $targetMuscle = $_POST['targetMuscle'];
            $label = $_POST['label'];
            $description = $_POST['description'];
            $image = $_POST['imagesrc'];
            $video = $_POST['video'];
            $sql = "INSERT INTO exercices (exName, targetMuscle, label, dsc, img,  video) VALUES ('" . $exName . "', '" . $targetMuscle . "', '" . $label . "', '" . $description . "', '" . $image . "','" . $video . "')";
            if (mysqli_query($conn, $sql)) {
                $location = 'addEx.php';
                header("Location: $location?message=added");
            } else {
                $location = 'addEx.php';
                header("Location: $location?message2=failed");
            }
        } else {
            $location = 'addEx.php';
            header("Location: $location?message3=failed");
        }
    }
}
