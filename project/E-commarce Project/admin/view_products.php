<?php
include 'dbConfig.php';
error_reporting(0);

// Check if ID is passed
if (!isset($_GET['id'])) {
    echo "No product selected.";
    exit;
}

$product_id = (int)base64_decode(urldecode($_GET['id']));

// Fetch product
$stmt = $DB_con->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "Product not found!";
    exit;
}

// Fetch attributes
$attrStmt = $DB_con->prepare("SELECT sizes, colors FROM attributes WHERE product_id = ?");
$attrStmt->execute([$product_id]);
$attributes = $attrStmt->fetch(PDO::FETCH_ASSOC);

// Fetch category name
$category = 'N/A';
if (!empty($product['category_id'])) {
    $catStmt = $DB_con->prepare("SELECT category_name FROM categories WHERE id = ?");
    $catStmt->execute([$product['category_id']]);
    $category = $catStmt->fetchColumn();
}

$colorArray = explode(',', $attributes['colors'] ?? '');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" />
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            margin: 30px auto;
        }
        .thumbnail-img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }
        .color-box {
            display: inline-block;
            width: 25px;
            height: 25px;
            margin: 0 3px;
            border: 1px solid #333;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <img src="uploads/<?php echo htmlspecialchars($product['product_image']); ?>" class="thumbnail-img" alt="Product Image">

        <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
        <p><strong>Stock:</strong> <?php echo (int)$product['stock_amount']; ?></p>
        <p><strong>Unit Price:</strong> <?php echo (int)$product['unit_price']; ?> ৳</p>
        <p><strong>Selling Price:</strong> <?php echo (int)$product['selling_price']; ?> ৳</p>
        <p><strong>Category:</strong> <?php echo htmlspecialchars($category); ?></p>
        <p><strong>Size(s):</strong> <?php echo htmlspecialchars($attributes['sizes'] ?? 'N/A'); ?></p>
        <p><strong>Colors:</strong> 
            <?php if (!empty($colorArray[0])): ?>
                <?php foreach ($colorArray as $color): ?>
                    <span class="color-box" style="background-color: <?php echo htmlspecialchars($color); ?>;" title="<?php echo $color; ?>"></span>
                <?php endforeach; ?>
            <?php else: ?>
                N/A
            <?php endif; ?>
        </p>
        <a href="?page=pro
