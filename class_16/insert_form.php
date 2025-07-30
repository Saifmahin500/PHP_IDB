<?php
error_reporting(0);

$mysqli = new mysqli("localhost","root","","online_course");

if ($mysqli->connect_errno) 
{
   echo "failed to connect to the server:(".$mysqli->connect_errno.")".$mysqli->connect_error;
}

$sqli = "select * from citys order by cityname";
$resulti = $mysqli->query($sqli);

if(isset($_POST['submit']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $twitter = $_POST['twitter'];
    $url = $_POST['url'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $hobbies = $_POST['hobbies'];
    $sex = $_POST['sex'];

    $errmsg = "";

    $chk = "";

    foreach ($hobbies as $chk1)
    {
        $chk = $chk1.",";
    }
    if(empty($first_name) || empty($last_name) || empty($email) || empty($username))
    {
        $errmsg = "must fill up all data";
    }
    else
    {
        $sql = "insert into authors(,first_name,last_name,username,email,twitter, url,city,country,hobbies,sex)";
    }


}



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Beautiful Bootstrap Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background: #f2f6fc;
      font-family: 'Segoe UI', sans-serif;
    }
    .form-container {
      max-width: 750px;
      margin: 50px auto;
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
    }
    .form-title {
      text-align: center;
      margin-bottom: 25px;
      font-weight: bold;
      color: #007bff;
    }
    .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .form-label {
      font-weight: 500;
    }
  </style>
</head>
<body>

  <div class="container form-container">
    <h2 class="form-title">User Information Form</h2>
    <form action="submit.php" method="POST">

      <!-- <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="number" class="form-control" id="id" name="id" required>
      </div> -->

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="first_name" class="form-label">First Name</label>
          <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="last_name" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="mb-3">
        <label for="twitter" class="form-label">Twitter Handle</label>
        <input type="text" class="form-control" id="twitter" name="twitter">
      </div>

      <div class="mb-3">
        <label for="url" class="form-label">Website URL</label>
        <input type="url" class="form-control" id="url" name="url">
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="city" class="form-label">City</label>
          <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="mb-3">
        <label for="city" class="form-label">Country</label>
        <input type="text" class="form-control" id="country" name="country">
      </div>
      </div>

      <div class="mb-3">
        <label class="form-label d-block">Hobbies</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="hobby1" name="hobbies[]" value="Reading">
          <label class="form-check-label" for="hobby1">Reading</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="hobby2" name="hobbies[]" value="Traveling">
          <label class="form-check-label" for="hobby2">Traveling</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="hobby3" name="hobbies[]" value="Gaming">
          <label class="form-check-label" for="hobby3">Gaming</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="hobby4" name="hobbies[]" value="Coding">
          <label class="form-check-label" for="hobby4">Coding</label>
        </div>
      </div>

      <div class="mb-4">
        <label class="form-label">Sex</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="sex" id="male" value="male">
          <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="sex" id="female" value="female">
          <label class="form-check-label" for="female">Female</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="sex" id="other" value="other">
          <label class="form-check-label" for="other">Other</label>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary px-5">Submit</button>
      </div>

    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

