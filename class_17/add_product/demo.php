<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
    
</head>
<body>
    <div class="container my-5 p-4 shadow-lg rounded bg-light">
    <h3 class="text-center mb-4 text-primary">🛒 Add a New Product</h3>
    
    <!-- Success message -->
    <?php if (isset($return_msg)) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $return_msg ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form class="row g-3" action="" method="post" enctype="multipart/form-data">

        <div class="col-md-6">
            <label class="form-label fw-bold">Product Name</label>
            <input type="text" class="form-control" name="p_name" placeholder="Enter Product Name" required>
        </div>

        <div class="col-md-6">
            <label class="form-label fw-bold">Upload Image</label>
            <input type="file" class="form-control" name="std_img" required>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Product Stock</label>
            <input type="number" class="form-control" name="p_stock" placeholder="Available stock" required>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Product Prices</label>
            <input type="number" class="form-control" name="p_price" placeholder="Enter price" required>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Product Category</label>
            <input type="text" class="form-control" name="p_category" placeholder="e.g. Electronics" required>
        </div>

        <div class="col-md-6">
            <label class="form-label fw-bold">Category ID</label>
            <input type="number" class="form-control" name="p_category_id" placeholder="Enter category ID" required>
        </div>

        <div class="col-12 text-center mt-4">
            <button type="submit" name="add_info" class="btn btn-success px-5 py-2 fw-bold shadow">➕ Add Product</button>
        </div>
    </form>
</div>

<!-- js -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>