# PHP Mini MVC + API (Custom Framework)

Proyek ini adalah aplikasi **Mini MVC PHP** dengan routing custom, controller terpisah, model, view, serta mendukung fitur API, CORS, database connection, helper, dan penyimpanan (storage).

Struktur ini dibuat agar mirip framework modern seperti Laravel / CodeIgniter, tetapi tetap ringan dan mudah dipahami.

---

## 🚀 Fitur Utama

- **Routing Manual**
- **Controller & Model Terpisah**
- **View Rendering**
- **REST API (JSON Output)**
- **Database Connection (PDO)**
- **Custom CORS Middleware**
- **Folder Storage (uploads/assets)**
- **Custom Migrations (opsional)**
- **Clean MVC folder organization**

---

## 📂 Struktur Direktori
app/
├── controllers/
│ ├── auth/
│ │     └── UsersController.php
│ └── products/
│       └── ProductController.php
│
├── models/
│ ├── auth/
│ └── products/
│
├── view/
│ └── home/
│       └── index.php
│
├── config/
│ ├── cors.php
│ └── db.php
│
├── helpers/
│ └── (helper functions di sini)
│
└── storage/
        ├── assets/
        └── uploads/
.htaccess
index.php

## 🧩 Penjelasan Folder

### **📁 app/controllers/**
Berisi *controller* untuk meng-handle request:

- `auth/UsersController.php` → login, register API
- `products/ProductController.php` → CRUD produk

Controller bertugas:
- menerima request
- memanggil model
- mengembalikan JSON/view

---

### **📁 app/models/**
Berisi fungsi akses database.

Contoh:
- `auth/usersModel.php` → getUsers(), loginUser()
- `products/productModel.php` → getProducts(), getProductByName()

---

### **📁 app/view/**
Berisi file HTML/PHP untuk tampilan halaman.

Contoh:
- `home/index.php`

Ini hanya dipakai jika menggunakan *web view*, bukan API.

---

### **📁 app/config/**
Berisi konfigurasi penting:

- `db.php` → konfigurasi database PDO
- `cors.php` → mengaktifkan CORS untuk API

---

### **📁 app/helpers/**
Tempat menyimpan fungsi umum seperti:

- response()
- json()
- sanitize()
- dll.

---

### **📁 app/storage/**
Untuk file yang dapat ditulis oleh server.

- `assets/` → gambar/icon statis
- `uploads/` → file upload dari user (misal foto produk)

---

### **📄 index.php (root)**
Ini adalah entry-point utama.

Fungsinya:
- memanggil router
- men-loading controller yang dibutuhkan
- menjalankan aksi sesuai URL

---

### **📄 .htaccess**
Digunakan agar semua request masuk ke `index.php` (URL rewriting).

---

## 🔌 Koneksi Database

Atur file:

app/config/db.php

Contoh:
```php
$conn = new PDO("mysql:host=localhost;dbname=belajar", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

🌐 Routing

Semua routing ditangani melalui:
index.php

Contoh route API:
if ($route === "/api/login") {
    $users->login();
    exit;
}

🧪 Contoh API
POST /api/login

Body (JSON):
{
  "username": "admin",
  "password": "123"
}


Response:
{
  "status": true,
  "message": "Login berhasil",
  "user": {...}
}

📦 Menjalankan Project
Taruh project di:
/laragon/www/nama folder


Akses di browser:
http://localhost/nama folder


Coba API:

http://localhost/nama folder/api/users

🛠 Development Notes
Semua controller harus berakhiran Controller.
Model berupa fungsi PHP biasa.
Routing harus dibuat manual (tidak otomatis).
Gunakan PDO untuk keamanan.
Gunakan storage/uploads untuk upload file.

📜 Lisensi
Project bebas digunakan untuk belajar & pengembangan.