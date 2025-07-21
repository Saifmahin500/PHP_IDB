<?php
session_start();

$Error = "";
$submitted = false;
$firstName = $lastName = $address = $email = $gender = $password = "";

if (isset($_POST["submit"])) {
    if (
        empty($_POST["fname"]) ||
        empty($_POST["lname"]) ||
        empty($_POST["address"]) ||
        empty($_POST["email"]) ||
        empty($_POST["pass"]) ||
        empty($_POST["confirm_pass"]) ||
        empty($_POST["gender"])
    ) {
        $Error = "Please fill all required fields.";
    } elseif ($_POST["pass"] !== $_POST["confirm_pass"]) {
        $Error = "Passwords do not match.";
    } else {
        $firstName = htmlspecialchars($_POST["fname"]);
        $lastName = htmlspecialchars($_POST["lname"]);
        $address = htmlspecialchars($_POST["address"]);
        $email = htmlspecialchars($_POST["email"]);
        $gender = htmlspecialchars($_POST["gender"]);

        $user = [
            "fname" => $firstName,
            "lname" => $lastName,
            "address" => $address,
            "email" => $email,
            "gender" => $gender
        ];

        $_SESSION["users"][] = $user;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Registration List</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #eef2f3;
      padding: 40px;
      margin: 0;
    }

    .container {
      max-width: 800px;
      margin: auto;
    }

    form {
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    input[type="radio"] {
      margin-right: 5px;
    }

    input[type="submit"] {
      margin-top: 15px;
      padding: 10px;
      width: 100%;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .error {
      color: red;
      text-align: center;
    }

    table {
      width: 100%;
      background: white;
      border-collapse: collapse;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    table th,
    table td {
      padding: 10px 12px;
      border: 1px solid #ccc;
      text-align: left;
    }

    table th {
      background-color: #007bff;
      color: white;
    }

    table tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .table-container h2 {
      margin-bottom: 10px;
      text-align: center;
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Form -->
  <form method="post">
    <h2>Registration Form</h2>
    <?php if (!empty($Error)) echo "<p class='error'>$Error</p>"; ?>

    <label>First Name:</label>
    <input type="text" name="fname">

    <label>Last Name:</label>
    <input type="text" name="lname">

    <label>Address:</label>
    <input type="text" name="address">

    <label>Email:</label>
    <input type="email" name="email">

    <label>Password:</label>
    <input type="password" name="pass">

    <label>Confirm Password:</label>
    <input type="password" name="confirm_pass">

    <label>Gender:</label>
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female

    <input type="submit" name="submit" value="Submit">
  </form>

  <!-- Table -->
  <div class="table-container">
    <h2>Registered Users</h2>
    <table>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Gender</th>
      </tr>
      <?php
      if (!empty($_SESSION["users"])) {
          foreach ($_SESSION["users"] as $user) {
              echo "<tr>
                      <td>{$user['fname']} {$user['lname']}</td>
                      <td>{$user['address']}</td>
                      <td>{$user['email']}</td>
                      <td>{$user['gender']}</td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='4'>No users registered yet.</td></tr>";
      }
      ?>
    </table>
  </div>
</div>

</body>
</html>
