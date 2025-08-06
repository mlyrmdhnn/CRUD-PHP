<?php
require "sql.php";

// set cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil usr berdasarkan id
  $result = mysqli_query($sql, "SELECT username FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }
}


// set session
session_start();
if(isset($_SESSION['login'])) {
  header("Location: index.php");
}
$msg = false;

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($sql, $query);
    if(mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $verifPass = password_verify($password, $data['password']);
        if ($verifPass) {
            $_SESSION['login'] = true;

            // cek remember 
            if(isset($_POST['remember'])) {
              // buat cookie
              setcookie('id', $row['id'], time() + 60); // ini id
              setcookie('key', $row['username'], time() + 60); // ini usrname
            }
        

            header("Location: index.php");
            exit;
        } else {

            $msg = "incorrect username or password";
        }
    } else {

        $msg = "incorrect username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
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
            username : 
            <input type="text" name="username" id="username">
        </label>
        <label for="password">
        password : 
        <input type="password" name="password" id="password">
        </label>
        <button type="submit" name="login">login</button>
        <label for="remember">
          Remember me
          <input type="checkbox" name="remember" id="remember">
        </label>
        <h4><?php echo $msg ? $msg : ""; ?>
        </h4>
        <h4><a href="registrasi.php">doesn't have an account yet?</a></h4>
    </form>
   
</body>
</html>