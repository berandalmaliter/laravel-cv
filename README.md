## 🛠 Instalasi & Setup

1. **Clone Repository & Jalankan Perintah Setup**

   ```bash
   git clone https://github.com/berandalmaliter/laravel-cv.git
   cd laravel-cv
   composer install
   cp .env.example .env
   php artisan key:generate
2. **Buat Database di phpMyAdmin (XAMPP)**

   - Buka http://localhost/phpmyadmin
   - Klik New
   - Buat database dengan nama: cv_portfolio
   - Klik Create / Simpan
3. **Atur koneksi database di file .env**
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=cv_portfolio
   DB_USERNAME=root
   DB_PASSWORD=
4. **Jalankan migrasi tabel & server Laravel**
   ```bash
   php artisan migrate
   php artisan serve
5. **Akses aplikasi di browser**
   ```bash
   http://127.0.0.1:8000

✨ Fitur

- CRUD data CV/Profile (tambah, lihat, edit, hapus)

- Penyimpanan data lengkap: nama, jabatan, summary, kontak, skills, pengalaman, pendidikan

- Preview CV dengan desain 2 kolom yang rapi (sidebar info diri + konten utama)

- Export CV ke PDF menggunakan DOMPDF

- Export CV ke Word (.docx) menggunakan PHPWord

- Pagination pada daftar CV dan flash message untuk notifikasi aksi (create / update / delete)
