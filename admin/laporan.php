<?php 
date_default_timezone_set('Asia/Jakarta');
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['role']==""){
    header("location:index.php?pesan=gagal");
}

?>
<?php
include "../koneksi.php";
 
// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
    $thn = date ('Y');
    // for($bulan = 1;$bulan < 13;$bulan++)
    // {
        $query = mysqli_query($koneksi,"SELECT sum(total) as total from admin where YEAR(tanggalbayar)='$thn'");
        $row = $query->fetch_array();
        $total[] = $row['total'];
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan Pendapatan</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <!-- Custom styles for this page -->
    
    
  


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

                
                <?php 
                    include 'card.php';
                    // require 'sesi.php';
                ?>
            <div class="row" style="padding: 5px 20px;">
                <div class="card col-xl-6 shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan Transaksi Per-Individu (Hari Ini)</h6>
                    </div>
                    <div class="card-body">


                    <?php

                    $day_sesi11 = date ('Y-m-d'); 

                    $query_sesi11 = mysqli_query($koneksi,"SELECT sum(total) as total from kasir1 where (tanggalbayar)= '$day_sesi11'");
                    $row_sesi11 = $query_sesi11->fetch_array();
                    $total_sesi11[] = $row_sesi11['total'];

                    $query_sesi22 = mysqli_query($koneksi,"SELECT sum(total) as total from kasir2 where (tanggalbayar)= '$day_sesi11'");
                    $row_sesi22 = $query_sesi22->fetch_array();
                    $total_sesi22[] = $row_sesi22['total'];

                    $query_sesi33 = mysqli_query($koneksi,"SELECT sum(total) as total from kasir3 where (tanggalbayar)= '$day_sesi11'");
                    $row_sesi33 = $query_sesi33->fetch_array();
                    $total_sesi33[] = $row_sesi33['total'];

                    $query_sesi44 = mysqli_query($koneksi,"SELECT sum(total) as total from kasir4 where (tanggalbayar)= '$day_sesi11'");
                    $row_sesi44 = $query_sesi44->fetch_array();
                    $total_sesi44[] = $row_sesi44['total'];

                    $query_sesi55 = mysqli_query($koneksi,"SELECT sum(total) as total from kasir5 where (tanggalbayar)= '$day_sesi11'");
                    $row_sesi55 = $query_sesi55->fetch_array();
                    $total_sesi55[] = $row_sesi55['total'];

                    ?>


                        <h4 class="small font-weight-bold">Kartini<span
                                class="float-right">Rp.<?php echo number_format($total_sesi11[0]);?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"
                                aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Nasikin<span
                                class="float-right">Rp.<?php echo number_format($total_sesi22[0]);?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"
                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Warnadi<span
                                class="float-right">Rp.<?php echo number_format($total_sesi33[0]);?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" style="width: 100%"
                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Wanto<span
                                class="float-right">Rp.<?php echo number_format($total_sesi44[0]);?></span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 100%"
                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Dalam<span
                                class="float-right">Rp.<?php echo number_format($total_sesi55[0]);?></span></h4>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <?php 
                include "chart.php";
                ?>
                </div>
                <div class="col-xl-6">

                    <!-- Tabel Rekap Pendapatan -->
                    <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Tabel Rekap Pendapatan Per-Bulan</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                    include "../koneksi.php";
 
                                    // Check connection
                                    if (mysqli_connect_error()){
                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                    }
                                    $result = mysqli_query($koneksi,"select year(tanggalbayar) as year, month(tanggalbayar) as month, sum(total) as total
                                                                    from admin group by year(tanggalbayar), month(tanggalbayar)");
                                ?>
                                <table id="example" class="DataTable table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            
                                            <th class="text-center">Tahun</th>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                    
                                                $i=0;
                                                while($row = mysqli_fetch_array($result)) {
                                                $monthNum  = $row["month"];
                                                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                                                $monthName = $dateObj->format('F');
                                                $yearNum  = $row["year"];
                                                $dateObj   = DateTime::createFromFormat('!Y', $yearNum);
                                                $yearName = $dateObj->format ('Y');
                                    
                                            ?>
                                        <tr>
                                            
                                            <td class="text-center"><?php echo $yearName; ?></td>
                                            <td class="text-center"><?php echo $monthName; ?></td>
                                            <td><?php echo number_format($row["total"]); ?></td>
                                        </tr>
                                            <?php
                                                $i++;
                                                    }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                        
                </div>
            </div>
            
        </div>
    </div>       

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; RSUD Indramayu 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php
    include "logoutmodal.php" 
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
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
        new DataTable('#example', {
            layout: {
                topStart: {
                    buttons: ['print']
                }
            }
        });
    </script>

</body>

</html>