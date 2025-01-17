<!-- Page Content -->
<div class="content">
    <!-- Floating Labels -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Category</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="controllers/categories.php" method="POST">
                
                <div class="row d-flex justify-content-center pt-4 px-4">
                    
                    <input type="hidden" name="id" value="<?php echo $category['id'];?>" >

                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category name" value="<?php echo $category['category_name']; ?>">
                            <label for="category_name">Category Name</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="category_image" name="category_image" value="<?php echo $category['category_image']; ?>" placeholder="Image URL">
                            <label for="category_image">Image Url</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="category_status" name="category_status" value="<?php echo $category['category_status']; ?>" placeholder="Status">
                            <label for="category_status">Status</label>
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