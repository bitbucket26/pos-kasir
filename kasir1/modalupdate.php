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
                                            
                                            <td><?php echo date('d-M-Y', strtotime($d['tanggalbayar'])); ?></td>
                                            <td><?php echo $d['yangmenerima']; ?></td>
                                            
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
                                            <!-- <a href="hapus.php?id=<?php echo $d['nomornota']; ?>" Onclick="alert('Data Berhasil Dihapus !')" class="btn btn-danger">Hapus</a> -->
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