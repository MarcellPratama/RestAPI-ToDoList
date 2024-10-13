# To-Do List API

Proyek ini adalah aplikasi To-Do List berbasis web yang dibangun dengan menggunakan CodeIgniter. Aplikasi ini memungkinkan pengguna untuk mengelola tugas mereka dengan mudah, termasuk menambahkan, memperbarui, dan menghapus tugas.

## Fitur

- **Autentikasi Pengguna**: Pengguna dapat login menggunakan username dan password untuk mengakses aplikasi.
- **Manajemen Tugas**: Pengguna dapat menambahkan tugas baru, memperbarui status tugas, dan menghapus tugas.
- **Tampilan Responsif**: Antarmuka pengguna dirancang responsif sehingga dapat diakses dengan baik di berbagai perangkat.

## Struktur Proyek

- **Model**: 
  - `Pengguna`: Model untuk mengelola data pengguna.
  - `Todolist`: Model untuk mengelola data tugas.

- **Kontroler**:
  - `UserController`: Mengelola proses login dan logout pengguna.
  - `TodolistControllerAPI`: Mengelola operasi CRUD (Buat, Baca, Perbarui, Hapus) untuk tugas.

- **Tampilan**:
  - `login_view`: Halaman untuk login pengguna.
  - `todolist_view`: Halaman untuk menampilkan dan mengelola daftar tugas.

- **Rute**: Rute yang telah ditentukan untuk menangani permintaan API dan tampilan.

## Endpoints API

Berikut adalah daftar endpoints yang tersedia di aplikasi ini:

| Metode HTTP | Endpoint              | Deskripsi                                                  |
|-------------|-----------------------|-----------------------------------------------------------|
| GET         | `/todolist`           | Mengambil daftar tugas untuk pengguna yang sedang login.  |
| POST        | `/todolist`           | Menambahkan tugas baru ke daftar tugas pengguna.          |
| PUT         | `/todolist/{id}`      | Memperbarui tugas yang ada berdasarkan ID tugas.         |
| DELETE      | `/todolist/{id}`      | Menghapus tugas berdasarkan ID tugas.                     |
| GET         | `/login`              | Menampilkan halaman login.                                |
| POST        | `/loginSubmit`        | Mengautentikasi pengguna berdasarkan username dan password.|
| GET         | `/logout`             | Mengeluarkan pengguna dari sesi dan kembali ke halaman login.|

## Persyaratan

- PHP 7.2 atau lebih tinggi
- CodeIgniter 4
- Database MySQL
