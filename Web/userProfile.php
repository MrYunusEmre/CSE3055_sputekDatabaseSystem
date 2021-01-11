
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Sputek
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">

<?php

$serverName = "DESKTOP-GIRCR1I";
$connectionInfo = array( "Database"=>"sputekDB","CharacterSet" => "UTF-8");

$conn = sqlsrv_connect($serverName , $connectionInfo);

if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die(print_r(sqlsrv_errors(), true));
}

$sqlCustomer = "SELECT * FROM Customer";

$stmt = sqlsrv_query( $conn, $sqlCustomer );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

session_start();
$Ssn = $_SESSION["Ssn"];
$FirstName = "";
$LastName = "";
$BirthDate = "";
$Age = "";
$PhoneNumber = "";
$mail = "";
$Address = "";
$CityNo = "";
$userName = "";
$userPassword = "";

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
  if(strcmp($row["Ssn"], $Ssn) == 0){

    $FirstName = $row["FirstName"];
    $LastName = $row["LastName"];
    $Age = $row["Age"];
    $PhoneNumber = $row["PhoneNumber"];
    $mail = $row["mail"];
    $Address = $row["AddressDetails"];
    $CityNo = $row["CityNo"];
    $userName = $row["userName"];
    $userPassword = $row["userPassword"];

    break;
  }
}

 ?>


  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="http://sputek.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="products.php" class="simple-text logo-normal">
          Ürünler
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="solarTekne.php">
              <i class="nc-icon nc-bank"></i>
              <p>Solar Tekne</p>
            </a>
          </li>
          <li>
            <a href="solarCardak.php">
              <i class="nc-icon nc-diamond"></i>
              <p>Solar Çardak</p>
            </a>
          </li>
          <li>
            <a href="solarBank.php">
              <i class="nc-icon nc-pin-3"></i>
              <p>Solar Bank</p>
            </a>
          </li>
          <li>
            <a href="sulama.php">
              <i class="nc-icon nc-bell-55"></i>
              <p>Sulama Sistemi</p>
            </a>
          </li>
          <li>
            <a href="mobilSulama.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Mobil Sulama Sistemi</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Kullanıcı Bilgileri</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="userProfile.php">Profili Görüntüle</a>
                  <a class="dropdown-item" href="index.php">Çıkış Yap</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="./assets/img/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">

                    <?php

                    $serverName = "DESKTOP-GIRCR1I";
                    $connectionInfo = array( "Database"=>"sputekDB","CharacterSet" => "UTF-8");

                    $conn = sqlsrv_connect($serverName , $connectionInfo);

                    if( $conn ) {
                    }else{
                         echo "Connection could not be established.<br />";
                         die(print_r(sqlsrv_errors(), true));
                    }

                    $sqlCustomer = "SELECT * FROM Customer";

                    $stmt = sqlsrv_query( $conn, $sqlCustomer );
                    if( $stmt === false) {
                        die( print_r( sqlsrv_errors(), true) );
                    }


                    $Ssn = $_SESSION["Ssn"];
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
                      if(strcmp($row["Ssn"], $Ssn) == 0){
                        printf("
                        <a href=#>
                          <img class=avatar border-gray src=./assets/img/logo-small.png alt=...>
                          <h5 class=title>%s</h5>
                        </a>
                        <p class=description>
                          @%s
                        </p>
                        ",$row['FirstName'],$row['userName']);

                      }
                    }


                    ?>

                </div>

              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                </div>
              </div>
            </div>

          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Profili Düzenle</h5>
              </div>
              <div class="card-body">
              <form action="updateUser.php">
                <?php


                $serverName = "DESKTOP-GIRCR1I";
                $connectionInfo = array( "Database"=>"sputekDB","CharacterSet" => "UTF-8");

                $conn = sqlsrv_connect($serverName , $connectionInfo);

                if( $conn ) {
                }else{
                     echo "Connection could not be established.<br />";
                     die(print_r(sqlsrv_errors(), true));
                }

                $sqlCustomer = "SELECT * FROM Customer";

                $stmt = sqlsrv_query( $conn, $sqlCustomer );
                if( $stmt === false) {
                    die( print_r( sqlsrv_errors(), true) );
                }

                $Ssn = $_SESSION["Ssn"];
                $FirstName = "";
                $LastName = "";
                $BirthDate = "";
                $Age = "";
                $PhoneNumber = "";
                $mail = "";
                $Address = "";
                $CityNo = "";
                $userName = "";
                $userPassword = "";

                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
                  if(strcmp($row["Ssn"], $Ssn) == 0){

                    $FirstName = $row["FirstName"];
                    $LastName = $row["LastName"];
                    $Age = $row["Age"];
                    $PhoneNumber = $row["PhoneNumber"];
                    $mail = $row["mail"];
                    $Address = $row["AddressDetails"];
                    $CityNo = $row["CityNo"];
                    $userName = $row["userName"];
                    $userPassword = $row["userPassword"];

                    break;
                  }
                }




                  printf("
                  <div class=row>
                    <div class=col-md-4 px-3>
                      <div class=form-group>
                        <label>Kullanıcı Adı</label>
                        <input type=text class=form-control disabled= placeholder=Username value=%s>
                      </div>
                    </div>
                    <div class=col-md-4 px-3>
                      <div class=form-group>
                        <label>Şifre</label>
                        <input type=text name=sifre class=form-control placeholder=Sifre value=%s>
                      </div>
                    </div>
                    <div class=col-md-4 pl-1>
                      <div class=form-group>
                        <label for=exampleInputEmail1>E-Mail</label>
                        <input type=email class=form-control disabled= placeholder=Email value=%s>
                      </div>
                    </div>
                  </div>
                  <div class=row>
                    <div class=col-md-6 pr-1>
                      <div class=form-group>
                        <label>Ad</label>
                        <input type=text name=isim class=form-control placeholder=Company value=%s>
                      </div>
                    </div>
                    <div class=col-md-6 pl-1>
                      <div class=form-group>
                        <label>Soyad</label>
                        <input type=text name=soyad class=form-control placeholder=Last Name value=%s>
                      </div>
                    </div>
                  </div>
                  <div class=row>
                    <div class=col-md-12>
                      <div class=form-group>
                        <label>Adres</label>
                        <input type=text name=adres class=form-control placeholder=Home Address value=%s>
                      </div>
                    </div>
                  </div>
                  <div class=row>
                    <div class=col-md-4 pr-1>
                      <div class=form-group>
                        <label>Şehir</label>
                        <input type=text name=sehir class=form-control placeholder=City value=Ankara>
                      </div>
                    </div>

                    <div class=col-md-4 pl-1>
                      <div class=form-group>
                        <label>Posta Kodu</label>
                        <input type=number name=postaKodu class=form-control value=%s>
                      </div>
                    </div>

                    ", $userName ,$userPassword, $mail,$FirstName,$LastName,$Address,$CityNo);
                  ?>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Profili Güncelle</button>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="http://sputek.com" target="_blank">Creative Tim</a></li>
                <li><a href="http://sputek.com" target="_blank">Blog</a></li>
                <li><a href="http://sputek.com" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Sputek Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
</body>

</html>
