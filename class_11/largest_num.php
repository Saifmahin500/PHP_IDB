<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find the Largest Number</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Enter numbers (comma separated):</label>
        <input type="text" name="number" placeholder="e.g. 12, 45, 78, 3">
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $number = $_POST['number'];
        $numArray = array_map('trim', explode(',', $number));
        $numArray = array_filter($numArray, "is_numeric");

        if (!empty($numArray)) {
            $largest = $numArray[0];

            foreach ($numArray as $num) {
                if ($num > $largest) {
                    $largest = $num;
                }
            }

            echo "<p><strong>The largest number is:</strong> " . $largest . "</p>";
        } else {
            echo "<p style='color:red;'>Please enter valid numbers.</p>";
        }
    }
    ?>
</body>
</html>
