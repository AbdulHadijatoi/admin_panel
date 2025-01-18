<?php
include_once 'components/database.php';

$title = 'Edit Link';

// Fetch link data based on the ID
$query = "SELECT * FROM links WHERE id = ". $_GET['id'];
$result = mysqli_query($connection, $query);
$link = mysqli_fetch_assoc($result);

// Fetch associated link details
$query2 = "SELECT * FROM link_details WHERE link_id = ". $_GET['id'];
$result2 = mysqli_query($connection, $query2);
$link_details = [];
while ($row = mysqli_fetch_assoc($result2)) {
    $link_details[] = $row;
}

// Fetch categories for the dropdown
$query3 = "SELECT id, category_name FROM categories";
$result3 = mysqli_query($connection, $query3);
$categories = [];
while ($row = mysqli_fetch_assoc($result3)) {
    $categories[] = $row;
}

// Pass data to the view (edit link page)
ob_start();
include 'pages/links/edit-link.php';
$content = ob_get_clean(); // Store the captured output into $content

// Include layout master
include 'layouts/master.php';
?>
