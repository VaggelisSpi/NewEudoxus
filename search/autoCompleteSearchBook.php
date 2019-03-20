<?php

// Get search term
$searchTerm = $_GET['term'];

// Generate skills data array
$suggestedTitles = array();

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/db_login/login_db.php";
include $path;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!$conn->set_charset("utf8")) {
    // printf("Error loading character set utf8: %s<br>", $conn->error);
    exit();
} else {
    // printf("Current character set: %s<br>", $conn->character_set_name());
}

$sql = ("SELECT * FROM Books b WHERE LOWER(b.Name) LIKE LOWER('%$searchTerm%')");

$result = $conn->query($sql);
$rows = $result->num_rows;

for ($i=0; $i < $rows; $i++) {
    $row = $result->fetch_assoc();
    $data['id'] = $row['Name'];
    $data['value'] = $row['Name'];
	array_push($suggestedTitles, $data);
}

// Return results as json encoded array
echo json_encode($suggestedTitles);

?>
