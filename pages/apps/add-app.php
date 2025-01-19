<!-- Page Content -->
<div class="content">
    <!-- Floating Labels -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Add App</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="controllers/apps.php" method="POST">
                
                <div class="row d-flex justify-content-center pt-4 px-4">
                    
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Category name">
                            <label for="package_name">Package Name</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="server_key" name="server_key" placeholder="Category name">
                            <label for="server_key">Server Key</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="server_url" name="server_url" placeholder="Category name">
                            <label for="server_url">Server Url</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="api_key" name="api_key" placeholder="Category name">
                            <label for="api_key">API Key</label>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-4">
                                <select class="form-control" id="status" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <label for="status">Status</label>
                            </div>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="redirect_url" name="redirect_url" placeholder="Category name">
                            <label for="redirect_url">Redirect Url</label>
                        </div>
                        <div class="form-floating mb-4">
                            <button type="submit" name="store" class="btn btn-primary">
                                Create
                            </button>
                        </div>
                    </div>
                    
                </div>

            </form>
        </div>

        
    </div>
    <!-- END Floating Labels -->
</div>