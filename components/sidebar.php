<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header">
        <!-- Logo -->
        <a class="fw-semibold text-dual" href="index.php">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">Admin<span class="fw-normal">Panel</span></span>
        </a>
        <!-- END Logo -->

        <!-- Close Sidebar, Visible only on mobile screens -->
        <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
            <i class="fa fa-fw fa-times"></i>
        </a>
        <!-- END Close Sidebar -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <?php
                function isActive($page) {
                    return strpos($_SERVER['REQUEST_URI'], $page) !== false ? 'active' : '';
                }
                ?>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= isActive('index.php') ?>" href="index.php">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-heading">Manage Data</li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= isActive('categor') ?>"  href="categories.php">
                        <i class="nav-main-link-icon si si-grid"></i>
                        <span class="nav-main-link-name">Categories</span>
                    </a>
                    
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= isActive('links') ?>"  href="links.php">
                        <i class="nav-main-link-icon fa fa-link"></i>
                        <span class="nav-main-link-name">Links</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= isActive('settings') ?>"  href="settings.php">
                        <i class="nav-main-link-icon si si-settings"></i>
                        <span class="nav-main-link-name">Settings</span>
                    </a>
                    
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= isActive('apps') ?>"  href="apps.php">
                        <i class="nav-main-link-icon fa fa-th-list"></i>
                        <span class="nav-main-link-name">Apps</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
