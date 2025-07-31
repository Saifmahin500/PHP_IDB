
<?php

include("function.php");

$objCrudAdmin = new CrudApp();

if (isset($_POST["add_info"])) {
    $return_msg = $objCrudAdmin->add_data($_POST);
    header("Location: index.php");
    exit();
}


$students = $objCrudAdmin->display_data();


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Add Product</title>
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
            <label class="form-label fw-bold">Product Price</label>
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

    <!-- <div class="container my-4 p-4 shadow">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PRODUCT NAME</th>
                    <th>PRODUCT IMAGE</th>
                    <th>STOCK</th>
                    <th>PRICE</th>
                    <th>category</th>
                    <th>category ID</th>
                    <th>ADD DATE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($students)) {  ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['std_name']; ?></td>
                        <td><?php echo $row['std_roll']; ?></td>
                        <td><img src="upload/<?php echo $row['std_img']; ?>" width="50"></td>
                        <td>
                            <a class="btn btn-success" href="#">Edit</a>
                            <a class="btn btn-warning" href="#">Delete</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>

        </table>


    </div> -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>
