<?php

include_once 'components/database.php';


$title = 'Add Link';


$query2 = "SELECT id, category_name FROM categories";
$result2 = mysqli_query($connection, $query2);
$categories = [];
while ($row = mysqli_fetch_assoc($result2)) {
    $categories[] = $row;
}

ob_start();
include 'pages/links/add-link.php';
$content = ob_get_clean(); // Store the captured output into $content


include 'layouts/master.php';