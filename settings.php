<?php

include_once 'components/database.php';

// Fetch the settings data
$query = "SELECT * FROM settings LIMIT 1";
$result = mysqli_query($connection, $query);
$settings = mysqli_fetch_assoc($result);

$title = 'Dashboard';


ob_start();
include 'pages/settings.php';
$content = ob_get_clean(); // Store the captured output into $content


include 'layouts/master.php';