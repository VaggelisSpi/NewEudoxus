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
              <li><a href="/student/student_app.php">Εφαρμογή Φοιτητών</a></li>
              <li>Δήλωση Συγγραμμάτων</li>
            </ul>
        </div>

        <div class="dilosi-steps-breadcrumb">
            <ul class="steps steps-3">
              <li><a href="/student/dilosi_step.php" title=""><em>Επιλογή Μαθημάτων</em></a></li>
              <li class="current"><a href="#" title=""><em>Επιλογή Συγγραμμάτων</em></a></li>
              <li><a href="#" title=""><em>Ολοκλήρωση Δήλωσης</em></a></li>
            </ul>
        </div>

        <?php
            //connect to database and use $q
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/db_login/login_db.php";
            include $path;


            require_once $path; //db info
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $conn->set_charset("utf8");

            if (isset($_SESSION['numberOfSubjects'])) {
                $number = $_SESSION['numberOfSubjects'];
                for ($i=0; $i < $number; $i++) {
                    $varName = "q_".$i;
                    if (isset($_SESSION[$varName])) {
                        $var = $_SESSION[$varName];

                        echo '
                            <div class="dilosi-step2-select-book">
                                <h1 class="title">'.$var.'
                                </h1>
                                <fieldset id="group'.$i.'">
                        ';
                        //Find books for this subject
                        $sql = ("SELECT * FROM  SubjectBookDilosi WHERE subjectName = '$var'");
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $counterForCheck = 0;
                            while ($row = $result->fetch_assoc()) {
                                if( $counterForCheck == 0 ){
                                    echo '
                                        <div class="books-list-item">
                                            <label class="dilosi-book-radio-button">
                                              <input type="radio" checked="checked" value="'.$row["subjectBookName"].'" name="group'.$i.'">
                                              <span class="checkmark"></span>
                                            </label>
                                            <div class="dilosi-book-title">'
                                                .$row["subjectBookName"].' - '.$row["subjectBookPublisher"].' ('.$row["bookPososto"].')
                                            </div>
                                            <div class="dilosi-book-info">
                                                <a href="#" onclick="return false;" tabindex="0" data-placement="bottom"
                                                 class="btn" role="button" data-toggle="popover"
                                                 data-trigger="click" title="Περισσότερες Πληροφορίες"
                                                 data-content=\'
                                                     <div id="popover-content" class="hidden">
                                                             <div>
                                                                 Υπό κατασκευή.
                                                             </div>
                                                     </div>
                                                 \'
                                                 >
                                                 Περισσότερες Πληροφορίες
                                                 </a>
                                            </div>
                                            <div class="dilosi-book-comments">
                                                <a href="#" onclick="return false;" tabindex="0" data-placement="bottom"
                                                 class="btn" role="button" data-toggle="popover"
                                                 data-trigger="click" title="Σχόλια"
                                                 data-content=\'
                                                     <div id="popover-content" class="hidden">
                                                             <div>
                                                                 Υπό κατασκευή.
                                                             </div>
                                                     </div>
                                                 \'
                                                 >
                                                 Σχόλια(2)
                                                 </a>
                                            </div>
                                        </div>
                                    ';
                                }
                                else{
                                    echo '
                                        <div class="books-list-item">
                                            <label class="dilosi-book-radio-button">
                                              <input type="radio" value="'.$row["subjectBookName"].'" name="group'.$i.'">
                                              <span class="checkmark"></span>
                                            </label>
                                            <div class="dilosi-book-title">'
                                                .$row["subjectBookName"].' - '.$row["subjectBookPublisher"].' ('.$row["bookPososto"].')
                                            </div>
                                            <div class="dilosi-book-info">
                                                <a href="#" onclick="return false;" tabindex="0" data-placement="bottom"
                                                 class="btn" role="button" data-toggle="popover"
                                                 data-trigger="click" title="Περισσότερες Πληροφορίες"
                                                 data-content=\'
                                                     <div id="popover-content" class="hidden">
                                                             <div>
                                                                 Υπό κατασκευή.
                                                             </div>
                                                     </div>
                                                 \'
                                                 >
                                                 Περισσότερες Πληροφορίες
                                                 </a>
                                            </div>
                                            <div class="dilosi-book-comments">
                                                <a href="#" onclick="return false;" tabindex="0" data-placement="bottom"
                                                 class="btn" role="button" data-toggle="popover"
                                                 data-trigger="click" title="Σχόλια"
                                                 data-content=\'
                                                     <div id="popover-content" class="hidden">
                                                             <div>
                                                                 Υπό κατασκευή.
                                                             </div>
                                                     </div>
                                                 \'
                                                 >
                                                 Σχόλια(2)
                                                 </a>
                                            </div>
                                        </div>
                                    ';
                                }
                                $counterForCheck ++;
                            }
                        }

                        echo '
                                </fieldset>
                            </div>

                        ';
                    }

                }
            }
            $conn->close();
        ?>

        <div class="previous-step">
            <a class="btn" href="/student/dilosi_step.php" title="dilosi_step1"><i class="fa fa-angle-left" aria-hidden="true"></i> Προηγούμενο Βήμα </a>
        </div>

        <div class="next-step">
            <?php
                if(isset($_SESSION['numberOfSubjects'])) {
                    $number = $_SESSION['numberOfSubjects'];
                    echo '<a class="btn" href="/student/dilosi_step3.php" onclick="updateSessionInfo2('.$number.')
                    " title="dilosi_step3">Επόμενο Βήμα <i class="fa fa-angle-right" aria-hidden="true"></i></a>';
                }
            ?>
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
