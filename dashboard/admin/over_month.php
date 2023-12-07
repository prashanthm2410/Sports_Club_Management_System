<?php
require '../../include/db_conn.php';

$month = $_GET['mm'];
$year = $_GET['yy'];
$flag = $_GET['flag'];

$query = "";

if ($flag == 0) {
    $query = "SELECT * FROM users u INNER JOIN address a ON u.userid = a.id WHERE u.joining_date LIKE '$year-$month%'";
} else if ($flag == 1) {
    $query = "SELECT * FROM users u INNER JOIN address a ON u.userid = a.id WHERE u.joining_date LIKE '$year%'";
}

$result = mysqli_query($con, $query);

if (!$result) {
    die('Error: ' . mysqli_error($con));
}

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>
