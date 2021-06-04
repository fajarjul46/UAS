<?php
include '../layout/header.php'; // Memanggil Layout header
include '../layout/sidebar.php'; // Memanggil Layout Sidebar
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <center>
                        <h1>Rekapitulasi Penerimaan Bantuan Sosial COVID-19<br>Sampai Dengan <?php echo date("d M Y"); ?>,Pukul <?php echo date("H:i"); ?></h1>
                    </center>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alokasi</th>
                                        <th>Jumlah Transaksi</th>
                                        <th>Jumlah Dana</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1; // Membuat penomoran barisan pada table
                                    $query = mysqli_query($koneksi, "SELECT a.alokasi, count(a.id) trx, sum(a.dana) total from data a group by a.alokasi"); // QUery untuk mengambil summary data dari database
                                    while ($data = mysqli_fetch_array($query)) { // Script pada line 50-53 melakukan deklarasi data dari database
                                        $parameter = $data['id'];
                                        $x = $salt . $parameter;
                                        $id = base64_encode($x);
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['alokasi']; // menampilkan data alokasi
                                                ?></td>
                                            <td><?php echo $data['trx']; //  menampilkan data jumlah transaksi
                                                ?></td>
                                            <td><?php echo rupiah($data['total']); // menampilkan total dana yang sudah diinput 
                                                ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <?php
                    include '../layout/footer.php'; // Memanggil Layout Footer
