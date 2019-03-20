<?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        // User is logged in
        echo
        '
        <div class="login-area loggedin-user">
            <div class="user-info">
                <a href="/profile/my_profile.php" >
        '
                . $_SESSION['username'] .
        '
                </a>
            </div>
            <div class="my-logout">
                <a href="/login/logout.php" >Αποσύνδεση</span></a>
            </div>
        </div>
        ';
    }
    else {
        // User is not logged in
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/login/login_options.php";
        include $path;
    }
?>
