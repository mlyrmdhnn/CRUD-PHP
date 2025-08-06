<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require "functions.php";
require "sql.php";




if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    $result = cariMahasiswa($keyword, $sql);
} else {
    $result = getAllMahasiswa($sql);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        margin: 20px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        margin-bottom: 20px;
        text-align: center;
    }

    input[type="text"], input[type="file"] {
        padding: 8px;
        margin: 5px;
        width: 250px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        padding: 8px 16px;
        margin-top: 10px;
        background-color: #2e86de;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #1b4f72;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: white;
    }

    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: center;
    }

    th {
        background-color: #2e86de;
        color: white;
    }

    a {
        text-decoration: none;
        color: #2980b9;
    }

    a:hover {
        text-decoration: underline;
    }

    .form-group {
        margin-bottom: 10px;
    }
    .footer {
        display: flex;
        justify-content: space-between;
    }
</style>

</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <form action="" method="post">
    <input type="text" name="keyword" id="keyword">
    <button type="submit" name="search">search</button>
    </form>
    <table border="1">
    <tr>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Email</th>
        <th>NRP</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
        <td><img src="img/<?php echo $row['gambar']; ?>" width="60" alt="Gambar"></td>

            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['nrp'] ?></td>
            <td><?php echo $row['jurusan'] ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id'] ?>">edit</a> | 
                <a href="hapus.php?id=<?php echo $row['id'] ?>">delete</a>
            </td>
        </tr>
    <?php endwhile ?>
</table>
   <div class="footer">
   <a href="tambah.php">tambah data</a>
    <a href="logout.php">Logout</a>
   </div>
</body>
</html>