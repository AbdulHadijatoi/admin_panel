<!-- Page Content -->
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Categories List</h3>
            <div class="block-options">
                <a href="add-category.php" type="button" class="btn btn-primary">
                    <i class="si si-plus"></i> Create New
                </a>
            </div>
        </div>
        <div class="block-content">
            
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">
                                Image
                            </th>
                            <th>
                                Name
                            </th>
                            <th style="width: 30%;">Status</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php foreach ($categories as $category) { ?>
                            <tr>
                                <td class="text-center">
                                    <img class="img-avatar img-avatar48" src="<?php echo $category['category_image']; ?>" alt="<?php echo $category['category_name']; ?>">
                                </td>
                                <td class="fw-semibold fs-sm">
                                    <a href="be_pages_generic_profile.html">
                                        <?php echo $category['category_name']; ?>
                                    </a>
                                </td>
                                <td class="fs-sm">
                                    <?php echo $category['category_status'] == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>'; ?>
                                </td>
                                
                                <td class="text-center">
                                    <div class="btn-group">

                                        <a href="<?php echo 'edit-category.php?id='.$category['id']; ?>" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-alt-secondary delete-category" data-id="<?php echo $category['id']; ?>" data-bs-toggle="tooltip" title="Delete">
                                            <i class="fa fa-fw fa-times"></i>
                                        </a>
                                        <a href="<?php echo 'controllers/categories.php?status=action&id='.$category['id']; ?>" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Update Status">
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
        const deleteButtons = document.querySelectorAll('.delete-category');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // Prevent the default link behavior

                // Confirm the action
                const confirmed = confirm("Are you sure you want to delete this category?");
                if (confirmed) {
                    const id = this.getAttribute('data-id');
                    window.location.href = `controllers/categories.php?delete=action&id=${id}`;
                }
            });
        });
    });
</script>
