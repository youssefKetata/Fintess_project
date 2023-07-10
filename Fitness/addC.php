<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="addEx.css">
    
</head>

<body>
    <?php session_start(); 
    $adminmail="admin@admin.com";
    if($_SESSION['mail']==$adminmail){
        ?>

        <header><?php include 'header.php'; ?></header>

        <br><br><br>
        <a href="fishier.php" class="previous">&laquo; Previous</a>
        <h1 style="text-align:center">Add Coach</h1>
            <form action="c_upload.php" method="POST">
                <div class="input-field">
                   <table border="0px">
                    <tr>
                        <td>name of the coach</td>
                        <td><input type="text" id="cName" name="cName" class="input"></td>
                    </tr>
                    <tr>
                        <td> rating</td>
                        <td><input type="text" id="rating" name="rating" class="input"></td>
                    </tr>
                    <tr>
                        <td>description</td>
                        <td><textarea id="description" name="description" class="input"></textarea></td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td><input type="text" name="imagesrc" id="imagesrc" class="imagesrc" placeholder="image source" name="imagesrc" class="input"></td>
                    </tr>
                    <tr>
                        <td>facebook link</td>
                        <td><input type="text" id="video" name="fb" class="input" placeholder="facebook url"></td>
                    </tr>
                    <tr>
                        <td>insgram link</td>
                        <td><input type="text" id="video" name="ig" class="input" placeholder="insgram url"></td>
                    </tr>
                    <tr>
                        <td>telegram link</td>
                        <td><input type="text" id="video" name="telegram" class="input" placeholder="telegram url"></td>
                    </tr>
                    <tr>
                        <td></td><td>
                            <input type="submit" name="submit" value="Add">
                        </td>
                    </tr>
        
                </table> 
                </div>
                
            </form>
            <?php
            if (!empty($_GET['message'])) {
                echo  "<p style='color:green; font-size:18px'>" . " &nbsp;&nbsp; Coach added succesfully" . "</p>";
            }
            if (!empty($_GET['message2'])) {
                echo "<p style='color:red; font-size:18px'>" . "&nbsp;&nbsp; failed to add coach" . "</p>";
            }
            if (!empty($_GET['message3'])) {
                echo "<p style='color:red; font-size:18px'>" . "&nbsp;&nbsp; Please make sure you fill all the fields" . "</p>";
            }?>
            <footer><?php include 'footer.php'; ?></footer>        
<?php
}
    else{
        $location="index.php";
        header("Location: $location");
    }
    ?>
    
</body>

</html>