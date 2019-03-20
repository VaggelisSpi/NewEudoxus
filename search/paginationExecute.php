<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/db_login/login_db.php";
        include $path;

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->set_charset("utf8");

        $limitVar = $_REQUEST['pageLimit'];
        $currentPageVar = $_REQUEST['currentPage'];

        $offsetVar = ($currentPageVar - 1) * $limitVar;


        if (isset($_REQUEST['q'])) {

            $searchTerm = $_REQUEST["q"];

            $sql = ("SELECT * FROM Books b WHERE LOWER(b.Name) LIKE LOWER('%$searchTerm%')");

            $conditions = array();

            if (isset($_REQUEST['u'])) {
                $x = $_REQUEST["u"];
                $conditions[] = "LOWER(sb.UniversityName) LIKE LOWER('%$x%')";
            }

            if (isset($_REQUEST['d'])) {
                $x = $_REQUEST["d"];
                $conditions[] = "LOWER(sb.DepartmentName) LIKE LOWER('%$x%')";
            }

            if (isset($_REQUEST['s'])) {
                $x = $_REQUEST["s"];
                // $conditions[] = "LOWER(sb.Semester) = LOWER('$x')";
            }

            if (isset($_REQUEST['su'])) {
                $x = $_REQUEST["su"];
                $conditions[] = "LOWER(sb.SubjectName) LIKE LOWER('%$x%')";

            }

            if (count($conditions) > 0) {
                $sql = ("SELECT DISTINCT b.Name, b.Publisher, b.Author, b.ISBN
                     FROM Books b, SubjectBook sb WHERE LOWER(b.Name) LIKE LOWER('%$searchTerm%') AND ");
                $sql .= implode(' AND ', $conditions);
            }
            $conditions = array();

            if (isset($_REQUEST['p'])) {
                $x = $_REQUEST["p"];
                $conditions[] = "LOWER(b.Publisher) LIKE LOWER('%$x%')";

                //echo "p is ".$x."<br>";
            }

            if (isset($_REQUEST['a'])) {
                $x = $_REQUEST["a"];
                $conditions[] = "LOWER(b.Author) LIKE LOWER('%$x%')";

                //echo "a is ".$x."<br>";
            }

            if (isset($_REQUEST['i'])) {
                $x = $_REQUEST["i"];
                $conditions[] = "LOWER(b.ISBN) LIKE LOWER('%$x%')";

                //echo "i is ".$x."<br>";
            }

            if (isset($_REQUEST['y'])) {
                $x = $_REQUEST["y"];
                $conditions[] = "LOWER(b.PublishYear) LIKE LOWER('%$x%')";

                //echo "y is ".$x."<br>";
            }

            if (count($conditions) > 0) {
                $sql .= " AND " . implode(' AND ', $conditions);
            }

            $sql .= "LIMIT $limitVar OFFSET $offsetVar";
            $result = $conn->query($sql);

        }
        else {
            $sql = ("SELECT * FROM Books b WHERE ");

            $conditions = array();
            $flag = false;

            if (isset($_REQUEST['u'])) {
                $x = $_REQUEST["u"];
                $conditions[] = "LOWER(sb.UniversityName) LIKE LOWER('%$x%')";

            }

            if (isset($_REQUEST['d'])) {
                $x = $_REQUEST["d"];
                $conditions[] = "LOWER(sb.DepartmentName) LIKE LOWER('%$x%')";

            }

            if (isset($_REQUEST['s'])) {
                $x = $_REQUEST["s"];

            }

            if (isset($_REQUEST['su'])) {
                $x = $_REQUEST["su"];
                $conditions[] = "LOWER(sb.SubjectName) LIKE LOWER('%$x%')";

            }

            if (count($conditions) > 0) {
                $sql = ("SELECT DISTINCT b.Name, b.Publisher, b.Author, b.ISBN
                     FROM Books b, SubjectBook sb WHERE ");
                $sql .= implode(' AND ', $conditions);
                $flag = true;
            }
            $conditions = array();

            if (isset($_REQUEST['p'])) {
                $x = $_REQUEST["p"];
                $conditions[] = "LOWER(b.Publisher) LIKE LOWER('%$x%')";

            }

            if (isset($_REQUEST['a'])) {
                $x = $_REQUEST["a"];
                $conditions[] = "LOWER(b.Author) LIKE LOWER('%$x%')";

            }

            if (isset($_REQUEST['i'])) {
                $x = $_REQUEST["i"];
                $conditions[] = "LOWER(b.ISBN) LIKE LOWER('%$x%')";

            }

            if (isset($_REQUEST['y'])) {
                $x = $_REQUEST["y"];
                $conditions[] = "LOWER(b.PublishYear) LIKE LOWER('%$x%')";

            }

            if (count($conditions) > 0) {
                $sql .= " AND " . implode(' AND ', $conditions);
                $flag = true;
            }

            if ($flag == true) {
                $sql .= "LIMIT $limitVar OFFSET $offsetVar";
                $result = $conn->query($sql);
                if (!$result) {
                    trigger_error('Invalid query: ' . $conn->error);
                }

                // $rows = $result->num_rows;

            } else {
                //do nothing
                echo '<div class="placeholder"><p></p></div>';
            }
        }

        if( $result != null ){
            $rows = $result->num_rows;
        }
        else{
            trigger_error('Invalid query: ' . $conn->error);
        }

        usleep( 500000 );

        $finalResult = new \stdClass();

        $finalResult->totalNum = $rows;

        $allEntries = array();

        $counter = 0;

        while ($row = $result->fetch_assoc()) {
            $entry = new \stdClass();
            $entry->Name = $row["Name"];
            $entry->Author = $row["Author"];
            $entry->Publisher = $row["Publisher"];
            $entry->ISBN = $row["ISBN"];
            $allEntries[$counter] = $entry;
            $counter ++;
        }

        $finalResult->entriesArray = $allEntries;

        $myJSON = json_encode($finalResult);

        header('Content-type: application/json');
        echo $myJSON;
  }
?>
