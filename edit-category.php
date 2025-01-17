<?php
include_once 'components/database.php';

$title = 'Dashboard';

$query = "SELECT * FROM categories where id = ". $_GET['id'];
$result = mysqli_query($connection, $query);
$category = mysqli_fetch_assoc($result);

ob_start();
include 'pages/categories/edit-category.php';
$content = ob_get_clean(); // Store the captured output into $content


include 'layouts/master.php';