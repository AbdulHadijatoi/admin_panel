<?php
session_start();
if(isset($_SESSION['user_id'])) {
  header('location: index.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Login</title>

    <!-- Icons -->
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="assets/css/oneui.min.css">

  </head>
  <body>
   
    <div id="page-container">

      <!-- Main Container -->
      <main id="main-container">

        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('assets/media/photos/photo28@2x.jpg');">
          <div class="row g-0 bg-primary-dark-op">
            

            <!-- Main Section -->
            <div class="hero-static col-lg-12 d-flex flex-column align-items-center bg-body-light">
              <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
                <div class="w-100">
                  <!-- Header -->
                  <div class="text-center mb-5">
                    <h1 class="fw-bold mb-2">
                      Log In
                    </h1>
                    <p class="fw-medium text-muted">
                      Welcome, please enter your username and password.
                    </p>
                  </div>
                  <!-- END Header -->
                  

                  <div class="row g-0 justify-content-center">
                    <div class="col-sm-8 col-xl-3">
                      <form action="controllers/auth.php" class="js-validation-signin" method="POST">
                        <div class="mb-4">
                          <input type="text" class="form-control form-control-lg form-control-alt py-3" id="email" name="email" placeholder="Email address">
                        </div>
                        <div class="mb-4">
                          <input type="password" class="form-control form-control-lg form-control-alt py-3" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="d-flex justify-content-end align-items-center mb-4">
                            <button type="submit" name="login_action" class="btn btn-lg btn-alt-primary">
                              <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Log In
                            </button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- END Sign In Form -->
                </div>
              </div>
            </div>
            <!-- END Main Section -->
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
     
    <script src="assets/js/oneui.app.min.js"></script>
    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <!-- Page JS Code -->
    <script src="assets/js/pages/op_auth_signin.min.js"></script>
    
  </body>
</html>
