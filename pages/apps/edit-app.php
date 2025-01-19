<!-- Page Content -->
<div class="content">
    <!-- Floating Labels -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit App</h3>
        </div>
        <div class="block-content block-content-full">
           
            <form action="controllers/apps.php" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($app['id']); ?>"> <!-- Hidden field for app ID -->

                <div class="row d-flex justify-content-center pt-4 px-4">
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="package_name" name="package_name" 
                                   value="<?php echo htmlspecialchars($app['package_name']); ?>" placeholder="Package Name">
                            <label for="package_name">Package Name</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="server_key" name="server_key" 
                                   value="<?php echo htmlspecialchars($app['server_key']); ?>" placeholder="Server Key">
                            <label for="server_key">Server Key</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="server_url" name="server_url" 
                                   value="<?php echo htmlspecialchars($app['server_url']); ?>" placeholder="Server URL">
                            <label for="server_url">Server URL</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="api_key" name="api_key" 
                                   value="<?php echo htmlspecialchars($app['api_key']); ?>" placeholder="API Key">
                            <label for="api_key">API Key</label>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-4">
                                <select class="form-control" id="status" name="status">
                                    <option value="1" <?php echo $app['status'] == 1 ? 'selected' : ''; ?>>Active</option>
                                    <option value="0" <?php echo $app['status'] == 0 ? 'selected' : ''; ?>>Inactive</option>
                                </select>
                                <label for="status">Status</label>
                            </div>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="redirect_url" name="redirect_url" 
                                   value="<?php echo htmlspecialchars($app['redirect_url']); ?>" placeholder="Redirect URL">
                            <label for="redirect_url">Redirect URL</label>
                        </div>
                        <div class="form-floating mb-4">
                            <button type="submit" name="update" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Floating Labels -->
</div>
