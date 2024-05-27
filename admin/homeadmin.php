<?php 
date_default_timezone_set('Asia/Jakarta');
session_start();

if($_SESSION['role']==""){
    header("location:index.php?pesan=gagal");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Pasien</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php 
            include "sidebar.php";
        ?>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <?php 
                        include "topbarnav.php"; 
                    ?>

                    <!-- Topbar Navbar -->
                    <?php
                        include "topbarnavbar.php"; 
                    ?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <?php 
                    include "../koneksi.php";
                    $tahun1 = date ('Y', strtotime("-1 years"));
                    mysqli_query($koneksi, "delete from admin where tanggalbayar='$tahun1'")
                                                    or die(mysqli_error($koneksi));
                ?>
                    <div class="col-xl-6 mb-4 float-none">
                        <div class="card border-left-info shadow h-100 py-2 border-bottom-info align-items-left">
                            <form action="" method="GET" >
                                <h4 style="margin-left: 20px; color:blue;">Filter Berdasarkan Tanggal</h4>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <label for="" >Dari Tanggal</label>
                                            <input type="date" class="rounded" name="daritgl" style="border: solid 1px;" required>
                                            <label for="" >s/d</label>
                                            <input type="date" class="rounded" name="sampaitgl" style="border: solid 1px;" required>
                                            <input class="btn btn-primary btn-md" type="submit" name="filter" value="Tampilkan" >
                                            <!-- <a href="hapus1tahun.php">
                                                <button type="button" name="btnok" class="btn btn-danger btn-md">Hapus Data Tahun Lalu</button>
                                            </a>
                                            <?php 
                                            ?> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php 
                            include '../koneksi.php';
                            if(isset($_GET['filter'])) {
                                    $daritgl = mysqli_real_escape_string($koneksi, $_GET['daritgl']);
                                    $sampaitgl = mysqli_real_escape_string($koneksi, $_GET['sampaitgl']);
                                    echo " Berikut Adalah Data Pasien Dari Tanggal ".$daritgl. " S/d Tanggal " .$sampaitgl ;
                            }
                        ?>
                    </div>
                    
                
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="DataTable table-sm table-striped table-bordered text-capitalize" id="DataTable" width="100%" cellspacing="0" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.Nota</th>
                                            <th class="text-center">No.SEP</th>
                                            <th class="text-center">No.Medrec</th>
                                            <th class="text-center">Nama Pasien</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Tgl.Bayar</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Kasir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            include '../koneksi.php';
                                            $no = 1;
                                            if(isset($_GET['filter'])) {
                                                $daritgl = mysqli_real_escape_string($koneksi, $_GET['daritgl']);
                                                $sampaitgl = mysqli_real_escape_string($koneksi, $_GET['sampaitgl']);
                                                $data = mysqli_query($koneksi,"SELECT * from admin where tanggalbayar BETWEEN '$daritgl' AND '$sampaitgl'");
                                            }else{
                                                $data = mysqli_query($koneksi,"SELECT * from admin");
                                            }
                                                while($d = mysqli_fetch_array($data)){
                                        ?>
                                        <tr>
                                                <td class="text-center"><?php echo $d['nomornota']; ?></td>
                                                <td class="text-center"><?php echo $d['nomorsep']; ?></td>
                                                <td class="text-center"><?php echo $d['nomormedrec']; ?></td>
                                                <td class="text-start"><?php echo $d['namapasien']; ?></td>
                                                <td class="text-start"><?php echo $d['alamat']; ?></td>
                                                <td class="text-center"><?php echo date('d-M-Y', strtotime($d['tanggalbayar'])); ?></td>
                                                <td class="text-center"><?php echo number_format($d['total']); ?></td>
                                                <td class="text-center"><?php echo $d['yangmenerima']; ?></td>
                                        </tr>
                            </div>
                        </div>
                    </div>
                </div>
                                        <?php 
                                            }
                                        ?>
                                    </tbody>
                                </table>
            </div>
        </div>
    </div>


            <!-- Footer -->
            <?php 
                include "footer.php";
            ?>
            <!-- End of Footer -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php
    include "logoutmodal.php"; 
    ?>
                                        
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script> 
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.bootstrap5.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script> 
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.colVis.min.js"></script> 

    <script>
        new DataTable('#DataTable', {
            responsive: true,
            layout: {
                topStart: {
                    buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    
                    }
                },
                ]
                }
            }
        });
    </script>


    
</body>

</html>