<?php
    session_start();
    $error = "";
    $emailErr = $passErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form

      if (empty($_POST["password"])) {
          $passErr = "Password is required";
      }
      else {
          $mypassword = $_POST['password'];
      }

      if (empty($_POST["email"])) {
          $emailErr = "Email is required";
      }
      else {
          $email = $_POST["email"];
      }

      if( ! (strcmp($emailErr, "") or strcmp($passErr, "")) ){

          $path = $_SERVER['DOCUMENT_ROOT'];
          $path .= "/db_login/login_db.php";
          require_once $path; //db info

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT idUsers, UserType FROM Users WHERE Email = '$email' and Password = '$mypassword' ";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $_SESSION['loggedin'] = true;
              $_SESSION['username'] = $email;
              $_SESSION['userType'] = $row["UserType"];

              if(isset($_SESSION['loggedoutMessage'])){
                  unset($_SESSION['loggedoutMessage']);
              }

              echo 1;
          }
          else {
              $error = "Invalid username or password";
              echo 0;
          }
          $conn->close();
      }

   }
?>
