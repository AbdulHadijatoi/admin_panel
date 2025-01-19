<?php

include_once 'components/database.php';


$title = 'Add App';


ob_start();
include 'pages/apps/add-app.php';
$content = ob_get_clean(); // Store the captured output into $content


include 'layouts/master.php';