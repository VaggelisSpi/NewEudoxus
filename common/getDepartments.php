<?php
    $q = $_GET['q'];


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
    $sql = ("SELECT * FROM  Department WHERE UniversityName = '$q'");
    $result = $conn->query($sql);

    echo '<option value="" selected disabled hidden>Επιλογή Τμήματος</option>';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="'.$row["DepartmentName"].'">'.$row["DepartmentName"].'</option>';
        }
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
