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
        $query = mysqli_query($koneksi,"SELECT sum(total) as total from abladmin where YEAR(tanggal)='$thn'");
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

    <title>Laporan Pendapatan Ambulan</title>

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

                $day_ses = date ('Y-m-d'); 

                $query_ses = mysqli_query($koneksi,"SELECT sum(total) as total from ablkasir1 where (tanggal)= '$day_ses'");
                $row_ses = $query_ses->fetch_array();
                $total_ses[] = $row_ses['total'];

                ?>
            <div class="row" style="padding: 5px 10px;">
                <div class="col-xl-5">
                    <div class="card border-left-danger shadow h-15 py-2 align-items-left" style="margin-left: 20px; margin-bottom: 20px; padding: 10px; width: 90%;">
                        <div class="card-body">
                            <h1 class="card-title text-primary"><?php echo $_SESSION['username'];?></h1>
                            <h6 class="card-text">Total Pendapatan Ambulance Hari Ini</h6>
                            <h3 class="card-text text-end">Rp.<?php echo number_format($total_ses[0]);?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4" style="margin-left: 20px; margin-right: 20px;">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Tabel Rekap Ambulance</h5>
                            </div>
                            <div class="card-body">
                                <table class="DataTable table-striped" id="Tables" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nomor</th>
                                            <th style="text-align: center;">Nama</th>
                                            <th style="text-align: center;">Alamat</th>
                                            <th style="text-align: center;">Tujuan</th>
                                            <th style="text-align: center;">Tanggal</th>
                                            <!-- <th style="text-align: center;">Total</th> -->
                                            <th style="text-align: center;">Kasir</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>

                                    <?php 
                                        include '../koneksi.php';
                                        $no = 1;
                                        if(isset($_GET['filter'])) {
                                            $daritgl = mysqli_real_escape_string($koneksi, $_GET['daritgl']);
                                            $sampaitgl = mysqli_real_escape_string($koneksi, $_GET['sampaitgl']);
                                            $data = mysqli_query($koneksi,"SELECT * from ablkasir1 where tanggal BETWEEN '$daritgl' AND '$sampaitgl'");
                                        }else{
                                            $data = mysqli_query($koneksi,"SELECT * from ablkasir1");
                                        }
                                            while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <!-- <tbody> -->
                                    <tr>
                                            <td class="text-center"><?php echo $d['nomor']; ?></td>
                                            <td><?php echo $d['nama']; ?></td>
                                            <td class="text-center"><?php echo $d['alamatktp']; ?></td>
                                            <td class="text-center"><?php echo $d['alamattujuan']; ?></td>
                                            <td><?php echo date('d-M-Y', strtotime($d['tanggal'])); ?></td>
                                            <!-- <td class="text-center"><?php echo $d['total']; ?></td> -->
                                            <td class="text-center"><?php echo $d['kasir']; ?></td>
                                            
                                            <td>
                                                <a href="updateablkasir1.php?id=<?php echo $d['nomor']; ?>" type="button" data-toggle="modal" class="btn btn-primary btn-md" data-target="#myModal<?php echo $d['nomor']; ?>">
                                                <i class="fa fa-edit fa-lg"></i>
                                                </a>
                                                <a href="cetaklaporanabl.php?id=<?php echo $d['nomor']; ?>" target="_blank" class="btn btn-info btn-md">
                                                <i class="fa fa-print fa-lg" aria-hidden="true" style="color: white;"></i>
                                                </a>
                                            </td>
                                    </tr>
                                     <!-- Modal Edit Mahasiswa-->
                                    <div class="modal fade" id="myModal<?php echo $d['nomor']; ?>" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Ubah Data Pasien</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="updateablkasir1.php" method="GET">

                                                <?php
                                                include '../koneksi.php';
                                                $id = $d['nomor']; 
                                                $query_edit = mysqli_query($koneksi,"SELECT * FROM ablkasir1 WHERE nomor='$id'");
                                                while ($row = mysqli_fetch_array($query_edit)) {
                                                ?>

                                            <input type="hidden" name="nomor" value="<?php echo $row['nomor']; ?>">

                                            <!-- <div class="form-group">
                                            <label>Nomor</label>
                                            <input type="text" name="nomorsep" class="form-control" value="<?php echo $row['']; ?>">      
                                            </div> -->

                                            <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">      
                                            </div>

                                            <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamatktp" class="form-control" value="<?php echo $row['alamatktp']; ?>">      
                                            </div>

                                            <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="date" name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>" readonly>      
                                            </div> 

                                            <div class="form-group">
                                            <label>Tujuan</label>
                                            <input type="text" name="alamattujuan" class="form-control" value="<?php echo $row['alamattujuan']; ?>">      
                                            </div> 

                                            <!-- <div class="form-group">
                                            <label>Total</label>
                                            <input type="number" name="total" class="form-control" value="<?php echo $row['total']; ?>">      
                                            </div>  -->

                                            <div class="modal-footer">  
                                            <button type="submit" name="update" value="simpan" class="btn btn-info" style="color: white;">Update</button>
                                            <!-- <a href="hapus.php?id=<?php echo $d['nomor']; ?>" Onclick="alert('Data Berhasil Dihapus !')" class="btn btn-danger">Hapus</a> -->
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            </div>
                                            <?php 
                                            }
                                            ?>  
                                                
                                            </form>
                                            </div>
                                            </div>

                                            </div>
                                    </div>
                                           
                                    <?php                                     
                                        }
                                    ?>
                                    <!-- </tbody> -->
                                </table>
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
        new DataTable('#Tables', {
            responsive: true,
            layout: {
                topStart: {
                    buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    
                    }
                },
                ]
                }
            }
        });
    </script>

</body>

</html>