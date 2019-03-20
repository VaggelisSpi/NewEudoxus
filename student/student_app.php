<?php
session_start();
?>
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

        <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/common/userOptions.php";
            include $path;
        ?>

        <div class="my-breadcrumb">
            <ul class="breadcrumb">
              <li><a href="/index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
              <li>Εφαρμογή Φοιτητών</li>
            </ul>
        </div>

        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['userType']) && $_SESSION['userType'] == 'Student' ) {
                // User is logged in
                include 'student_app_content_loggedin.php';
            }
            else {
                // User is not logged in
                include 'student_app_content_not_loggedin.php';
            }
        ?>

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

        <!-- Login Modal -->
        <div class="modal" id="dilosiModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Επιτυχής ολοκλήρωση δήλωσης</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <!-- <div class="modal-body">
                Επιτυχής ολοκλήρωση δήλωσης!
              </div> -->

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>

        <?php
            if (isset($_GET['successfulDilosi'])) {
                if(isset($_SESSION['successfullDilosiMessage'])){
                    //we have already shown this message
                }
                else{
                    $_SESSION['successfullDilosiMessage'] = true;
                    echo '<script>successDilosiPopup()</script>';
                }
            }
        ?>

    </body>
</html>
