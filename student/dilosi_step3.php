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
              <li><a href="/student/dilosi_step1.php" title=""><em>Επιλογή Μαθημάτων</em></a></li>
              <li><a href="/student/dilosi_step2.php" title=""><em>Επιλογή Συγγραμμάτων</em></a></li>
              <li class="current"><a href="#" title=""><em>Ολοκλήρωση Δήλωσης</em></a></li>
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
                $number = $_SESSION['numberOfSubjects2'];
                for ($i=0; $i < $number; $i++) {
                    $varName = "s_".$i;
                    $varName2 = "q_".$i;
                    if (isset($_SESSION[$varName])) {
                        $var = $_SESSION[$varName];
                        $varSubject = $_SESSION[$varName2];

                        //Find books for this subject
                        $sql = ("SELECT * FROM  SubjectBookDilosi WHERE subjectBookName = '$var'");
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                    $counter = $i +1;
                                    echo '
                                        <div class="dilosi-step3-select-delivery">
                                            <h1 class="title">'.$varSubject.'</h1>
                                            <div class="books-list-final-info">
                                                <div class="books-list-final-title">
                                                    '.$row["subjectBookName"].'
                                                </div>
                                                <div class="books-list-final-middle">
                                                    <div class="books-list-final-comments">
                                                        <a href="#" onclick="return false;" tabindex="0" data-placement="bottom"
                                                         class="btn dilosi-popover" role="button" data-toggle="popover"
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
                                                        | <a href="#" onclick="return false;" tabindex="0" data-placement="bottom"
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
                                                         Σχόλια(7)
                                                         </a>
                                                    </div>
                                                    <div class="books-list-final-delivery">
                                                        <div class="my-select-title-books-list-final-delivery">
                                                            Τρόπος Παραλαβής:
                                                        </div>
                                                        <div class="my-select-books-list-final-delivery my-select-books-list-final-delivery-'.$counter.'">
                                                            <select id="books-list-final-delivery-select'.$counter.'" onchange="deliverySelect'.$counter.'()">
                                                                <option value="publisher" selected>Από σημείο διανομής του εκδότη</option>
                                                                <option value="library">Από Πανεπιστημιακή Βιβλιοθήκη</option>
                                                                <option value="home">Παράδοση στο σπίτι</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="books-list-final-hours">
                                                    Εκδόσεις: '.$row["subjectBookPublisher"].' <br/>
                                                    Ωράριο: 11:00-17:00 Δευτέρα-Παρασκευή <br/>
                                                    Διεύθυνση: Ακαδημίας 42, Αθήνα 106 72 <br/>
                                                        <a href="#" onclick="return false;" tabindex="0" data-placement="bottom"
                                                         class="btn dilosi-popover" role="button" data-toggle="popover"
                                                         data-trigger="click" title="Χάρτης"
                                                         data-content=\'
                                                             <div id="popover-content" class="hidden">
                                                                     <div>
                                                                         Υπό κατασκευή.
                                                                     </div>
                                                             </div>
                                                         \'
                                                         >
                                                         Εμφάνιστη στο χάρτη
                                                         </a>
                                                </div>
                                            </div>
                                        </div>
                                    ';
                            }
                        }
                    }

                }
            }
            $conn->close();
        ?>

        <div class="dilosi-step3-notifications">
            <div class="poria-dilosis">
                Ενημέρωση για την πορεία της δήλωσης: <br/>
                <input type="checkbox" name="SMS" value="SMS"> Μέσω SMS<br>
                <input type="checkbox" name="e-mail" value="e-mail"> Μέσω e-mail<br>
            </div>
            <div class="availability">
                Ενημέρωση για την διαθεσιμότητα συγγραμμάτων: <br/>
                <input type="checkbox" name="SMS" value="SMS"> Μέσω SMS<br>
                <input type="checkbox" name="e-mail" value="e-mail"> Μέσω e-mail<br>
            </div>
        </div>
        <div class="previous-step">
            <a class="btn" href="/student/dilosi_step2.php" title="dilosi_step1"><i class="fa fa-angle-left" aria-hidden="true"></i> Προηγούμενο Βήμα </a>
        </div>

        <div class="next-step">
            <?php
                if(isset($_SESSION['numberOfSubjects2'])) {
                    $number = $_SESSION['numberOfSubjects2'];
                    echo '<a class="btn" href="/student/student_app.php?successfulDilosi" onclick="updateSessionInfo3('.$number.')
                    " title="complete">Ολοκλήρωση Δήλωσης <i class="fa fa-angle-right" aria-hidden="true"></i></a>';
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
