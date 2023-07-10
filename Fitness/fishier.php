<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="fichier.css">
</head>

<body>
    <header><?php include 'header.php'; ?></header>

    <?php
    header("Pragma:no-cache");
    session_start();
    if (isset($_POST['mail']) and !empty($_POST['mail']) and isset($_POST['pass']) and !empty($_POST['pass'])) {
        $servername = "localhost";
        $username = "root";
        $password = "admin";
        $database = "fitness";
        $adminMail = "admin@admin.com";
        $adminPass = "adminadmin";
        $conn = new mysqli($servername, $username, $password);
        if ($conn) {
            if (mysqli_select_db($conn, $database)) {

                $mail = $_POST['mail'];
                $pass = $_POST['pass'];
                $sql = "SELECT * FROM users WHERE email = '$mail' and pass = '$pass'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    /* ----------------------log in as user------------------------- */
                    while ($ligne = mysqli_fetch_row($result)) {
                        $userId = $ligne['0'];
                        $firstName = $ligne['1'];
                        $lastName = $ligne['2'];
                        $email = $ligne['3'];
                        $pass = $ligne['4'];
                        $birthday = $ligne['5'];
                        $gender = $ligne['6'];
                    }
    ?>

                    <?php
                    echo "<br>&nbsp;&nbsp; Welcome $firstName <br><br>";
                    $sql_ex = "SELECT * FROM exercices";
                    if ($result = mysqli_query($conn, $sql_ex)) {
                        if (mysqli_num_rows($result) > 0) {

                    ?>
                            <h2 class="T_allExh"><span class="T_allEx">All Exercices</span></h2>
                            <div class="allEx">

                                <table>
                                    <?php
                                    echo "\r\n";
                                    $i = 0;
                                    while ($lign = mysqli_fetch_row($result)) {
                                        $exName = $lign['1'];
                                        $targetMuscle = $lign['2'];
                                        $label = $lign['3'];
                                        $dsc = $lign['4'];
                                        $img = $lign['5'];
                                        $video = $lign['6'];

                                        if ($i == 0) {
                                    ?><tr><?php
                                                }
                                                $i++;
                                                    ?>
                                            <td>
                                                <div class="card">
                                                    <div class="card-image" style="background-image: url(<?php echo $img ?>);"></div>
                                                    <div class="card-text">
                                                        <span class="date"><?php echo $label ?></span>
                                                        <h2><?php echo $exName ?></h2>
                                                        <p><?php echo $dsc ?></p>
                                                    </div>
                                                    <div class="card-stats">
                                                        <div class="stat">
                                                            <div class="value">4<sup>m</sup></div>
                                                            <div class="type">read</div>
                                                        </div>
                                                        <div class="stat border">
                                                            <div class="value">watch a </div>
                                                            <div class="type"><a href="<?php echo $video ?>" target="_blank">video</a></div>
                                                        </div>
                                                        <div class="stat">
                                                            <div class="value">32</div>
                                                            <div class="type">comments</div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                            <?php
                                            if ($i == 3) {
                                            ?>
                                            </tr><?php $i = 1;
                                                }
                                            } ?>
                                </table>

                            </div>

                            <br><br>

                        <?php

                        }
                    }


                    /*  ----------------coachs---------*/

                    $sql_ex = "SELECT * FROM coachs";
                    if ($result = mysqli_query($conn, $sql_ex)) {
                        if (mysqli_num_rows($result) > 0) {

                        ?>
                            <h2 class="T_allExh"><span class="T_allEx">Our Coachs</span></h2>
                            <div class="allEx">

                                <table>
                                    <?php
                                    echo "\r\n";
                                    $i = 0;
                                    while ($lign = mysqli_fetch_row($result)) {
                                        $c_name = $lign['1'];
                                        $c_photo = $lign['2'];
                                        $c_dsc = $lign['3'];
                                        $c_rating = $lign['4'];
                                        $c_ig = $lign['5'];
                                        $c_fb = $lign['6'];
                                        $c_telegram = $lign['7'];

                                        if ($i == 0) {
                                    ?><tr><?php
                                                }
                                                $i++;
                                                    ?>
                                            <td>
                                                <div class="card">
                                                    <div class="card-image" style="background-image: url(<?php echo $c_photo ?>);"></div>
                                                    <div class="card-text">
                                                        <span class="date"><?php echo "rating: " . $c_rating ?></span>
                                                        <h2><?php echo $c_name ?></h2>
                                                        <p><?php echo $c_dsc ?></p>
                                                    </div>
                                                    <div class="card-stats">
                                                        <div class="stat">
                                                            <!-- <div class="value">4<sup>m</sup></div> -->
                                                            <div class="type"><a href="https://telegram.org/" target="_blank"><i class="telegram"></i><img class="social" src="images\telegram .png"></a></div>
                                                        </div>
                                                        <div class="stat border">
                                                            <!-- <div class="value">watch a </div> -->
                                                            <div class="type"><a href="https://www.instagram.com/" target="_blank"><i class="insgram"></i><img class="social" src="images\insgram.png"></a></div>
                                                        </div>
                                                        <div class="stat">
                                                            <!-- <div class="value">facebook</div> -->
                                                            <div class="type"><a href="https://www.facebook.com/" target="_blank"><i class="facebook"></i><img class="social" src="images\facebook.png"></a></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                            <?php
                                            if ($i == 3) {
                                            ?>
                                            </tr><?php $i = 1;
                                                }
                                            } ?>
                                </table>

                            </div>



                        <?php

                        }
                    }
                } elseif ($mail == $adminMail and $pass == $adminPass) {
                    /* ---------------log in as admin------------- */
                    $_SESSION['mail']=$mail;
                    $_SESSION['pass']=$pass;
                    echo "<br><br>&nbsp;&nbsp;log in as admin<br><br>";
                    ?>
                    <a href="addEx.php">Add Exercice</a><br>
                    <a href="addC.php">Add Coach</a>
                    
                    <table border="1px ">
                            <th>User ID</th>
                            <th>first name</th>
                            <th>last name</th>
                            <th>email</th>
                            <th>pass</th>
                            <th>birthday</th>
                            <th>gender</th>
                            <th>delete</th>
                    
                    <?php
                    $sql2 = 'SELECT * from users';
                    if ($result = mysqli_query($conn, $sql2)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($lign = mysqli_fetch_row($result)) {
                                
                                $userId = $lign['0']; 
                                $firstName = $lign['1'];
                                $lastName = $lign['2'];
                                $email = $lign['3'];
                                $pass = $lign['4'];
                                $birthday = $lign['5'];
                                $gender = $lign['6'];
                                
                                $_SESSION['userId'] = $userId;

                                ?><tr><?php
                                ?><td><?php echo $userId ?></td> 
                                <td><?php echo $firstName ?></td>
                                <td><?php echo $lastName ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $pass ?></td>
                                <td><?php echo $birthday ?></td>
                                <td><?php echo $gender ?></td>
                                <td><a href="deleteUser.php">delete</a></td>

                                </tr><?php
                            }
                        }
                    }
                    ?></table>
                    
                    <table border="1px ">
                            <th>User ID</th>
                            <th>name</th>
                            <th>photo</th>
                            <th>description</th>
                            <th>rating</th>
                            <th>instgram link</th>
                            <th>facebook link</th>
                            <th>telegram link</th>
                            <th style="color: green;">edit</th>
                            <th style="color: red;">delete</th>
                    
                    <?php
                    $sql2 = 'SELECT * from coachs';
                    if ($result = mysqli_query($conn, $sql2)) {
                        if (mysqli_num_rows($result) > 0) {
                            $j=0;
                            while ($lign = mysqli_fetch_row($result)) {
                                $j++;
                                
                                $idC = $lign['0']; 
                                $c_name = $lign['1'];
                                $c_photo = $lign['2'];
                                $c_dsc = $lign['3'];
                                $c_rating = $lign['4'];
                                $c_ig = $lign['5'];
                                $c_fb = $lign['6'];
                                $c_telegram = $lign['7'];
                                
                                $_SESSION['idC'] = $idC;

                                ?><tr><?php
                                ?><td><?php echo $idC ?></td> 
                                <td><?php echo $c_name ?></td>
                                <td><img src="<?php echo $c_photo ?>" style="width:200px;height:170px;"></td>
                                <td><?php echo $c_dsc ?></td>
                                <td><?php echo $c_rating ?></td>
                                <td><?php echo $c_ig ?></td>
                                <td><?php echo $c_fb ?></td>
                                <td><?php echo $c_telegram ?></td>
                                <td><a href="editC.php">edit</a></td>
                                <td><a href="deleteC.php">delete</a></td>

                                </tr><?php
                            }
                        }
                    }
                    ?></table>
                    <?php
                    } else {
                        $location = "logIn.php";
                        header("Location: $location?message=fail");
                        exit();
                    }
                }
            }
        } else {
            $location = 'LogIn.html';
            header("Location: $location?message=failed");
        }
        ?>

        <footer><?php include 'footer.php'; ?></footer>

</body>

</html>