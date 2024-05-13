 <?
 $koneksi = mysqli_connect("localhost","root","","kasir");
 
 // Check connection
 if (mysqli_connect_error()){
     echo "Koneksi database gagal : " . mysqli_connect_error();
 }
 ?>
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arround">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><h5><?php echo $_SESSION['username']; ?></h5></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/logo2.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in w-auto p-3"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider" ></div>
                                    <p class="text-center"><?php echo $_SESSION['username'];?></p>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>


                    </ul>