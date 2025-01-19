<!-- Page Content -->
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Apps List</h3>
            <div class="block-options">
                <a href="add-app.php" type="button" class="btn btn-primary">
                    <i class="si si-plus"></i> Create New
                </a>
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>Server Key</th>
                            <th>Server URL</th>
                            <th>API Key</th>
                            <th>Status</th>
                            <th>Redirect URL</th>
                            <th class="text-center" style="width: 150px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($apps as $app) { ?>
                            <tr>
                                <td class="fw-semibold fs-sm">
                                    <?php echo $app['package_name']; ?>
                                </td>
                                <td class="fs-sm">
                                    <?php echo $app['server_key']; ?>
                                </td>
                                <td class="fs-sm">
                                    <?php echo $app['server_url']; ?>
                                </td>
                                <td class="fs-sm">
                                    <?php echo $app['api_key']; ?>
                                </td>
                                <td class="fs-sm">
                                    <?php echo $app['status'] == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>'; ?>
                                </td>
                                <td class="fs-sm">
                                    <?php echo $app['redirect_url']; ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?php echo 'edit-app.php?id='.$app['id']; ?>" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-alt-secondary delete-app" data-id="<?php echo $app['id']; ?>" data-bs-toggle="tooltip" title="Delete">
                                            <i class="fa fa-fw fa-times"></i>
                                        </a>
                                        <a href="<?php echo 'controllers/apps.php?status=action&id='.$app['id']; ?>" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Update Status">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Attach event listeners to delete buttons
        const deleteButtons = document.querySelectorAll('.delete-app');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // Prevent the default link behavior

                // Confirm the action
                const confirmed = confirm("Are you sure you want to delete this app?");
                if (confirmed) {
                    const id = this.getAttribute('data-id');
                    window.location.href = `controllers/apps.php?delete=action&id=${id}`;
                }
            });
        });
    });
</script>
