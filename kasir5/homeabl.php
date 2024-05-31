<?php 
session_start();

// cek apakah yang mengakses halaman ini sudah login
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

    <title>Data Ambulan</title>

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

                <div class="row" style="padding: 5px 10px;">
                <div class="col-xl-8 mb-4 float-none" style="padding: 20px;">
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
                                            <a href="cetaknotaabl.php" target="_blank">
                                            <button type="button" name="btnyes" class="btn btn-danger btn-md" value="Cetak1">Cetak Data Terakhir Input</button>
                                            </a>
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
                                echo " Berikut Adalah Data Dari Tanggal ".$daritgl. " S/d Tanggal " .$sampaitgl ;
                        }
                    ?>
                </div>
            </div>
            <div class="card shadow mb-4" style="margin-left: 20px; margin-right: 20px;">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Data Ambulan</h5>
                            </div>
                            <div class="card-body">
                                <table class="DataTable table-striped" id="Tables" style="width: 100%; font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nomor</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Tujuan</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Jarak</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Kasir</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>

                                    <?php 
                                        include '../koneksi.php';
                                        $no = 1;
                                        if(isset($_GET['filter'])) {
                                            $daritgl = mysqli_real_escape_string($koneksi, $_GET['daritgl']);
                                            $sampaitgl = mysqli_real_escape_string($koneksi, $_GET['sampaitgl']);
                                            $data = mysqli_query($koneksi,"SELECT * from ablkasir5 where tanggal BETWEEN '$daritgl' AND '$sampaitgl'");
                                        }else{
                                            $data = mysqli_query($koneksi,"SELECT * from ablkasir5");
                                        }
                                            while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <!-- <tbody> -->
                                    <tr>
                                            <td class="text-center"><?php echo $d['nomor']; ?></td>
                                            <td class="text-center"><?php echo $d['nama']; ?></td>
                                            <td class="text-center"><?php echo $d['alamatktp']; ?>-<?php echo $d['alamattujuan']; ?></td>
                                            <td class="text-center"><?php echo $d['alamattujuan']; ?></td>
                                            <td class="text-center"><?php echo date('d-M-Y', strtotime($d['tanggal'])); ?></td>
                                            <td class="text-center"><?php echo $d['jaraktempuh']; ?></td>
                                            <td class="text-center"><?php echo number_format($d['total']); ?></td>
                                            <td class="text-center"><?php echo $d['kasir']; ?></td>
                                            
                                            <td>
                                                <a href="updateabl.php?id=<?php echo $d['nomor']; ?>" type="button" data-toggle="modal" class="btn btn-primary btn-md" data-target="#myModal<?php echo $d['nomor']; ?>">
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

                                            <!-- Modal content -->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Ubah Data</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="updateabl.php" method="GET">

                                                <?php
                                                include '../koneksi.php';
                                                $id = $d['nomor']; 
                                                $query_edit = mysqli_query($koneksi,"SELECT * FROM ablkasir5 WHERE nomor='$id'");
                                                while ($row = mysqli_fetch_array($query_edit)) {
                                                ?>

                                            <input type="hidden" name="nomor" value="<?php echo $row['nomor']; ?>">

                                            <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="date" name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>">      
                                            </div>

                                            <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">      
                                            </div>

                                            <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamatktp" class="form-control" value="<?php echo $row['alamatktp']; ?>">      
                                            </div>
                                            
                                            <div class="form-group">
                                            <label>Tujuan</label>
                                            <input type="text" name="alamattujuan" class="form-control" value="<?php echo $row['alamattujuan']; ?>">      
                                            </div> 

                                            <div class="form-group">
                                            <label>Supir</label>
                                            <input type="text" name="supir" class="form-control" value="<?php echo $row['supir']; ?>">      
                                            </div>

                                            <div class="form-group">
                                            <label>Jarak Tampuh</label>
                                            <input type="text" name="jaraktempuh" class="form-control" value="<?php echo $row['jaraktempuh']; ?>">      
                                            </div> 

                                            <div class="form-group">
                                            <label>Total</label>
                                            <input type="number" name="total" class="form-control" value="<?php echo $row['total']; ?>">      
                                            </div> 

                                            <div class="modal-footer">  
                                            <button type="submit" name="update" value="simpan" class="btn btn-info" style="color: white;">Update</button>
                                            <a href="hapusabl.php?id=<?php echo $d['nomor']; ?>" Onclick="alert('Data Berhasil Dihapus !')" class="btn btn-danger">Hapus</a>
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