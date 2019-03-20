<?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if ( isset($_SESSION['userType']) ){
            if( $_SESSION['userType'] === "Student" ){
                $path = $_SERVER['DOCUMENT_ROOT'];
                $path .= "/student/my_profile_student.php";
                include $path;
            }
            else if( $_SESSION['userType'] === "Secretary" ){
                $path = $_SERVER['DOCUMENT_ROOT'];
                $path .= "/secretary/my_profile_secretary.php";
                include $path;
            }
            else if( $_SESSION['userType'] === "Publisher" ){
                $path = $_SERVER['DOCUMENT_ROOT'];
                $path .= "/common/under_construction.php";
                include $path;
            }
            elseif ($_SESSION['userType'] === "Library") {
                $path = $_SERVER['DOCUMENT_ROOT'];
                $path .= "/common/under_construction.php";
                include $path;
            }
            else{
                echo "A big error occured.";
            }

        }
        else{
            echo "A big error occured.";
        }

    }
    else{ //maybe display content but at disable mode
        echo "You are not logged in!";
    }
?>
