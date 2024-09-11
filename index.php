<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Login</title>

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
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="css/sb-admin-2.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

  </head>

<body style="background: url('img/3.png'); no-repeat center fixed; background-size: cover;">
<!-- <img src="img/medis.jpeg"> -->

<!-- <video autoplay muted loop id="myVideo">
  <source img src="img/rsudok.mp4" type="video/mp4">
</video> -->

<div class="container">
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
      echo '<h4 class="alert alert-danger text-center" role="alert">Ussername Atau Password yang Anda Masukkan Salah !</h4>';
		}
	}
	?>
      <!-- Outer Row -->
      <div class="d-flex justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9" >
          <div class="card o-hidden border-0 shadow-lg my-5" >
            <br>
            <br>
              <div class="row">
              <video autoplay muted loop id="myVideo" class="col-lg-12">
                <source src="img/logook.mp4" type="video/mp4">
              </video>
              <br><br>

                <!-- <img src="img/logorsud.png" class="col-lg-6 d-none d-lg-block float-sm-start" > -->
                <div class="col-lg-6">
                  <div class="p-5">
                    <br>
                    
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Selamat Datang !</h1>
                    </div>
                    <div class="form">
                        <form action="ceklogin.php" method="POST">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input class="form-control" type="text" name="username" placeholder="Username" required/>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Password" required/>
                            </div>

                            <input type="submit" class="btn btn-primary btn-block" name="login" value="login">
                        </form>
                        
                        <br>
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

    <script>
  
      
    </script>

</body>
</html>