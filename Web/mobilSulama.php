<!DOCTYPE html>
<html lang="tr-TR">

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

  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">

        <a href="products.php" class="simple-text logo-normal">

           <div class="logo-image-big">
            <img src="sputekLogo.jpg" align="center">
          </div>
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
							<i class="nc-icon nc-diamond"></i>
							<p>Sulama Sistemi</p>
						</a>
					</li>
					<li>
						<li class="active ">
							<a href="mobilSulama.php">
								<i class="nc-icon nc-diamond"></i>
								<p>Mobil Sulama Sistemi</p>
							</a>
						</li>
						<li>
        </ul>
      </div>
    </div>
    <div class="main-panel" style="height: 100vh;">
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
            <a class="navbar-brand" href="javascript:;">MOBİL SULAMA SİSTEMİ</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://sputek.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
          <div class="col-md-12">
              <!---      BURASI BILGILERIN OLACAGI YER        --->
            <img src="mobilSulama.jpg" width="600" height="400" alt="sputek" ALIGN="left" style="padding: 5px;">

            <div class="container">
              <div class="center" align="bottom">
              </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>  </br>
              <?php

              $serverName = "DESKTOP-GIRCR1I";
              $connectionInfo = array( "Database"=>"sputekDB","CharacterSet" => "UTF-8");

              $conn = sqlsrv_connect($serverName , $connectionInfo);

              if( $conn ) {
              }else{
                   echo "Connection could not be established.<br />";
                   die(print_r(sqlsrv_errors(), true));
              }

               $sql = "SELECT productPrice From Product WHERE productId = 5";

               $stmt = sqlsrv_query( $conn, $sql );
               if( $stmt === false) {
                   die( print_r( sqlsrv_errors(), true) );
               }

               while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
                    printf("<p>ÜRÜN FİYATI : %sTL</p>" , $row["productPrice"]);
               }

               ?>

              <form action="orderMobilSulama.php">
                <label for="miktar">Miktar:</label>
                 <select name="miktar" id="miktar">
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                 </select>
               </br> </br>
              <button type="submit" value="Submit" style="padding: 5px 10px;">SATIN AL</button>
              </form>

          </div>
        </div>
      </div>
      <footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
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
                © 2020, made with <i class="fa fa-heart heart"></i> by Sputek Tim
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
  <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
</body>

</html>
