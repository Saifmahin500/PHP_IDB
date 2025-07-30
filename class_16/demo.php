<?php
// error_reporting(E_ALL); // ডেভলপমেন্টের সময় সব এরর দেখার জন্য এটি ব্যবহার করুন
ini_set('display_errors', 1); // এটিও এরর দেখানোর জন্য

// 1. ডেটাবেস কানেকশন
$mysqli = new mysqli("localhost","root","","online_course");

// কানেকশন ঠিক আছে কিনা পরীক্ষা করা
if ($mysqli->connect_errno) {
    // সমস্যা থাকলে বিস্তারিত এরর দেখানো (সঠিক ভ্যারিয়েবল ব্যবহার করে)
    die("Failed to connect to database server: " . $mysqli->connect_error);
}

$success_message = "";
$error_message = "";

// 2. ফর্ম সাবমিট হয়েছে কিনা পরীক্ষা করা
if (isset($_POST['submit'])) {
    
    // ফর্ম থেকে ডেটা সংগ্রহ
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $twitter = $_POST['twitter'];
    $web = $_POST['web'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $sex = $_POST['sex'] ?? ''; // হবি সিলেক্ট না করলে খালি স্ট্রিং

    // 3. হবি অ্যারে ঠিকভাবে হ্যান্ডেল করা
    $chk = "";
    if (!empty($_POST['hobbies']) && is_array($_POST['hobbies'])) {
        $checkbox = $_POST['hobbies'];
        $chk = implode(", ", $checkbox); // কমা দিয়ে হবিগুলোকে স্ট্রিং-এ পরিণত করা
    }

    // 4. ভ্যালিডেশন: প্রয়োজনীয় ফিল্ডগুলো খালি আছে কিনা পরীক্ষা করা
    if (empty($fname) || empty($lname) || empty($uname) || empty($email) || empty($sex)) {
        $error_message = "First Name, Last Name, Username, Email এবং Gender অবশ্যই পূরণ করতে হবে।";
    } else {
        // 5. Prepared Statement ব্যবহার করে ডেটাবেসে ইনসার্ট করা (নিরাপদ পদ্ধতি)
        $sql = "INSERT INTO authors(first_name, last_name, user_name, email, twitter, url, city, country, hobbies, sex) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // স্টেটমেন্ট প্রস্তুত করা
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            // ভ্যারিয়েবলগুলোকে স্টেটমেন্টের সাথে বাইন্ড করা
            // s = string, i = integer
            $stmt->bind_param("ssssssssss", $fname, $lname, $uname, $email, $twitter, $web, $city, $country, $chk, $sex);

            // স্টেটমেন্ট এক্সিকিউট করা
            if ($stmt->execute()) {
                $success_message = "Author Registered Successfully!";
            } else {
                // কেন ফেইল করলো তার বিস্তারিত কারণ দেখানো
                $error_message = "Failed to Register, Try Again. Error: " . $stmt->error;
            }
            // স্টেটমেন্ট বন্ধ করা
            $stmt->close();
        } else {
            $error_message = "Failed to prepare the statement. Error: " . $mysqli->error;
        }
    }
    // ডেটাবেস কানেকশন বন্ধ করা
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Author Registration Form</title>
    <style type="text/css">
        /* আগের CSS কোড এখানে পেস্ট করতে পারেন অথবা এটি ব্যবহার করতে পারেন */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 40px; }
        form { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 600px; margin: auto; }
        h2 { text-align: center; color: #333; }
        p { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type='text'], input[type='email'], input[type='url'] { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"], input[type="reset"] { background-color: #007BFF; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        input[type="reset"] { background-color: #6c757d; }
        .message { padding: 15px; margin-bottom: 20px; border-radius: 5px; text-align: center; color: white; }
        .success { background-color: #28a745; }
        .error { background-color: #dc3545; }
    </style>
</head>
<body>

    <h2>Register as an Author</h2>
    
    <?php if(!empty($success_message)): ?>
        <div class="message success"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <?php if(!empty($error_message)): ?>
        <div class="message error"><?php echo $error_message; ?></div>
    <?php endif; ?>


    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <p>
            <label>First Name:</label>
            <input type="text" name="fname" required>
        </p>
        <p>
            <label>Last Name</label>
            <input type="text" name="lname" required>
        </p>
        <p>
            <label>Username:</label>
            <input type="text" name="uname" required>
        </p>
        <p>
            <label>Email:</label>
            <input type="email" name="email" required>
        </p>
        <p>
            <label>Twitter Address:</label>
            <input type="text" name="twitter">
        </p>
        <p>
            <label>Web Address:</label>
            <input type="url" name="web">
        </p>
        <p>
            <label>Country:</label>
            <input type="text" name="country">
        </p>
        <p>
            <label>City:</label>
            <input type="text" name="city">
        </p>
        <p>
            <label>Select Your Hobbies</label><br>
            <input type="checkbox" name="hobbies[]" value="surfing"> Net Browsing
            <input type="checkbox" name="hobbies[]" value="reading"> Reading Books
            <input type="checkbox" name="hobbies[]" value="blogging"> Blogging
            <input type="checkbox" name="hobbies[]" value="movies"> Watch Movies
        </p>
        <p>
            <label>Gender:</label><br>
            <input type="radio" name="sex" value="Male" required> Male
            <input type="radio" name="sex" value="Female"> Female
        </p>
        <p>
            <input type="submit" name="submit" value="Save">
            <input type="reset" name="cancel" value="Cancel">
        </p>
    </form>

</body>
</html>