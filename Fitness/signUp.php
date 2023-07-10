<!DOCTYPE html>
<html>



<?php
   if (
      isset($_POST['firstName']) and !empty($_POST['firstName']) and isset($_POST['lastName']) and !empty($_POST['lastName'])
      and isset($_POST['mail']) and !empty($_POST['mail']) and isset($_POST['pass']) and !empty($_POST['pass']) and
      isset($_POST['gender']) and !empty($_POST['gender'])
   ) {
      if (strlen($_POST['firstName']) > 25 and strlen($_POST['lastName'])) {
         echo "Name can't have more than 25 caracters" . '<br/>';
      } else {
         $servername = "localhost";
         $username = "root";
         $password = "admin";

         $conn = new mysqli($servername, $username, $password);
         if ($conn) {
            if (mysqli_select_db($conn, 'fitness')) {
               $firstName = $_POST['firstName'];
               $lastName = $_POST['lastName'];
               $mail = $_POST['mail'];
               $pass = $_POST['pass'];
               $gender = $_POST['gender'];
               $day = $_POST['day'];
               $month = $_POST['month'];
               $year = $_POST['year'];
               $birthday = $year . '-' . $month . '-' . $day;
               $sql = "SELECT * FROM users WHERE email = '$mail' LIMIT 1";
               $result = mysqli_query($conn, $sql);
               if (mysqli_num_rows($result) > 0) {
                  $location = "signUp2.php";
                  header("Location: $location?message=fail");
                  exit();
               }
               $query = "INSERT INTO users (firstName, lastName, email, pass, birthday, gender) VALUES ('" . $firstName . "', '" . $lastName . "', '" . $mail . "', '" . $pass . "', '" . $birthday . "','" . $gender . "')";
               if (mysqli_query($conn, $query)) {
                  echo "Signup Successful<br>";
                  echo '<a href="logIn.php" class link">You can log in from here';
               } else {
                  echo "person was not added to dataset <br>";
               }
            } else {
               die("connection with base failed!");
            }
            mysqli_close($conn);
         } else {
            die("Connection failed: " . $mysqli_connect_error());
         }
      }
   } else {
      echo "Enter you name please!" . '<br/>';
   }

   ?>

</body>

</html>