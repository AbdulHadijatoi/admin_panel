<?php
include_once 'components/database.php';

$query = "SELECT * FROM categories";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}
// var_dump($categories);
// exit;
$title = 'Dashboard';
ob_start();
include 'pages/categories/categories.php';
$content = ob_get_clean(); // Store the captured output into $content


include 'layouts/master.php';