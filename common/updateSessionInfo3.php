<?php

    session_start();
    if (isset($_SESSION['numberOfSubjects2'])) {

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

        //clear previous dilosi of this student
        if (isset($_SESSION['username'])) {

            $studentEmail = $_SESSION['username'];
            $sql = ("DELETE FROM Dilosi WHERE studentEmail='$studentEmail';");

            if ($conn->query($sql) === TRUE) {

            } else {
                $conn->close();
                echo 0;
            }

        }
        else{
            $conn->close();
            echo 0;
        }

        //insert new dilosi
        for ($i=0; $i < $_SESSION['numberOfSubjects2']; $i++) {
            $varSubject = "q_".$i;
            $varBook = "s_".$i;
            if ( isset($_SESSION[$varSubject]) && isset($_SESSION[$varBook])) {
                $subjectName = $_SESSION[$varSubject];
                $bookName = $_SESSION[$varBook];
                $sql = "INSERT INTO Dilosi (subjectName, subjectBookName, studentEmail)
                VALUES ('$subjectName', '$bookName', '$studentEmail')";

                if ($conn->query($sql) === TRUE) {

                } else {
                    $conn->close();
                    echo 0;
                }

                //unset these session variables
                unset($_SESSION[$varSubject]);
                unset($_SESSION[$varSubject]);
            }else{

            }
        }
        //unset counter session variables
        unset($_SESSION['numberOfSubjects']);
        unset($_SESSION['numberOfSubjects2']);

        unset($_SESSION['successfullDilosiMessage']);
        $conn->close();
        echo 1;
    }
    else{
        echo 0;
    }


?>
