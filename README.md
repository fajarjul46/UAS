Fungsi-Fungsi PHP
1. Folder Assets
 Berisi file CSS, Javascript, Image. sebagai pendukung file bootstrap.
2. Config -> db_conn.php
 Berfungsi sebagai file Koneksi ke Database, dan berisi key untuk enkripsi Link (GET).
3. Data Processing
  - add-data.php
      Berfungsi untuk melakukan proses input data kedalam database, yang sebelumnya di isi pada halaman Add Data
  - change-data.php
      Berfungsi sebagai file proses ke database untuk melakukan Delete & Edit data
4. Layout -> header.php , sidebar.php , footer.php
  Berfungsi sebagai file untuk penentuan layout pada halaman web app.
  - header.php
      Berfungsi untuk menampilkan bagian thumbnail pada tab browser dan judul, juga untuk menampilkan bagian logout session.
  - sidebar.php
      Layout sebelah kiri untuk menampilkan menu
  - footer.php
      Layout bawah untuk menampilkan footer menegenai informasi aplikasi
 5. login
  - login.php
      Melakukan pencocokan username dan password dari hasil input yang ada pada halaman login->index.php, dan berfungsi untuk membuat session login.
  - index.php
      Menampilkan halaman login sebelum session terbentuk
  - logout.php
      untuk melakukan destroy session, atau membersihkan session pada web ini. sehingga data username dan fullname yang ada pada session hilang.
 6. page
  - add.data.php
      menampilkan halaman Add Data, kemudian data dikirim ke data-processing -> add-data.php untuk di input ke database
  - dashboard.php
      menampilkan halaman dashboard yang merupakan summary dari semua report yang sudah di input pada halaman Add Data
  - edit-data.php
      untuk menampilkan halaman Edit Data yang bisa di temukan pada halaman View Data -> action (edit), kemudian data yang sudah di edit dikirim ke data-processing -> change-data.php untuk selanjutnya di simpan pada database
  - view-data.php
      menampilkan halaman View Data yang menampilkan semua informasi data yang sudah di input dari menu Add Data, pada halama ini juga terdapat action delete dan edit, yang berfungsi untuk melakukan perubahan data
7. .htaccess
  file ini bertugas untuk menghilangkan ekstensi .php pada link, dan menyembunyikan isi dari folder yang tidak terdapat index.php apabila folder tersebut diakses secara langsung
8. index.html
  untuk melakukan redirecting ke halaman page -> dashboard.php
9. session.php
  untuk melakukan pengecekan session, apakah session tersebut sudah terdapat username/fullname atau belum. apabila sudah maka akan di teruskan ke halaman yang di tuju, apabula belum maka akan di teruskan ke halaman login -> index.php
10. untuk semua fungsi-fungsi PHP sudah saya sertakan di sebelah source code, pada file-file tersebut saya beri komentar pada scriptnya agar fungsi script tersebut lebih jelas.
