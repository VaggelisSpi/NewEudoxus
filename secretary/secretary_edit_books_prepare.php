<?php

    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['userType']) && $_SESSION['userType'] == 'Secretary' ) {
        // User is logged in
        include 'secretary_edit_books.php';
    }
    else {
        // User is not logged in
        include 'login_and_redirect_secret.php';
    }

?>
