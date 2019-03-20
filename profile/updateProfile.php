<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    if (isset($_SESSION['userType']) ) {

        $userName = $_SESSION['username'];

        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/db_login/login_db.php";
        include $path;

        require_once $path; //db info
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        if (isset($_REQUEST['newEmail'])) {
            $newEmail = $_REQUEST["newEmail"];
            $sql = "UPDATE Users SET Email='$newEmail' WHERE Email='$userName'";
        }

        if (isset($_REQUEST['newPassword'])) {
            $newPassword = $_REQUEST["newPassword"];
            $sql = "UPDATE Users SET Password='$newPassword' WHERE Email='$userName'";
        }

        if (isset($_REQUEST['newPhone'])) {
            $newPhone = $_REQUEST["newPhone"];
            $sql = "UPDATE Users SET Phone='$newPhone' WHERE Email='$userName'";
        }

        if (isset($_REQUEST['newAddress'])) {
            $newAddress = $_REQUEST["newAddress"];
            $sql = "UPDATE Users SET Address='$newAddress' WHERE Email='$userName'";
        }

        if (isset($_REQUEST['newAddressNum'])) {
            $newAddressNum = $_REQUEST["newAddressNum"];
            $sql = "UPDATE Users SET AddressNum='$newAddressNum' WHERE Email='$userName'";
        }

        if (isset($_REQUEST['newDimos'])) {
            $newDimos = $_REQUEST["newDimos"];
            $sql = "UPDATE Users SET Municipality='$newDimos' WHERE Email='$userName'";
        }

        if (isset($_REQUEST['newPostalCode'])) {
            $newPostalCode = $_REQUEST["newPostalCode"];
            $sql = "UPDATE Users SET TK='$newPostalCode' WHERE Email='$userName'";
        }

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo 1;
        }
        else {
            $conn->close();
            echo "Error updating record: " . $conn->error;
        }
    }
}
else{
    echo 0;
}

?>
