<?php 
require "functions.php";
if(isset($_POST['register'])) {
    signUp($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Regist</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f6fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    form {
      background-color: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }

    label {
      display: block;
      margin-bottom: 15px;
      color: #333;
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
      margin-top: 5px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #2ecc71;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
    }

    button:hover {
      background-color: #27ae60;
    }
  </style>
</head>
<body>
  <form action="" method="post">
    <label for="username">
      Username:
      <input type="text" name="username" id="username" required>
    </label>
    <label for="password">
      Password:
      <input type="password" name="password" id="password" required>
    </label>
    <label for="password2">
      Konfirmasi Password:
      <input type="password" name="password2" id="password2" required>
    </label>
    <button type="submit" name="register">Sign Up</button>
  </form>
</body>
</html>
