<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="addEx.css">
    
</head>

<body>

    <?php
    session_start();
    $adminmail="admin@admin.com";
    if($_SESSION['mail']==$adminmail){
        $servername = "localhost";
        $username = "root";
        $password = "admin";
        $database = "fitness";
        $conn = new mysqli($servername, $username, $password);
        if ($conn){
            if(mysqli_select_db($conn, $database)){
                ?>

        <header><?php include 'header.php'; ?></header>

        <br><br><br>
        <a href="fishier.php" class="previous">&laquo; Previous</a>
        <h1 style="text-align:center">Update Coach infromation</h1>

        <?php 
        $idC = $_SESSION['idC'];
        $sql = "SELECT * from coachs WHERE idC='" . $idC . "' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            while ($lign = mysqli_fetch_row($result)) {
                $idC = $lign['0']; 
                $c_name = $lign['1'];
                $c_photo = $lign['2'];
                $c_dsc = $lign['3'];
                $c_rating = $lign['4'];
                $c_ig = $lign['5'];
                $c_fb = $lign['6'];
                $c_telegram = $lign['7'];
            }
            ?>
        <form action="updateC.php" method="POST">
                <div class="input-field">
                   <table border="0px">
                    <tr>
                        <td>name of the coach</td>
                        <td><input type="text" id="cName" name="c_name" class="input" value="<?php echo $c_name ?>"></td>
                    </tr>
                    <tr>
                        <td> rating</td>
                        <td><input type="text" id="rating" name="c_rating" class="input" value="<?php echo $c_rating ?>"></td>
                    </tr>
                    <tr>
                        <td>description</td>
                        <td><textarea id="description" name="c_dsc" class="input"><?php echo $c_dsc ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td><input type="text" name="c_photo" id="imagesrc" class="imagesrc" placeholder="image source" name="imagesrc" class="input" value="<?php echo $c_photo ?>"></td>
                    </tr>
                    <tr>
                        <td>facebook link</td>
                        <td><input type="text" id="video" name="c_fb" class="input" placeholder="facebook url" value="<?php echo $c_fb ?>"></td>
                    </tr>
                    <tr>
                        <td>insgram link</td>
                        <td><input type="text" id="video" name="c_ig" class="input" placeholder="insgram url" value="<?php echo $c_ig ?>"></td>
                    </tr>
                    <tr>
                        <td>telegram link</td>
                        <td><input type="text" id="video" name="c_telegram" class="input" placeholder="telegram url" value="<?php echo $c_telegram ?>"></td>
                    </tr>
                    <tr>
                        <td></td><td>
                            <input type="submit" name="submit" value="Update">
                        </td>
                    </tr>
                </table> 
                </div>
                
            </form>
            <?php
            if(isset($message)) { echo $message; }
            if (!empty($_GET['message'])) {
                echo  "<p style='color:green; font-size:18px'>" . " &nbsp;&nbsp; Coach information updated succesfully" . "</p>";
            }
            if (!empty($_GET['message2'])) {
                echo "<p style='color:red; font-size:18px'>" . "&nbsp;&nbsp; failed to update coach information" . "</p>";
            }
            if (!empty($_GET['message3'])) {
                echo "<p style='color:red; font-size:18px'>" . "&nbsp;&nbsp; Please make sure you fill all the fields" . "</p>";
            }?>
            <footer><?php include 'footer.php'; ?></footer>        
<?php

        }
        
            }
        }  
}
    else{
        $location="index.php";
        header("Location: $location");
    }
    ?>
    
</body>

</html>