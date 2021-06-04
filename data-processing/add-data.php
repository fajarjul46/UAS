<?php
include '../config/db_conn.php'; // memanggil fungsi database, enkripsi, dan format rupiah
include '../session.php'; // memanggil fungsi untuk melakukan pengecekan session

$dana = $_POST['dana']; // mengambil data dana dan mengkonversinya menjadi $dana
$nama = $_POST['nama']; // mengambil data nama dan mengkonversinya menjadi $nama
$hp = $_POST['hp']; // mengambil data hp dan mengkonversinya menjadi $hp
$email = $_POST['email']; // mengambil data email dan mengkonversinya menjadi $email
$alokasi = $_POST['alokasi']; // mengambil data alokasi dan mengkonversinya menjadi $alokasi

if (is_null($alokasi)) { // melakukan pengecekan $alokasi apakah kosong? apabila kosong maka script pada line 12 akan menampilkan pesan, dan kemudian line 13 akan melakukan redirecting page ke halaman add-data
    echo "<script>alert('Sorry your data empty'); 
   window.location = '../page/add-data';</script>";
} else { // apabila $alokasi tidak kosong maka?
    $sql = "INSERT INTO data (alokasi,dana,nama,hp,email,update_user) VALUES ('$alokasi','$dana','$nama','$hp','$email', '$username')"; // melakukan input data ke database, dengan Query tersebut
    if ($koneksi->query($sql) === TRUE) { // jika berhasil memasukkan data ke database maka akan muncul pesan berhasil pada line 17 dan akan di redirect ke halaman add-data oleh script di line 18
        echo "<script>alert('New Data Was Inputed Successfully');
        window.location = '../page/add-data';</script>";
    } else { // apabila gagal memasukkan data ke database maka line 20 akan menampilkan notifikasi error dan akan di redirect ke halaman add-data oleh script di line 21
        echo "<script>alert('New Data Failed to Input');
        window.location = '../page/add-data';</script>";
    }

    $koneksi->close(); // menutup koneksi ke database
}
