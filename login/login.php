<?php
include '../config/db_conn.php'; // memanggil fungsi database
$username = $_POST['username']; // Mengambil data username yang dikirim dari halaman index.php
$pass = md5($_POST['password']); // Mengambil data password yang dikirim dari halaman index.php dan mengenkripsinya dengan MD5

if (is_null($username) && is_null($password)) { // Pengecekan apabila username dan password yang dikirim oleh halaman index kosong, atau halaman diakses secara langsung. kemdian script pada line 7-8 akan memunculkan pesan error dan meneruskannya ke halaman login -> index.php kembali
    echo "<script>alert('Sorry Your Username/Password is Empty');
        window.location = '../login';</script>";
} else { // apabila username dan password ada isinya
    $sql = mysqli_query($koneksi, "SELECT * FROM `user` where username = '$username' and password = '$pass'"); // Query untuk mengambil informasi login yang dikirim oleh halaman index.php kemudian script pada line 11-16 akan mendeklarasikan hasil dari database
    while ($dt = mysqli_fetch_array($sql)) {
        $id_user =  $dt['username'];
        $id =  $dt['id'];
        $fullname =  $dt['fullname'];
        $password =  $dt['password'];
    }
    if ($id_user == $username && $pass == $password) { // Pengecekan apabila username dan password yang dikirim oleh halaman index.php sama dengan yang ada di database, maka script pada line 18-21 akan membuat session baru dengan informasi dari database tersebut.
        session_start();
        $_SESSION['username'] = $id_user;
        $_SESSION['id'] = $id;
        $_SESSION['fullname'] = $fullname;
        echo "<script>window.location = '../page/dashboard';</script>"; // melakukan penerusan ke halaman dashboard.php karena sudah berhasil login
    } else { // apabila username & password tidak cocok maka script pada line 24-25 akan menampilkan error dan melakukan redirecting ke halaman login kembali.
        echo "<script>alert('Sorry Your Username/Password is Invalid'); 
        window.location = '../login';</script>";
    }
}
