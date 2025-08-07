<?php
include 'dbConfig.php';

if (isset($_POST['id'])) {
    $product_id = (int)base64_decode($_POST['id']);

    $stmt = $DB_con->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    $attrStmt = $DB_con->prepare("SELECT sizes, colors FROM attributes WHERE product_id = ?");
    $attrStmt->execute([$product_id]);
    $attributes = $attrStmt->fetch(PDO::FETCH_ASSOC);

    $cat = 'N/A';
    if (!empty($product['category_id'])) {
        $catStmt = $DB_con->prepare("SELECT category_name FROM categories WHERE id = ?");
        $catStmt->execute([$product['category_id']]);
        $cat = $catStmt->fetchColumn();
    }

    // HTML output for modal
    ?>
    <div class="text-center mb-3">
        <img src="uploads/<?php echo htmlspecialchars($product['product_image']); ?>" class="img-thumbnail" style="max-height: 200px;">
    </div>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($product['product_name']); ?></p>
    <p><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
    <p><strong>Stock:</strong> <?php echo $product['stock_amount']; ?></p>
    <p><strong>Unit Price:</strong> <?php echo $product['unit_price']; ?> ৳</p>
    <p><strong>Selling Price:</strong> <?php echo $product['selling_price']; ?> ৳</p>
    <p><strong>Category:</strong> <?php echo htmlspecialchars($cat); ?></p>
    <p><strong>Size(s):</strong> <?php echo htmlspecialchars($attributes['sizes'] ?? 'N/A'); ?></p>
    <p><strong>Colors:</strong>
        <?php
        $colors = explode(',', $attributes['colors'] ?? '');
        if ($colors[0]) {
            foreach ($colors as $color) {
                echo "<span style='display:inline-block;width:20px;height:20px;border:1px solid #000;background:$color;margin-right:5px;'></span>";
            }
        } else {
            echo 'N/A';
        }
        ?>
    </p>
    <?php
}
?>
