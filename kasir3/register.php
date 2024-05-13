
<?php

session_start();

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) 
    header("Location: login.php"); 
}

?>





 <!-- Custom fonts for this template-->
 <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Pesbuk</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="Register" style="background: url('img/3.png'); no-repeat center fixed; background-size: cover;">




<div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <br>
              <div class="row">
                <img src="img/logo2.jpg" class="col-lg-6 d-none d-lg-block float-sm-start" style="height:20%;">
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h1 text-gray-900 mb-4">Registrasi !</h1>
                    </div>
                    <div class="form">
                        <form action="" method="post" name="login">
                        <div class="form-group">
                                <!-- <label for="name">Nama Lengkap</label> -->
                                <input class="form-control" type="text" name="name" placeholder="Nama kamu" required/>
                            </div>

                            <div class="form-group">
                                <!-- <label for="username">Username</label> -->
                                <input class="form-control" type="text" name="username" placeholder="Username" required />
                            </div>

                            <div class="form-group">
                                <!-- <label for="email">Email</label> -->
                                <input class="form-control" type="email" name="email" placeholder="Alamat Email" required/>
                            </div>

                            <div class="form-group">
                                <!-- <label for="password">Password</label> -->
                                <input class="form-control" type="password" name="password" placeholder="Password" required/>
                            </div>
                            



                                              <!-- <div class="RegisterModal">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal1">Registrasi</button>
                                                </div>
                                                <br><br>
                                                <div class="modal fade" id="myModal1" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header"> -->
                                                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                                        <!-- <h4 class="modal-title">PEMBERITAHUAN !</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        <p>Registrasi Berhasil ! Silahkan Melakukan Login !</p>
                                                        </div>
                                                        <div class="modal-footer"> -->
                                                        <!-- <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button> -->
                                                        <!-- <button type="submit" name="register" class="btn btn-success" value="Daftar">OK</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                              </div> -->


                            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />
                            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

                        </form>
                        
                        <!-- <p>Belum terdaftar ? <a href='register.php'>Daftar disini</a></p> -->
                    </div>
                    
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
</div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<?
    session_unset();
    session_destroy();  
    header("Location: login.php");
?>
</body>
</html>