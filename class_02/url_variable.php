<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parameter Passing in URL</title>
</head>
<body>
    <?php
        $cat = "Product";
        $subcat = "cloths";
        $srch = "Shirts";
        $next = 10;

        echo "<a href ='url_values.php?choice=search&cat=$cat&subcat=$subcat&srch=$srch
        &page=$next'>Click Me
        </a>";
    ?>
</body>
</html>