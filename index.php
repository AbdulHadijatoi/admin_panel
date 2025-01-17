<?php
$title = 'Dashboard';


ob_start();
include 'pages/dashboard.php';
$content = ob_get_clean(); // Store the captured output into $content


include 'layouts/master.php';