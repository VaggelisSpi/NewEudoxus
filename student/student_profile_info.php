<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/db_login/login_db.php";
require_once $path; //db info

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the info of the student
    $email = $_SESSION["username"];
    $conn->set_charset("utf8");
    $sql = "SELECT * FROM Users WHERE Email = '$email' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $id = $row["idUsers"];
    $pass = $row["Password"];
    $firstName = $row["FirstName"];
    $lastName = $row["LastName"];
    $date = $row["DateOfBirth"];
    $phone = $row["Phone"];
    $address = $row["Address"];
    $addressNum = $row["AddressNum"];
    $municipality = $row["Municipality"];
    $postalCode = $row["TK"];

    $sql = "SELECT * FROM Student WHERE idStudent = '$id' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $uni = $row["UniversityName"];
    $dept = $row["DepartmentName"];
    $am = $row["AM"];

    $conn->close();
?>
