<?php
error_reporting(0);                 //Untuk menyembunyikan error pada php, juga berfungsi untuk menghindari serangan SQL Injection (Karena web ini di simpan di hosting)
ini_set('date.timezone', 'Asia/Jakarta'); // Untuk menentukan Timezone pada aplikasi, karena di beberapa server hosting menggunakan timezone negara lain
ini_set('max_execution_time', 300); // Menentukan batas maksimal eksekusi file PHP selama 5 menit atau 300 Detik
$host = "localhost"; // IP Server Database, localhost berarti merujuk ke server itu sendiri dengan kata lain server hosting dan database menjadi 1
$user = "fngx7438_uas"; // Username database
$password = "{B0BVtj^mc*I"; // Password Database
$database = "fngx7438_uas"; // Nama Database yang di pakai

$koneksi = mysqli_connect($host, $user, $password, $database); // Membuat koneksi ke database

if ($koneksi->connect_error) { // Dari line 12-14 merupakan script untuk melakukan tes koneksi ke database
    die("Koneksi gagal");
}

function rupiah($angka) // dari line 16-21 berfungsi untuk membuat format rupiah yang nantinya dipangil pada front end aplikasi
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

$salt = "ajschJjnuhw8";  // enkripsi link (GET), untuk menghindari manipulasi data & keamanan dari SQL Injection maupun serangan lainnya
