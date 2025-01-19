<?php
include_once 'components/database.php';

$title = 'Edit App';

$query = "SELECT * FROM app_config where id = ". $_GET['id'];
$result = mysqli_query($connection, $query);
$app = mysqli_fetch_assoc($result);

ob_start();
include 'pages/apps/edit-app.php';
$content = ob_get_clean(); // Store the captured output into $content


include 'layouts/master.php';