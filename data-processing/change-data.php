<?php
include '../config/db_conn.php'; // memanggil fungsi database, enkripsi, dan format rupiah
include '../session.php'; // memanggil fungsi untuk melakukan pengecekan session

@$parameter_id = base64_decode("$_GET[id]"); // line 5-6 melakukan decrypt id pada link (GET) yang terenkripsi
$id = str_replace("$salt", "", "$parameter_id");

if (isset($_POST['parameter'])) { // line 8-12 melakukan pengecekan apakah ada parameter yang dikirim oleh halaman sebelumnya
    $parameter = $_POST['parameter']; // untuk parameter 1 maka melakukan fungsi hapus data
} elseif (isset($_GET['parameter'])) { // sedangkan untuk parameter 2 untuk melakukan edit data
    @$parameter = $_GET['parameter']; //  apabila tidak ada parameter yang dikirim maka script pada line 13-14 akan menampilkan pesan error dan meneruskan ke halaman view-data
} else {
    echo "<script>alert('No Parameter Detected');
   window.location = '../page/view-data';</script>";
}

if ($parameter == 1) { // Pengecekan apabila terdapat parameter 1 maka script pada line 18-27 akan melakukan penghapusan data sesuai id yang dikirim oleh halaman view-data. dan akan melakukan redirecting page ke view-data lagi.
    $sql = "delete from data where data.id = $id";
    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data Has Deleted!');
   window.location = '../page/view-data';</script>";
    } else {
        echo "<script>alert('Failed to Delete Data!');
   window.location = '../page/view-data';</script>";
    }

    $koneksi->close();
} elseif ($parameter == 2) { // Pengecekan apabila terdapat parameter 1 maka script pada line 29-51 akan melakukan Perubahan data sesuai id dan data lain yang dikirim oleh halaman view-data -> edit. dan akan melakukan redirecting page ke view-data lagi.
    $alokasi = $_POST['alokasi'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $dana = $_POST['dana'];
    $id_data = $_POST['id_data'];

    $sql = "update data a set
    alokasi = '$alokasi',
    dana = '$dana',
    nama = '$nama',
    hp = '$hp',
    email = '$email'
    where a.id = '$id_data'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Success, Update Data !');
        window.location = '../page/view-data';</script>";
    } else {
        echo "<script>alert('Failed, Update Data !');
        window.location = '../page/view-data';</script>";
    }
}
