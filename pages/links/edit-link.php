<!-- Page Content -->
<div class="content">
    <!-- Floating Labels -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Link</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="controllers/links.php" method="POST">
                <div class="row d-flex justify-content-center pt-4 px-4">
                    <!-- Hidden ID Field -->
                    <input type="hidden" name="id" value="<?php echo $link['id']; ?>" >

                    <!-- Category Dropdown -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $cat) { ?>
                                    <option value="<?php echo $cat['id']; ?>" 
                                        <?php echo ($link['category_id'] == $cat['id']) ? 'selected' : ''; ?>>
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
                            <textarea class="form-control" id="channel_description" name="channel_description" placeholder="Channel Description"><?php echo $link['channel_description']; ?></textarea>
                            <label for="channel_description">Channel Description</label>
                        </div>
                    </div>

                    <!-- Channel Type -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="channel_type" name="channel_type" placeholder="Channel Type" value="<?php echo $link['channel_type']; ?>">
                            <label for="channel_type">Channel Type</label>
                        </div>
                    </div>

                    <!-- Video URL -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="video_url" name="video_url" placeholder="Video URL" value="<?php echo $link['video_url']; ?>">
                            <label for="video_url">Video URL</label>
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="date" 
                                class="form-control" 
                                id="date" 
                                name="date" 
                                placeholder="Date" 
                                value="<?php echo isset($link['date']) ? date('Y-m-d', strtotime($link['date'])) : ''; ?>">
                            <label for="date">Date</label>
                        </div>
                    </div>

                    <!-- Match Timer -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="time" class="form-control" id="matchtimer" name="matchtimer" placeholder="Match Timer" value="<?php echo $link['matchtimer']; ?>">
                            <label for="matchtimer">Match Timer</label>
                        </div>
                    </div>

                    <!-- Channel Status -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <select class="form-control" id="channel_status" name="channel_status">
                                <option value="1" <?php echo ($link['channel_status'] == 1) ? 'selected' : ''; ?>>Active</option>
                                <option value="0" <?php echo ($link['channel_status'] == 0) ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                            <label for="channel_status">Channel Status</label>
                        </div>
                    </div>

                    <!-- TV Schedule Status -->
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <select class="form-control" id="tvScheduleStatus" name="tvScheduleStatus">
                                <option value="1" <?php echo ($link['tvScheduleStatus'] == 1) ? 'selected' : ''; ?>>Scheduled</option>
                                <option value="0" <?php echo ($link['tvScheduleStatus'] == 0) ? 'selected' : ''; ?>>Not Scheduled</option>
                            </select>
                            <label for="tvScheduleStatus">TV Schedule Status</label>
                        </div>
                    </div>

                    <!-- Link Details (Repeatable Fields) -->
                    <div class="col-12">
                        <h4>Link Details</h4>
                        <div id="link-details-container">
                            <?php foreach ($link_details as $index => $detail) { ?>
                                <div class="link-detail mb-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="link_details[<?php echo $index; ?>][channel_name]" placeholder="Link Name" value="<?php echo $detail['channel_name']; ?>">
                                                <label for="channel_name">Link Name</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="link_details[<?php echo $index; ?>][channel_image]" placeholder="Link Image" value="<?php echo $detail['channel_image']; ?>">
                                                <label for="channel_image">Link Image</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="link_details[<?php echo $index; ?>][channel_url]" placeholder="Link URL" value="<?php echo $detail['channel_url']; ?>">
                                                <label for="channel_url">Link URL</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="link_details[<?php echo $index; ?>][user_agent]" placeholder="User Agent" value="<?php echo $detail['user_agent']; ?>">
                                                <label for="user_agent">User Agent</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="link_details[<?php echo $index; ?>][cookie]" placeholder="Cookie" value="<?php echo $detail['cookie']; ?>">
                                                <label for="cookie">Cookie</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-floating">
                                                <select class="form-control" name="link_details[<?php echo $index; ?>][button_status]" id="button_status">
                                                <option value="1" <?php echo ($detail['button_status'] == 1) ? 'selected' : ''; ?>>Active</option>
                                                <option value="0" <?php echo ($detail['button_status'] == 0) ? 'selected' : ''; ?>>Inactive</option>
                                                </select>
                                                <label for="button_status">Button Status</label>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="link_details[<?php echo $index; ?>][referer]" placeholder="Referer" value="<?php echo $detail['referer']; ?>">
                                                <label for="referer">Referer</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="link_details[<?php echo $index; ?>][origin]" placeholder="Origin" value="<?php echo $detail['origin']; ?>">
                                                <label for="origin">Origin</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="link_details[<?php echo $index; ?>][link_type]" placeholder="Link Type" value="<?php echo $detail['link_type']; ?>">
                                                <label for="link_type">Link Type</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="link_details[<?php echo $index; ?>][token]" placeholder="Token" value="<?php echo $detail['token']; ?>">
                                                <label for="token">Token</label>
                                            </div>
                                        </div>
                                        <div class="col-2 text-left mt-3">
                                            <button type="button" class="btn btn-danger remove-link-detail" onclick="removeLinkDetail(this)">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <button type="button" class="btn btn-success" id="add-link-detail">Add Link Detail</button>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 text-center">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Floating Labels -->
</div>

<script>
    document.getElementById('add-link-detail').addEventListener('click', function() {
        let index = document.querySelectorAll('.link-detail').length;
        let linkDetailHTML = `
            <div class="link-detail mb-4">
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="link_details[${index}][channel_name]" placeholder="Channel Name">
                            <label for="channel_name">Link Name</label>
                        </div>
                    </div>
                    

                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="link_details[${index}][channel_image]" placeholder="Channel Image">
                            <label for="channel_image">Link Image</label>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="link_details[${index}][channel_url]" placeholder="Channel URL">
                            <label for="channel_url">Link URL</label>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="link_details[${index}][user_agent]" placeholder="User Agent">
                            <label for="user_agent">User Agent</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="link_details[${index}][cookie]" placeholder="Cookie">
                            <label for="cookie">Cookie</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="link_details[${index}][referer]" placeholder="Referer">
                            <label for="referer">Referer</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <select class="form-control" name="link_details[${index}][button_status]" id="button_status">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                            <label for="button_status">Button Status</label>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="link_details[${index}][origin]" placeholder="Origin">
                            <label for="origin">Origin</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="link_details[${index}][link_type]" placeholder="Link Type">
                            <label for="link_type">Link Type</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="link_details[${index}][token]" placeholder="Token">
                            <label for="token">Token</label>
                        </div>
                    </div>
                    <div class="col-2 text-left mt-3">
                        <button type="button" class="btn btn-danger remove-link-detail" onclick="removeLinkDetail(this)">Remove</button>
                    </div>
                </div>
            </div>
        `;
        document.getElementById('link-details-container').insertAdjacentHTML('beforeend', linkDetailHTML);
    });

    function removeLinkDetail(button) {
        button.closest('.link-detail').remove();
    }
</script>
