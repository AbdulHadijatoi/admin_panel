<?php
include_once 'components/database.php';

$query = "SELECT * FROM app_config ORDER BY id DESC";
$result = mysqli_query($connection, $query);
$apps = [];
while ($row = mysqli_fetch_assoc($result)) {
    $apps[] = $row;
}

$title = 'Apps';
ob_start();
include 'pages/apps/apps.php';
$content = ob_get_clean(); // Store the captured output into $content


include 'layouts/master.php';