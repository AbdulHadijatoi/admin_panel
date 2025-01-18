<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Links List</h3>
            <div class="block-options">
                <a href="add-link.php" type="button" class="btn btn-primary">
                    <i class="si si-plus"></i> Create New
                </a>
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Channel Description</th>
                            <th>Channel Type</th>
                            <th>Status</th>
                            <th>Video URL</th>
                            <th>Date</th>
                            <th>Match Timer</th>
                            <th>Schedule Status</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Create a mapping of category_id to category_name
                        $categoryMap = [];
                        foreach ($categories as $category) {
                            $categoryMap[$category['id']] = $category['category_name'];
                        }

                        // Display links data
                        foreach ($links as $link) { 
                        ?>
                            <tr>
                                <td><?php echo $categoryMap[$link['category_id']] ?? 'Unknown'; ?></td>
                                <td><?php echo htmlspecialchars($link['channel_description']); ?></td>
                                <td><?php echo htmlspecialchars($link['channel_type'] ?? 'N/A'); ?></td>
                                <td><?php echo $link['channel_status'] ? 'Active' : 'Inactive'; ?></td>
                                <td>
                                    <a href="<?php echo htmlspecialchars($link['video_url']); ?>" target="_blank">
                                        View Video
                                    </a>
                                </td>
                                <td><?php echo htmlspecialchars($link['date'] ?? 'N/A'); ?></td>
                                <td><?php echo htmlspecialchars($link['matchtimer'] ?? 'N/A'); ?></td>
                                <td><?php echo $link['tvScheduleStatus'] ? 'Scheduled' : 'Not Scheduled'; ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?php echo 'edit-link.php?id=' . $link['id']; ?>" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-alt-secondary delete-link" data-id="<?php echo $link['id']; ?>" data-bs-toggle="tooltip" title="Delete">
                                            <i class="fa fa-fw fa-times"></i>
                                        </a>
                                        <a href="<?php echo 'controllers/links.php?status=action&id='.$link['id']; ?>" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Update Status">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Attach event listeners to delete buttons
        const deleteButtons = document.querySelectorAll('.delete-link');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // Prevent default behavior

                // Confirm the action
                const confirmed = confirm("Are you sure you want to delete this link?");
                if (confirmed) {
                    const id = this.getAttribute('data-id');
                    window.location.href = `controllers/links.php?delete=action&id=${id}`;
                }
            });
        });
    });
</script>
