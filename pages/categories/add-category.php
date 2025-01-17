<!-- Page Content -->
<div class="content">
    <!-- Floating Labels -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Add Category</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="controllers/categories.php" method="POST">
                
                <div class="row d-flex justify-content-center pt-4 px-4">
                    
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category name">
                            <label for="category_name">Category Name</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="image_url" name="image_url" placeholder="Image url">
                            <label for="image_url">Image Url</label>
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