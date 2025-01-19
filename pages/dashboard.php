<div class="content">
    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-2">
            Dashboard
            </h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
            Welcome <strong>John</strong>, everything looks great.
            </h2>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Overview -->
    <div class="row row-deck">

    <!-- Pending Orders -->
    <div class="col-sm-6 col-xxl-3">
        <div class="block block-rounded d-flex flex-column">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
            <dl class="mb-0">
            <dt class="fs-3 fw-bold"><?php echo $categoryCount??0; ?></dt>
            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Categories</dd>
            </dl>
            <div class="item item-rounded-lg bg-body-light">
            <i class="si si-grid fs-3 text-primary"></i>
            </div>
        </div>
        <div class="bg-body-light rounded-bottom">
            <a href="categories.php" class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
            <span>View all Categories</span>
            <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
            </a>
        </div>
        </div>
    </div>
    <!-- END Pending Orders -->

    <!-- New Customers -->
    <div class="col-sm-6 col-xxl-3">
        <div class="block block-rounded d-flex flex-column">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
            <dl class="mb-0">
            <dt class="fs-3 fw-bold"><?php echo $linksCount; ?></dt>
            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Links</dd>
            </dl>
            <div class="item item-rounded-lg bg-body-light">
            <i class="fa fa-link fs-3 text-primary"></i>
            </div>
        </div>
        <div class="bg-body-light rounded-bottom">
            <a href="links.php" class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                <span>View all Links</span>
                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
            </a>
        </div>
        </div>
    </div>
    <!-- END New Customers -->

    <div class="col-sm-6 col-xxl-3">
        <!-- Messages -->
        <div class="block block-rounded d-flex flex-column">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
            <dl class="mb-0">
            <!-- <dt class="fs-3 fw-bold">45</dt> -->
            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Settings</dd>
            </dl>
            <div class="item item-rounded-lg bg-body-light">
            <i class="si si-settings fs-3 text-primary"></i>
            </div>
        </div>
        <div class="bg-body-light rounded-bottom">
            <a href="settings.php" class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                <span>Key and Privacy Settings</span>
                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
            </a>
        </div>
        </div>
    </div>
    <!-- END Messages -->

    <div class="col-sm-6 col-xxl-3">
        <!-- Conversion Rate -->
        <div class="block block-rounded d-flex flex-column">
        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
            <dl class="mb-0">
            <!-- <dt class="fs-3 fw-bold">4.5%</dt> -->
            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Apps</dd>
            </dl>
            <div class="item item-rounded-lg bg-body-light">
            <i class="fa fa-th-list fs-3 text-primary"></i>
            </div>
        </div>
        <div class="bg-body-light rounded-bottom">
            <a href="apps.php" class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                <span>Apps and Redirect</span>
                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
            </a>
        </div>
        </div>
    </div>
    <!-- END Conversion Rate-->

    </div>
    <!-- END Overview -->
</div>