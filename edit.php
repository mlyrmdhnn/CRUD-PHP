<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require "sql.php";
require "functions.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
   $result =  edit($id);
}

if(isset($_POST['save'])) {
    $gambar = $_POST['gambar'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nrp = $_POST['nrp'];
    $jurusan = $_POST['jurusan'];
    editData($gambar, $nama, $email, $nrp, $jurusan, $id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 30px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        max-width: 500px;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #444;
        font-weight: bold;
    }

    input[type="text"], input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #27ae60;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #1e8449;
    }
</style>

</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
        <label for="gambar">
            gambar : 
        </label>
        <input type="file" name="gambar" id="gambar" value="<?php echo $result['gambar'] ?>">
        <label for="nama">
            Nama : 
        </label>
        <input type="text" name="nama" id="nama" value="<?php echo $result['nama'] ?>">
        <label for="email">
            email : 
        </label>
        <input type="text" name="email" id="email" value="<?php echo $result['email'] ?>">
        <label for="nrp">
            nrp : 
        </label>
        <input type="text" name="nrp" id="nrp" value="<?php echo $result['nrp'] ?>">
        <label for="jurusan">
            jurusan : 
        </label>
        <input type="text" name="jurusan" id="jurusan" value="<?php echo $result['jurusan'] ?>">
        <br>
        <button type="submit" name="save">save</button>
    </form>
</body>
</html>