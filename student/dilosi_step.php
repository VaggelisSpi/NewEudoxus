<?php

    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['userType']) && $_SESSION['userType'] == 'Student' ) {
        // User is logged in
        include 'dilosi_step1.php';
    }
    else {
        // User is not logged in
        include 'login_and_redirect.php';
    }

?>
