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
<h1 style="text-align:center">Add Exercice</h1>
    <form action="upload.php" method="POST">
        <div class="input-field">
           <table border="0px">
            <tr>
                <td>name of the exercice</td>
                <td><input type="text" id="exName" name="exName" class="input"></td>
            </tr>
            <tr>
                <td>Targeted Muscle</td>
                <td><input type="text" id="targetMuscle" name="targetMuscle" class="input"></td>
            </tr>
            <tr>
                <td> label</td>
                <td><input type="text" id="label" name="label" class="input"></td>
            </tr>
            <tr>
                <td>description</td>
                <td><textarea id="description" name="description" class="input"></textarea></td>
            </tr>
            <tr>
                <td>image</td>
                <td><input type="text" name="imagesrc" id="imagesrc" class="imagesrc" placeholder="image source" name="imagesrc" class="input"></td>
            </tr>
            <tr>
                <td>video</td>
                <td><input type="text" id="video" name="video" class="input" placeholder="video url"></td>
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
        echo  "<p style='color:green; font-size:18px'>" . " &nbsp;&nbsp; Exercice added succesfully" . "</p>";
    }
    if (!empty($_GET['message2'])) {
        echo "<p style='color:red; font-size:18px'>" . "&nbsp;&nbsp; failed to add exercice" . "</p>";
    }
    if (!empty($_GET['message3'])) {
        echo "<p style='color:red; font-size:18px'>" . "&nbsp;&nbsp; Please make sure you fill all the fields" . "</p>";
    }


    ?>

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