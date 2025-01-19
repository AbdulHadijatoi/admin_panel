<!-- Page Content -->
<div class="content">
    <!-- Floating Labels -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Add Link</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="controllers/links.php" method="POST">
                <div class="row d-flex justify-content-center pt-4 px-4">
                    <!-- Category Dropdown -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $cat) { ?>
                                    <option value="<?php echo $cat['id']; ?>">
                                        <?php echo $cat['category_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <label for="category_id">Category</label>
                        </div>
                    </div>

                    <!-- Channel Description -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <textarea class="form-control" id="channel_description" name="channel_description" placeholder="Channel Description"><?php echo isset($category['channel_description']) ? $category['channel_description'] : ''; ?></textarea>
                            <label for="channel_description">Channel Description</label>
                        </div>
                    </div>

                    <!-- Channel Type -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="channel_type" name="channel_type" placeholder="Channel Type" value="<?php echo isset($category['channel_type']) ? $category['channel_type'] : ''; ?>">
                            <label for="channel_type">Channel Type</label>
                        </div>
                    </div>

                    <!-- Video URL -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="video_url" name="video_url" placeholder="Video URL" value="<?php echo isset($category['video_url']) ? $category['video_url'] : ''; ?>">
                            <label for="video_url">Video URL</label>
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="date" class="form-control" id="date" name="date" placeholder="Date" value="<?php echo isset($category['date']) ? $category['date'] : ''; ?>">
                            <label for="date">Date</label>
                        </div>
                    </div>

                    <!-- Match Timer -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="time" class="form-control" id="matchtimer" name="matchtimer" placeholder="Match Timer" >
                            <label for="matchtimer">Match Timer</label>
                        </div>
                    </div>


                    <!-- Channel Status -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <select class="form-control" id="channel_status" name="channel_status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <label for="channel_status">Channel Status</label>
                        </div>
                    </div>

                    <!-- TV Schedule Status -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <select class="form-control" id="tvScheduleStatus" name="tvScheduleStatus">
                                <option value="1" <?php echo (isset($category['tvScheduleStatus']) && $category['tvScheduleStatus'] == 1) ? 'selected' : ''; ?>>Scheduled</option>
                                <option value="0" <?php echo (isset($category['tvScheduleStatus']) && $category['tvScheduleStatus'] == 0) ? 'selected' : ''; ?>>Not Scheduled</option>
                            </select>
                            <label for="tvScheduleStatus">TV Schedule Status</label>
                        </div>
                    </div>

                    <!-- Repeatable Link Details -->
                    <div id="link-details-container">
                        <h4>Link Details</h4>
                        <div class="link-details">
                            <div class="row">
                                <!-- Same fields as the previous code for adding link details dynamically -->
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center mb-4">
                        <button type="button" class="btn btn-primary add-link-detail">Add Link Detail</button>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" name="store" class="btn btn-success">Save Link</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Add/Remove Link Details -->
<script>
    // Add new link detail row
document.querySelector('.add-link-detail').addEventListener('click', function () {
    const container = document.getElementById('link-details-container');
    const rowCount = container.querySelectorAll('.link-details').length; // Count existing rows
    const newRow = document.createElement('div');
    newRow.classList.add('link-details');
    newRow.innerHTML = `
        <div class="link-detail mb-4">
            <div class="row">
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="link_details[${rowCount}][channel_name]" placeholder="Channel Name">
                        <label for="channel_name">Link Name</label>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="link_details[${rowCount}][channel_image]" placeholder="Channel Image">
                        <label for="channel_image">Link Image</label>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="link_details[${rowCount}][channel_url]" placeholder="Channel URL">
                        <label for="channel_url">Link URL</label>
                    </div>
                </div>
               
                <div class="col-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="link_details[${rowCount}][user_agent]" placeholder="User Agent">
                        <label for="user_agent">User Agent</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="link_details[${rowCount}][cookie]" placeholder="Cookie">
                        <label for="cookie">Cookie</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="link_details[${rowCount}][referer]" placeholder="Referer">
                        <label for="referer">Referer</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-floating">
                        <select class="form-control" name="link_details[${rowCount}][button_status]" id="button_status">
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                        <label for="button_status">Button Status</label>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="link_details[${rowCount}][origin]" placeholder="Origin">
                        <label for="origin">Origin</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="link_details[${rowCount}][link_type]" placeholder="Link Type">
                        <label for="link_type">Link Type</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="link_details[${rowCount}][token]" placeholder="Token">
                        <label for="token">Token</label>
                    </div>
                </div>
                <div class="col-2 text-left mt-3">
                    <button type="button" class="btn btn-danger remove-link-detail" onclick="removeLinkDetail(this)">Remove</button>
                </div>
            </div>
        </div>
    `;
    container.appendChild(newRow);
});

// Remove a link detail row
document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('remove-link-detail')) {
        const linkDetail = e.target.closest('.link-details');
        linkDetail.remove();
    }
});

</script>
