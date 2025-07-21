<?php
if(isset($_POST["submit"]))
{
    if((!isset($_POST["fname"])) || (!isset($_POST["lname"])) || (!isset($_POST["addess"])) || (!isset($_POST["email"])) || (!isset($_POST["pass"])) || (!isset($_POST["gender"])))
    {
        $Error = "+"."Please Fill all Requried Fields";
    }
    if($_POST["pass"] != $_POST["confirm_pass"])
    {
        $Error = "Password doesnot match";
    }
    else{
        $fisrtName = $_POST["fname"];
        $lastName = $_POST["lname"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $password = $_POST["pass"];
        // $hased = $_POST["fname"];

    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f4f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      background: white;
      padding: 25px 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 350px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    label {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    input[type="tel"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    input[type="submit"] {
      background-color: #007BFF;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
      margin-top: 15px;
      font-size: 16px;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
    <form action="" method="post">
        <?php
        if(isset($_POST["submit"]))
        {
            if(!empty($Error))
            {
                echo "<P style='color:red;'>" .$Error."</P>";
            }
        }
       ?>
       <label for="name">First Name:</label>
    <input type="text" id="name" name="fname" >

       <label for="name">Last Name:</label>
    <input type="text" id="name" name="lname" >

    <label for="phone">Address:</label>
    <input type="tel" id="phone" name="address" >

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" >

    <label for="course">password:</label>
    <input type="text" id="course" name="course" >

    <input type="submit" value="submit" name="submit">

    </form>
    
</body>
</html>