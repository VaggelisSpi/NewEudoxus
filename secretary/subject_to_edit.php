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
        <?php
            if (isset($_REQUEST['s'])) {
                $subjectName = $_REQUEST['s'];
            }
            else{
                $subjectName = "";
            }
        ?>

        <div class="secretary-app-step2 my-breadcrumb">
            <ul class="breadcrumb">
              <li><a href="/index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
              <li><a href="/secretary/secretary_app.php">Εφαρμογή Γραμματείας</a></li>
              <li><a href="/secretary/secretary_edit_books.php">Επεξεργασία Συγγραμμάτων Για Μαθήματα</a></li>
              <li><?php echo $subjectName; ?></li>
            </ul>
        </div>

        <div class="secretary-step2-subject-info">
            <div class="subject-info-to-edit-title">
                <b>Μάθημα:</b>   <?php echo $subjectName; ?>
            </div>
            <div class="subject-info-to-edit-professor">
                <b>Καθηγητής:</b> Ιάκωβος Χριστόπουλος
            </div>
            <div class="subject-info-to-edit-semister">
                <b>Εξάμηνο:</b> 3ο
            </div>
        </div>

        <div class="add-book-secretary-step2">
            <a href="/common/under_construction.php" class="btn">Προσθήκη Συγγράμματος</a>
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

            //Find books of this subject
            $sql = ("SELECT * FROM  SubjectBookDilosi WHERE subjectName = '$subjectName'");
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $counter = 1;
                while ($row = $result->fetch_assoc()) {
                    echo '
                        <div class="editBookResult">
                            <div class="editBookResult-image">
                                <img src="/images/150.png" alt="Image Placeholder">
                            </div>
                            <div class="editBookResult-title">
                                '.$row["subjectBookName"].'
                            </div>
                            <div class="editBookResult-authors">
                                <!-- Συγγραφείς: Γιώργος Παπαδόπουλος, Δημήτρης Ανδρέου -->
                                Εκδόσεις: '.$row["subjectBookPublisher"].'
                            </div>
                            <div class="editBookResult-remove">
                                <a href="#" id="remove-book-'.$counter.'"> Αφαίρεση Βιβλίου από το Μάθημα </a>
                            </div>
                        </div>

                        <div class="modal fade" id="removeBookModal'.$counter.'" tabindex="-1" role="dialog" aria-labelledby="removeBookModal'.$counter.'-Title" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="removeBookModal'.$counter.'-LongTitle">Επιβεβαίωση</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Είστε σίγουροι ότι θέλετε να αφαιρέσετε το σύγγραμμα "'.$row["subjectBookName"].'" για το μάθημα <i>'.$subjectName.'</i>;
                              </div>
                              <div class="modal-footer">
                                <button type="button" id="success-remove-book" onclick="removeBook(\''.$row["subjectBookName"].'\');" class="yes-button btn btn-primary" >Ναι</button>
                                <button type="button" class="no-button btn btn-secondary" data-dismiss="modal">Όχι</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    ';
                    $counter ++;
                }
            }
            $conn->close();
        ?>

        <div class="editBooks-step2-placeholder">

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

        <!-- Modal -->
        <div class="modal" id="removalModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Επιτυχής αφαίρεση συγγράμματος</h4>
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
            if (isset($_GET['successRemoval'])) {
                if(isset($_SESSION['successRemovalMessage'])){
                    //we have already shown this message
                }
                else{
                    $_SESSION['successRemovalMessage'] = true;
                    echo '<script>successRemovalPopup()</script>';
                }
            }
        ?>

    </body>
</html>
