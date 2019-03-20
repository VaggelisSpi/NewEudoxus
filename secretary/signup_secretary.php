<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/db_login/login_db.php";
    include $path;

    // define variables and set to empty values
    $email = $pass = $passConf = $firstName = $lastName = $date = $uni = $dept = $id = $phone = "";
    $address = $addressNum = $municipality = $TK = "";
    $succ = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = $_POST["email"];
        $pass = $_POST["password"];
        $passConf = $_POST["passwordConf"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $uni = $_POST["university"];
        $dept = $_POST["department"];
        $id = $_POST["id"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $addressNum = $_POST["addressNum"];
        $municipality = $_POST["addressDimos"];
        $TK = $_POST["addressTK"];

        require_once $path; //db info

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");
        $sql = ("INSERT INTO Users (Email, Password, FirstName,
                                LastName, DateOfBirth, Phone, Address,
                                AddressNum, Municipality, TK, UserType)
                                VALUES ('$email', '$pass', '$firstName',
                                    '$lastName', '$date', '$phone', '$address',
                                    '$addressNum', '$municipality', '$TK', 'Secretary')");

        if ($conn->query($sql) === TRUE) {
            $succ = "Επιτυχής καταχώρηση!";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $last_id = $conn->insert_id;
        $sql = ("INSERT INTO Secretary (idSecretary, DepartmentName, UniversityName, IdNumber)
                                VALUES ($last_id, '$dept', '$uni', '$id')");
        if ($conn->query($sql) === TRUE) {
            $succ = "Επιτυχής καταχώρηση!";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        unset($_SESSION['registrationMessage']);
        echo '<script type="text/javascript">',
             'window.location.href = "/index.php?register";',
             '</script>'
        ;
    }
?>
