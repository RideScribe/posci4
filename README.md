# Aplikasi Kasir (Point Of Sale)
Aplikasi sistem penjualan berbasis web menggunakan framework codeigniter 4.

## Persyaratan
 - PHP versi 8.0
 - Semua persyaratan mengacu ke dokumentasi codeigniter 4. [Dokumentasi](https://codeigniter.com/user_guide/intro/requirements.html)

## Cara Install
 - Ekstrak file project.
 - Masuk ke direktori `cd posci4`.
 - Jalankan `composer install` untuk mendownload dependensinya.
 - Ganti nama file `env.sampel` menjadi `.env`
 - Ubah kofigurasi databasenya :
    - `database.default.hostname = localhost`
    - `database.default.database = posci4`
    - `database.default.username = root`
    - `database.default.password = `
    - `database.default.DBDriver = MySQLi`
 - Buat nama database `posci4` 
 - Jalan perintah `php spark migrate`
 - jalanpan perintah `php spark db:seed BulantahunSeeder`. jika data sudah ada tidak perlu menjalankan ini.
 - jalanpan perintah `php spark db:seed PelangganSeeder`. jika data sudah ada tidak perlu menjalankan ini.
 - jalanpan perintah `php spark db:seed PemasokSeeder`. jika data sudah ada tidak perlu menjalankan ini.
 - jalanpan perintah `php spark db:seed UserSeeder`. jika data sudah ada tidak perlu menjalankan ini.
 - Jalankan aplikasi `php spark serve` kemudian buka urlnya `http://localhost:8080/`
 - Akun untuk login :
    - Username : superadmin / admin / kasir
    - Password : 123456
  
  ## Ispired
  This project is inspired by [sejator/posci4](https://github.com/sejator/posci4) with some additional features tailored to personal use.

  <small>credit [halimkun](https://www.github.com/halimkun) | big thanks to [sejator](https://github.com/sejator)</small>
