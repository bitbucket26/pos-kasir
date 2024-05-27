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

                    <div class="col-xl-10 mb-4 float-none">
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
                                            <a href="cetaknota.php" target="_blank">
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
                            <!-- <div class="table-responsive"> -->
                                <table class="DataTable table-sm table-striped table-bordered text-capitalize" id="DataTable" width="100%" cellspacing="0" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.Nota</th>
                                            <th style="text-align: center;">No.SEP</th>
                                            <th style="text-align: center;">No.Medrec</th>
                                            <th style="text-align: center;">Nama Pasien</th>
                                            <th style="text-align: center; ">Alamat</th>
                                            <th style="text-align: center;">Tgl.Bayar</th>
                                            <th style="text-align: center;">Total</th>
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
                                            $data = mysqli_query($koneksi,"SELECT * from kasir1 where tanggalbayar BETWEEN '$daritgl' AND '$sampaitgl'");
                                        }else{
                                            $data = mysqli_query($koneksi,"SELECT * from kasir1");
                                        }
                                            while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <!-- <tbody> -->
                                    <tr>
                                            <td class="text-center"><?php echo $d['nomornota']; ?></td>
                                            <td class="text-center"><?php echo $d['nomorsep']; ?></td>
                                            <td class="text-center"><?php echo $d['nomormedrec']; ?></td>
                                            <td class="text-center"><?php echo $d['namapasien']; ?></td>
                                            <td class="text-center"><?php echo $d['alamat']; ?></td>
                                            <td class="text-center"><?php echo date('d-M-Y', strtotime($d['tanggalbayar'])); ?></td>
                                            <td class="text-center"><?php echo number_format($d['total']); ?></td>
                                            <td class="text-center"><?php echo $d['yangmenerima']; ?></td>
                                            
                                            <td>
                                                <a href="update.php?id=<?php echo $d['nomornota']; ?>" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $d['nomornota']; ?>"></a>
                                                <a href="cetaklaporan.php?id=<?php echo $d['nomornota']; ?>" target="_blank" class="btn btn-info btn-md">
                                                <i class="fa fa-print fa-lg" aria-hidden="true" style="color: white;"></i>
                                                </a>
                                            </td>
                                    </tr>
                                     <!-- Modal Edit Mahasiswa-->
                                    <div class="modal fade" id="myModal<?php echo $d['nomornota']; ?>" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Ubah Data Pasien</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="update.php" method="GET">

                                                <?php
                                                include '../koneksi.php';
                                                $id = $d['nomornota']; 
                                                $query_edit = mysqli_query($koneksi,"SELECT * FROM kasir1 WHERE nomornota='$id'");
                                                while ($row = mysqli_fetch_array($query_edit)) {
                                                ?>

                                            <input type="hidden" name="nomornota" value="<?php echo $row['nomornota']; ?>">

                                            <div class="form-group">
                                            <label>Nomor SEP</label>
                                            <input type="text" name="nomorsep" class="form-control" value="<?php echo $row['nomorsep']; ?>">      
                                            </div>

                                            <div class="form-group">
                                            <label>Nama Pasien</label>
                                            <input type="text" name="namapasien" class="form-control" value="<?php echo $row['namapasien']; ?>">      
                                            </div>

                                            <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">      
                                            </div>

                                            <div class="form-group">
                                            <label>Tanggal Bayar</label>
                                            <input type="date" name="tanggalbayar" class="form-control" value="<?php echo $row['tanggalbayar']; ?>" readonly>      
                                            </div> 

                                            <!-- <div class="form-group">
                                            <label>Total Awal</label>
                                            <input type="number" name="totalawal" class="form-control" id="totalawal" value="<?php echo $row['total']; ?>" readonly>      
                                            </div>

                                            <div class="form-group">
                                            <label>Kurangi Total</label>
                                            <input type="number" name="kurangi" class="form-control" id="kurangi" >      
                                            </div>

                                            <div class="form-group">
                                            <label>Total</label>
                                            <input type="number" name="total" class="form-control" id="totalakhir" readonly>   
                                            </div>
                                            <button type="button" class="btn btn-primary btn-xl" onclick="kurangitotal()" >Hitung</button> -->

                                            <!-- <input type="text" name="tarifkelas1" id="tarif1" value="<?php echo $row['tarifkelas1']; ?>" readonly hidden>
                                            <input type="text" name="tarifkelas2" id="tarif2" value="<?php echo $row['tarifkelas2']; ?>" readonly hidden>
                                            <input type="text" name="realcoast" id="realcost" value="<?php echo $row['realcoast']; ?>" readonly hidden> -->

                                            <!-- <input type="text" name="nota1" id="not1jr2vip" class="form-control" onclick="kurangitotal()" readonly hidden>
                                                    
                                            <input type="text" name="nota2" id="not2jr2vip" class="form-control" onclick="kurangitotal()" readonly hidden>         -->

                                            <div class="modal-footer">  
                                            <button type="submit" name="update" value="simpan" class="btn btn-info">Update</button>
                                            <a href="hapus.php?id=<?php echo $d['nomornota']; ?>" Onclick="alert('Data Berhasil Dihapus !')" class="btn btn-danger">Hapus</a>
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
                            <!-- </div> -->
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php 
                include "footer.php";
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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

    <script>
        function kurangitotal() {
        var a = document.getElementById("totalawal").value;
        var b = document.getElementById("kurangi").value;
        var c = parseInt (a) - parseInt (b);
        // var d = document.getElementById("tarif1").value * 75/100;
        // var e = document.getElementById("tarif2").value * 75/100;

        
        document.getElementById("totalakhir").value = (c);
        // document.getElementById("not1jr2vip").value = (e);
        // document.getElementById("not2jr2vip").value = (d);
        }
    </script>


    
</body>

</html>