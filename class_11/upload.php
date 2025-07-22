<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h1>Select Your Photograph</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Select Photograph:</label><br>
        <input type="file" name="upload" required><br><br>
        <input type="submit" value="Upload">
    </form>

    <?php
    if (isset($_FILES["upload"])) {
        $uploadf_dir = "upload";

        // Check if the folder exists
        if (!file_exists($uploadf_dir)) {
            mkdir($uploadf_dir, 0777, true);
        }

        $file_name = $_FILES["upload"]["name"];
        $file_type = $_FILES["upload"]["type"];
        $file_tmp = $_FILES["upload"]["tmp_name"];

        // Optional: Only allow image uploads
        if ($file_type == "image/jpg" || $file_type == "image/jpeg" || $file_type == "image/png") {
            $upload_path = $uploadf_dir . "/" . $file_name;

            if (move_uploaded_file($file_tmp, $upload_path)) {
                echo "<p style='color:green;'>File uploaded successfully!</p>";
                echo "<img src='$upload_path' alt='Uploaded Image' width='200'>";
            } else {
                echo "<p style='color:red;'>Failed to upload file.</p>";
            }
        } else {
            echo "<p style='color:red;'>Only JPG, JPEG, PNG files are allowed.</p>";
        }
    }
    ?>
</body>
</html>
