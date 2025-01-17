<?php

include_once 'components/database.php';


$title = 'Dashboard';


ob_start();
include 'pages/categories/add-category.php';
$content = ob_get_clean(); // Store the captured output into $content


include 'layouts/master.php';