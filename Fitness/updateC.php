
<?php

$cName = $_POST['c_name'];
$rating = $_POST['c_rating'];
$description = $_POST['c_dsc'];
$imagesrc = $_POST['c_photo'];
$fb = $_POST['c_fb'];
$ig = $_POST['c_ig'];
$telegram = $_POST['c_telegram'];


include_once 'config.php';
session_start();
$idC = $_SESSION['idC'];
$sql = "UPDATE coachs set c_name='" . $_POST['c_name'] . "', c_photo='" . $_POST['c_photo'] . "', c_dsc='" . $_POST['c_dsc'] . "', c_rating='" . $_POST['c_rating'] . "' ,c_ig='" . $_POST['c_ig'] . "' ,c_fb='" . $_POST['c_fb'] . "' ,c_telegram='" . $_POST['c_telegram'] . "' WHERE idC='" . $idC . "'";
if(mysqli_query($conn, $sql)){
    echo "updated";
}
else{
    echo "fail";
}
?>