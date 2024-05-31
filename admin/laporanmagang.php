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
    for($bulan = 1;$bulan < 13;$bulan++)
    {
        $query = mysqli_query($koneksi,"SELECT sum(total) as total from adminmagang where YEAR(tanggalpembayaran)='$thn'");
        $row = $query->fetch_array();
        $total[] = $row['total'];
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

    <title>Laporan Pendapatan Magang</title>

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

                $day_sesi = date ('Y-m-d'); 

                $query_sesi = mysqli_query($koneksi,"SELECT sum(total) as total from adminmagang where (tanggalpembayaran)= '$day_sesi'");
                $row_sesi = $query_sesi->fetch_array();
                $total_sesi[] = $row_sesi['total'];

                ?>
 
            <div class="row">
                <div class="card border-left-danger shadow h-100 py-2 align-items-left" style="margin-left: 32px; margin-bottom: 20px; padding: 10px; width: 30%;">
                    <div class="card-body">
                        <h1 class="card-title text-primary"><?php echo $_SESSION['username'];?></h1>
                        <h6 class="card-text">Total Pendapatan Magang Hari Ini</h6>
                        <h3 class="card-text text-end">Rp.<?php echo number_format($total_sesi[0]);?></h3>
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 5px 20px;">
                <div class="col-xl-6">
                        <div class="card shadow mb-4">
                            <?php

                                include "../koneksi.php";
                                if (mysqli_connect_error()){
                                    echo "Koneksi database gagal : " . mysqli_connect_error();
                                }
                                
                                $day = date ('d-m-Y'); 
                                $day1 = date ('d-m-Y',strtotime("-1 days"));
                                $day2 = date ('d-m-Y',strtotime("-2 days"));
                                $day3 = date ('d-m-Y',strtotime("-3 days"));
                                $day4 = date ('d-m-Y',strtotime("-4 days"));
                                $day5 = date ('d-m-Y',strtotime("-5 days"));
                                $day6 = date ('d-m-Y',strtotime("-6 days"));

                                if (empty($a)) {
                                    echo "";
                                    error_reporting(0);
                                } 
                                

                                    $query = mysqli_query($koneksi,"SELECT sum(total) as total from adminmagang where DAY(tanggalpembayaran)= '$day' group by date(tanggalpembayaran)");
                                    $row = $query->fetch_array();
                                    $totals[] = $row['total'];
                                    // echo json_encode($total);

                                    $query1 = mysqli_query($koneksi,"SELECT sum(total) as total from adminmagang where DAY(tanggalpembayaran)= '$day1' group by date(tanggalpembayaran)");
                                    $row1 = $query1->fetch_array();
                                    $total1[] = $row1['total'];

                                    $query2 = mysqli_query($koneksi,"SELECT sum(total) as total from adminmagang where DAY(tanggalpembayaran)= '$day2' group by date(tanggalpembayaran)");
                                    $row2 = $query2->fetch_array();
                                    $total2[] = $row2['total'];

                                    $query3 = mysqli_query($koneksi,"SELECT sum(total) as total from adminmagang where DAY(tanggalpembayaran)= '$day3' group by date(tanggalpembayaran)");
                                    $row3 = $query3->fetch_array();
                                    $total3[] = $row3['total'];

                                    $query4 = mysqli_query($koneksi,"SELECT sum(total) as total from adminmagang where DAY(tanggalpembayaran)= '$day4' group by date(tanggalpembayaran)");
                                    $row4 = $query4->fetch_array();
                                    $total4[] = $row4['total'];

                                    $query5 = mysqli_query($koneksi,"SELECT sum(total) as total from adminmagang where DAY(tanggalpembayaran)= '$day5' group by date(tanggalpembayaran)");
                                    $row5 = $query5->fetch_array();
                                    $total5[] = $row5['total'];

                                    $query6 = mysqli_query($koneksi,"SELECT sum(total) as total from adminmagang where DAY(tanggalpembayaran)= '$day6' group by date(tanggalpembayaran)");
                                    $row6 = $query6->fetch_array();
                                    $total6[] = $row6['total'];

                                    $query7 = mysqli_query($koneksi,"SELECT sum(total) as total from adminmagang where DAY(tanggalpembayaran)= '$day6' group by date(tanggalpembayaran)");
                                    $row7 = $query7->fetch_array();
                                    $total7[] = $row7['total'];
                                ?>
                                <div>
                                <canvas id="myCharts" style="position: relative; height:80vh; width:50vw; padding: 20px 20px;"></canvas>
                                </div>
                                
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <script>
                                const ctx = document.getElementById('myCharts');

                                new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                    labels: ['6 Hari Lalu','5 Hari Lalu','4 Hari Lalu','3 Hari Lalu','2 Hari Lalu','1 Hari lalu','Hari Ini'],
                                    datasets: [{
                                        label: 'Pendapatan 7 Hari Terakhir',
                                        data: [<?php echo $total6['0']?>, <?php echo $total5['0'] ?>, <?php echo $total4['0'] ?>, <?php echo $total3['0'] ?>, <?php echo $total2['0'] ?>, <?php echo $total1['0'] ?>, <?php echo $totals['0'] ?>],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)'
                                            ],
                                            borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                            ],
                                        borderWidth: 1
                                    }]
                                    },
                                    options: {
                                    scales: {
                                        y: {
                                        beginAtZero: true
                                        }
                                    }
                                    }
                                });
                                </script>
                            </div>
                </div> 
                <div class="col-xl-6">

                    <!-- Tabel Rekap Pendapatan -->
                    <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Tabel Rekap Pendapatan Magang Per-Bulan</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                    include "../koneksi.php";
 
                                    // Check connection
                                    if (mysqli_connect_error()){
                                        echo "Koneksi database gagal : " . mysqli_connect_error();
                                    }
                                    $result = mysqli_query($koneksi,"select year(tanggalpembayaran) as year, month(tanggalpembayaran) as month, sum(total) as total
                                                                    from adminmagang group by year(tanggalpembayaran), month(tanggalpembayaran)");
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
                <!-- Project Card Example -->
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