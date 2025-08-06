<?php
require "sql.php";


function cariMahasiswa($keyword, $conn) {
    $keyword = mysqli_real_escape_string($conn, $keyword);
    $query = "SELECT * FROM mahasiswa 
              WHERE nama LIKE '%$keyword%' 
              OR email LIKE '%$keyword%' 
              OR nrp LIKE '%$keyword%' 
              OR jurusan LIKE '%$keyword%'";
    return mysqli_query($conn, $query);
}

function getAllMahasiswa($conn) {
    $query = "SELECT * FROM mahasiswa";
    return mysqli_query($conn, $query);
}


// fungsi menambah data
function tambah ($gambar, $nama, $email, $nrp, $jurusan) {
    global $sql;
    $query = "INSERT INTO mahasiswa (gambar, nama, email, nrp, jurusan) VALUES ('$gambar', '$nama', '$email', '$nrp' ,'$jurusan')";
    if(mysqli_query($sql, $query)) {
        echo "<script>
            alert('data berhasil ditambahkan');
            window.location.href = 'index.php';
            </script>";
    }
}

// fungsi hapus data
function hapus($id) {
    global $sql;
    if(isset($id)) {
       
    
        if(is_numeric($id)) {
            $query = "DELETE FROM mahasiswa WHERE id = $id";
    
            if(mysqli_query($sql, $query)) {
                echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href = 'index.php';
                </script>";
            } else {
                echo "<script>
                alert('Gagal menghapus data!');
                window.location.href = 'index.php';
            </script>";
            }
    
        } else {
            echo "<script>alert('id tidak valid'); window.location.href = 'index.php';</script>";
        }
    } else {
        echo "<script> alert('id tidak ditemukan'); window.location.href = 'index.php'</script>";
    }
}

// fungsi tampil data yg mau di edit
function edit($id) {
    global $sql;
        $query = "SELECT * FROM mahasiswa WHERE id = '$id'";
        $data = mysqli_query($sql, $query);
        $result = mysqli_fetch_assoc($data);
        return $result;
}

// fungsi edit data
function editData($gambarBaru, $nama, $email, $nrp, $jurusan, $id) {
    global $sql;

    // Cek apakah ada gambar baru diupload
    if ($_FILES['gambar']['error'] === 0) {
        $gambarName = $_FILES['gambar']['name'];
        $gambarTmp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($gambarTmp, 'img/' . $gambarName);
    } else {
        // Jika tidak upload gambar baru, pakai yang lama
        $result = edit($id);
        $gambarName = $result['gambar'];
    }

    $query = "UPDATE mahasiswa 
              SET gambar='$gambarName', nama='$nama', email='$email', nrp='$nrp', jurusan='$jurusan' 
              WHERE id=$id";
    mysqli_query($sql, $query);
    echo "<script>
        alert('Data berhasil diubah');
        window.location.href = 'index.php';
    </script>";
}


function signUp($data) {
    global $sql;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($sql, $data['password']);
    $password2 = mysqli_real_escape_string($sql, $data['password2']);

    // Cek apakah username sudah terdaftar
    $checkUsr = mysqli_query($sql, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($checkUsr)) {
        echo "<script>alert('Username sudah terdaftar!');</script>";
        return false;
    }

    // Cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
        return false;
    }

    // Enkripsi password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Simpan user baru ke database
    $query = "INSERT INTO user (username, password) VALUES ('$username', '$passwordHash')";
    if (mysqli_query($sql, $query)) {
        // window.location.href = 'login.php';
        echo "<script>
            alert('berhasil registrasi');
                window.location.href = 'login.php'
                </script>";
        return true;
    } else {
        echo "<script>alert('Gagal mendaftar!');</script>";
        return false;
    }
}


?>
