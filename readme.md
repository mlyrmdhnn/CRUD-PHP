# PHP Learn – Simple App with User & Mahasiswa Table

## 📥 Installasi

1. **Clone atau download repository ini.**
2. Simpan folder project di dalam folder `htdocs` milik XAMPP kamu.
3. Buat database bernama phplearn


## Perintah untuk buat tabel mahasiswa, silahkan di copy lalu jalankan di sql milikmu

CREATE TABLE mahasiswa (
  id INT AUTO_INCREMENT PRIMARY KEY,
  gambar VARCHAR(255),
  nama VARCHAR(255),
  email VARCHAR(255),
  nrp VARCHAR(255),
  jurusan VARCHAR(255)
);


## Perintah untuk buat tabel user, silahkan di copy lalu jalankan di sql milikmu

CREATE TABLE user (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(15),
  password VARCHAR(255)
);
