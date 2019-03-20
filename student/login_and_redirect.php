<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="/vendor/fontawesome-free-5.5.0-web/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css">

        <!-- Bootstrap core CSS -->
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap core JavaScript -->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <link href="/vendor/select2-4.0.6-rc.1/dist/css/select2.css" rel="stylesheet">
        <script src="/vendor/select2-4.0.6-rc.1/dist/js/select2.js"></script>

        <script src="/vendor/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js"></script>
        <link href="/vendor/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.standalone.css" rel="stylesheet">

        <link href="/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet">
        <script src="/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

        <script src="/js/main.js"></script>
        <title> New Eudoxus </title>
    </head>
    <body>

        <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/common/header.php";
            include $path;
        ?>

        <div class="my-breadcrumb">
            <ul class="breadcrumb">
              <li><a href="/index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
              <li>Είσοδος</li>
            </ul>
        </div>

        <div class="redirect-login-paragraph">
            <p> Παρακαλούμε πραγματοποιήστε είσοδο προκειμένου να συνεχίσετε. </p>
        </div>

        <div class="redirect-sign-up-paragraph">
            <p> Αν είσαι νέος φοιτητής έφτασε η ώρα να εγγραφείς και συ!</p>
            <div class="my-signup">
                <a href="/student/registration_form_student.php" class="btn" >Εγγραφή</a>
            </div>
        </div>

        <div class="redirect-login">
                <div>
                    <label class="my-label-email" for="email"><i class="fa fa-envelope" aria-hidden="true"></i>  Email:</label>
                    <input type="email" name="email" id="login-redirect-email" class="form-control input-md">
                    <label class="my-label-password" for="password"><i class="fa fa-lock" aria-hidden="true"></i>  Password:</label>
                    <!-- Password field -->
                    <div class="input-group" id="show_hide_password_login">
                        <input class="form-control" type="password" name="password" id="login-redirect-password">
                        <div class="input-group-addon login-popup">
                          <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="error-msg-login">

                    </div>
                    <div class="last-actions">
                        <a class="my-password-remember" href="/common/under_construction.php">Υπενθύμιση Password</a>
                        <label class="my-label-stay-login"><input type="checkbox" value="">  Να παραμείνω συνδεδεμένος</label>
                        <a href="#" class="btn btn-primary my-submit" id="redirect-login-submit-button">Είσοδος</a>
                    </div>
                </div>
        </div>

        <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/common/footer.php";
            include $path;
        ?>

        <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/common/login_popup_content.php";
            include $path;
        ?>

    </body>
</html>
