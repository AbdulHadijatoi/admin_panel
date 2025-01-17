<?php
$title = 'Dashboard';

ob_start();
include 'pages/links/links.php';
$content = ob_get_clean();


include 'layouts/master.php';