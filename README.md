# Cara install di local komputer

1. Jalankan perintah composer untuk menginstal semua dependensi yang diperlukan oleh proyek Laravel. Pastikan terminal/command prompt Anda berada di direktori proyek setelah di-clone, kemudian jalankan perintah:
```
composer install
```

2. Salin file .env.example dan buat salinannya dengan nama .env. Anda dapat melakukan ini dengan menjalankan perintah:
```
cp .env.example .env
```
Setelah itu, buka file .env dan sesuaikan konfigurasi database dan pengaturan lainnya jika diperlukan.

3. Jalankan perintah untuk menghasilkan kunci aplikasi Laravel. Ini diperlukan untuk mengamankan sesi pengguna dan data lainnya:
```
php artisan key:generate
```

4. Jalankan migrasi database untuk membuat tabel-tabel yang diperlukan di dalam database:
```
php artisan migrate
```

5. Pengisian database (seeder), Anda dapat menjalankan perintah berikut untuk mengisinya:
```
php artisan db:seed
```
6. Setelah langkah-langkah di atas, Anda dapat menjalankan server pengembangan Laravel dengan perintah:
```
php artisan serve
```
Ini akan menjalankan server lokal dan memberikan Anda URL tempat proyek Laravel dapat diakses (biasanya http://localhost:8000).
Atau buka di root project web server local Anda, seperti `localhost/web-blk` atau `web-blk.test`
