<?php

    session_start();

    if (isset($_GET['name'])) {

        //connect to database and use $q
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/db_login/login_db.php";
        include $path;
        $response = "";

        require_once $path; //db info
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        $subjectBookNameToRemove = $_GET['name'];
        $sql = ("DELETE FROM SubjectBookDilosi WHERE subjectBookName='$subjectBookNameToRemove';");

        if ($conn->query($sql) === TRUE) {

        } else {
            $conn->close();
            echo 0;
        }

        unset($_SESSION['successRemovalMessage']);
        $conn->close();
        echo 1;
    }
    else{
        echo 0;
    }


?>
