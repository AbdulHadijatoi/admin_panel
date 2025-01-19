<?php
include_once 'components/database.php';

$title = 'Dashboard';

// Fetch Links Count
$queryLinksCount = "SELECT COUNT(*) AS links_count FROM links";
$resultLinksCount = mysqli_query($connection, $queryLinksCount);
$linksCount = mysqli_fetch_assoc($resultLinksCount)['links_count'];

// Fetch Categories Count
$queryCategoriesCount = "SELECT COUNT(*) AS category_count FROM categories";
$resultCategoriesCount = mysqli_query($connection, $queryCategoriesCount);
$categoryCount = mysqli_fetch_assoc($resultCategoriesCount)['category_count'];

ob_start();
include 'pages/dashboard.php';
$content = ob_get_clean(); // Store the captured output into $content


include 'layouts/master.php';