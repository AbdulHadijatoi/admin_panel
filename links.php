<?php
include_once 'components/database.php';

$query = "SELECT * FROM links ORDER BY id DESC";
$result = mysqli_query($connection, $query);
$links = [];
while ($row = mysqli_fetch_assoc($result)) {
    $links[] = $row;
}

$query2 = "SELECT id, category_name FROM categories ORDER BY id DESC";
$result2 = mysqli_query($connection, $query2);
$categories = [];
while ($row = mysqli_fetch_assoc($result2)) {
    $categories[] = $row;
}
// var_dump($categories);
// exit;
$title = 'Links';
ob_start();
include 'pages/links/links.php';
$content = ob_get_clean(); // Store the captured output into $content


include 'layouts/master.php';