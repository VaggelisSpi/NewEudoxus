<div class="student-app-content">
    <div class="new-dilosi-button student-app-button">
        <a href="/student/dilosi_step.php" class="btn"><span class="button-text"><br/>Νέα Δήλωση<br/>Συγγραμμάτων</span></a>
    </div>
    <div class="edit-current-button student-app-button">
        <a href="/common/under_construction.php" class="btn"><span class="button-text"><br/>Επεξεργασία Τρέχουσας<br/>Δήλωσης</span></a>
    </div>
    <div class="current-dilosi">

        <div class="title">
            <h4>Τρέχουσα Δήλωση</h4>
        </div>

        <div class="my-pin">
            Το Pin σου είναι: 123456789123
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

            //Find dilosi of this student
            if (isset($_SESSION['username'])) {
                $studentEmail = $_SESSION['username'];

                $sql = ("SELECT * FROM  Dilosi WHERE studentEmail = '$studentEmail'");
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '
                        <div class="current-subjects">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                    <th scope="col">Μάθημα</th>
                                    <th scope="col">Παραλήφθηκε</th>
                                </tr>
                              </thead>
                              <tbody>
                    ';
                    while ($row = $result->fetch_assoc()) {
                        echo '
                                <tr>
                                    <td>'.$row["subjectName"].'</td>
                                    <td><i class="fa fa-minus" aria-hidden="true"></i></td>
                                </tr>
                        ';
                    }
                    echo '
                            </tbody>
                          </table>
                      </div>
                    ';
                }
                else{
                    echo '
                        <div class="current-subjects-new-dilosi">
                            Εκκρεμεί νέα δήλωση.
                        </div>
                    ';
                }

            }

            $conn->close();
        ?>

    </div>
    <div class="exchange-button student-app-button">
        <a href="/common/under_construction.php" class="btn"><span class="button-text"><br/>Ανταλλαγή<br/>Συγγραμμάτων</span></a>
    </div>
    <div class="history-button student-app-button">
        <a href="/common/under_construction.php" class="btn"><span class="button-text"><br/>Ιστορικό<br/>Δηλώσεων</span></a>
    </div>
    <div class="remaining-books">
        Συνολικά βιβλία που μπορείς να πάρεις ακόμα από τον Εύδοξο: 27
    </div>
</div>
