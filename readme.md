# 📘 PHP Learn – Simple App with User & Mahasiswa Table

Proyek ini adalah latihan sederhana menggunakan PHP dan MySQL, dengan fitur manajemen data mahasiswa dan autentikasi user.

---

## 📥 Installasi

1. **Clone atau download repository ini**
2. Simpan folder project ke dalam folder `htdocs` di XAMPP
3. Buka phpMyAdmin dan buat database baru bernama: `phplearn`


---

## 🧱 Struktur Database

### 🔹 Tabel `mahasiswa`

Silakan salin dan jalankan SQL berikut di tab SQL phpMyAdmin:

```sql
CREATE TABLE mahasiswa (
  id INT AUTO_INCREMENT PRIMARY KEY,
  gambar VARCHAR(255),
  nama VARCHAR(255),
  email VARCHAR(255),
  nrp VARCHAR(255),
  jurusan VARCHAR(255)
);
```

### 🔹 Tabel `user`

```sql
CREATE TABLE user (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(15),
  password VARCHAR(255)
);
```
