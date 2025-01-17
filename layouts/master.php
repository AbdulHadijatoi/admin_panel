<?php

require_once "components/database.php";

if(!isset($_SESSION['user_id'])) {
  header('location: login.php');
  die();
}else{
  $id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM users WHERE id='$id'";
  $result = mysqli_query($connection, $query);
  $user =  mysqli_fetch_assoc($result);
  // firstname
  // lastname
  // username
  // email
  // password
  // avatar
  // is_admin
  // var_dump(.substr($user['lastname'],0,1));
  // exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title><?= $title ?? 'Admin Panel'; ?></title>

    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="assets/css/oneui.min.css">
</head>
<body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow page-header-dark dark-mode">
      <!-- Side Overlay-->
      <aside id="side-overlay">
        <!-- Side Header -->
        <div class="content-header border-bottom">
          <!-- User Avatar -->
          <a class="img-link me-1" href="javascript:void(0)">
            <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar10.jpg" alt="">
          </a>
          <!-- END User Avatar -->

          <!-- **User Name -->
          <div class="ms-2">
            <a class="text-dark fw-semibold fs-sm" href="javascript:void(0)">John Smith</a>
          </div>
          <!-- END User Info -->

          <!-- Close Side Overlay -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <a class="ms-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
            <i class="fa fa-fw fa-times"></i>
          </a>
          <!-- END Close Side Overlay -->
        </div>
      </aside>
      <!-- END Side Overlay -->

        <!-- Sidebar -->
      <?php include 'components/sidebar.php'; ?>
      <!-- Header
      <?php include 'components/header.php'; ?> -->

        <main id="main-container">
            <?php echo $content; ?>
        </main>
    <!-- END Page Container -->
    </div>

    

    <script src="assets/js/oneui.app.min.js"></script>
    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/chart.js/Chart.min.js"></script>
    <!-- Page JS Code -->
    <script src="assets/js/pages/be_pages_dashboard.min.js"></script>
</body>
</html>
