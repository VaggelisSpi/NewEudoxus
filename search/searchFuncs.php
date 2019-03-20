<?php
    function executeSearchWithArg($conn) {
        $searchTerm = $_REQUEST["q"];
        //echo "q is ".$searchTerm."<br>";
        $sql = ("SELECT * FROM Books b WHERE LOWER(b.Name) LIKE LOWER('%$searchTerm%')");

        $conditions = array();

        if (isset($_REQUEST['u'])) {
            $x = $_REQUEST["u"];
            $conditions[] = "LOWER(sb.UniversityName) LIKE LOWER('%$x%')";

            //echo "u is ".$x."<br>";
        }

        if (isset($_REQUEST['d'])) {
            $x = $_REQUEST["d"];
            $conditions[] = "LOWER(sb.DepartmentName) LIKE LOWER('%$x%')";

            //echo "d is ".$x."<br>";
        }

        if (isset($_REQUEST['s'])) {
            $x = $_REQUEST["s"];
            // $conditions[] = "LOWER(sb.Semester) = LOWER('$x')";

            //echo "s is ".$x."<br>";
        }

        if (isset($_REQUEST['su'])) {
            $x = $_REQUEST["su"];
            $conditions[] = "LOWER(sb.SubjectName) LIKE LOWER('%$x%')";

            //echo "su is ".$x."<br>";
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

        $result = $conn->query($sql);
        //echo "sql = '$sql' <br>";
        $rows = $result->num_rows;
        //echo "rows is ".$rows."<br>";

        printResults($rows, $result, $searchTerm);
    }

    function executeSearchWithoutArg($conn) {
        $sql = ("SELECT * FROM Books b WHERE ");

        $conditions = array();
        $flag = false;

        if (isset($_REQUEST['u'])) {
            $x = $_REQUEST["u"];
            $conditions[] = "LOWER(sb.UniversityName) LIKE LOWER('%$x%')";

            //echo "u is ".$x."<br>";
        }

        if (isset($_REQUEST['d'])) {
            $x = $_REQUEST["d"];
            $conditions[] = "LOWER(sb.DepartmentName) LIKE LOWER('%$x%')";

            //echo "d is ".$x."<br>";
        }

        if (isset($_REQUEST['s'])) {
            $x = $_REQUEST["s"];
            // $conditions[] = "LOWER(sb.Semester) = LOWER('$x')";

            //echo "s is ".$x."<br>";
        }

        if (isset($_REQUEST['su'])) {
            $x = $_REQUEST["su"];
            $conditions[] = "LOWER(sb.SubjectName) LIKE LOWER('%$x%')";

            //echo "su is ".$x."<br>";
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
            $flag = true;
        }

        if ($flag == true) {
            $result = $conn->query($sql);
            if (!$result) {
                trigger_error('Invalid query: ' . $conn->error);
            }
            //echo "sql = '$sql' <br>";
            $rows = $result->num_rows;
            //echo "rows is ".$rows."<br>";

            printResults($rows, $result);
        } else {
            //do nothing
            echo '<div class="placeholder"><p></p></div>';
        }
    }
?>
