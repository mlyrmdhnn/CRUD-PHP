<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require "functions.php";





if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nrp = $_POST['nrp'];
    $jurusan = $_POST['jurusan'];

    // Upload gambar
    $gambarName = $_FILES['gambar']['name'];
    $gambarTmp = $_FILES['gambar']['tmp_name'];

    // Simpan gambar ke folder img/
    move_uploaded_file($gambarTmp, 'img/' . $gambarName);

    // Masukkan data ke database
    tambah($gambarName, $nama, $email, $nrp, $jurusan);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
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
        <input type="file" name="gambar" id="gambar">
        <label for="nama">
            Nama : 
        </label>
        <input type="text" name="nama" id="nama">
        <label for="email">
            email : 
        </label>
        <input type="text" name="email" id="email">
        <label for="nrp">
            nrp : 
        </label>
        <input type="text" name="nrp" id="nrp">
        <label for="jurusan">
            jurusan : 
        </label>
        <input type="text" name="jurusan" id="jurusan">
        <br>
        <button type="submit" name="submit">submit</button>
    </form>
</body>
</html>