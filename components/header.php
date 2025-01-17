      <!-- Header -->
      <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
          <!-- Left Section -->
          <div class="d-flex align-items-center">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
              <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Toggle Mini Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
              <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Mini Sidebar -->

            <!-- Extra -->
          <div>
            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="dark_mode_toggle">
              <i class="far fa-moon"></i>
            </button>
            <!-- END Dark Mode -->

          </div>
          <!-- END Extra -->

          </div>
          <!-- END Left Section -->

          <!-- Right Section -->
          <div class="d-flex align-items-center">
            <!-- **User Name -->
            <div class="dropdown d-inline-block ms-2">
              <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle" src="assets/media/avatars/avatar10.jpg" alt="Header Avatar" style="width: 21px;">
                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/media/avatars/avatar10.jpg" alt="">
                  <p class="mt-2 mb-0 fw-medium"><?php echo $_SESSION['user']['firstname'].' '. $_SESSION['user']['lastname']; ?></p>
                  <!-- <p class="mb-0 text-muted fs-sm fw-medium">Web Developer</p> -->
                </div>
                <div role="separator" class="dropdown-divider m-0"></div>
                <div class="p-2">
                  <!-- **Logout -->
                  <form method="post" action="controllers/auth.php">
                    <button type="submit" name="logout_action" class="dropdown-item d-flex align-items-center justify-content-between">
                      <span class="fs-sm fw-medium">Log Out</span>
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <!-- END User Dropdown -->

          </div>
          <!-- END Right Section -->
        </div>
        <!-- END Header Content -->
       
      </header>
      <!-- END Header -->