<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Panel
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./css/bootstrap.min.css" rel="stylesheet" />
  <link href="./css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="http://sputek.com" class="simple-text logo">
            <img src="./images/logo.png" width="100" height="100" >
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <form class="Personel List" action="icons.html" method="post">
            <li class="active ">
              <a href="./personelList.php">
                <i class="nc-icon nc-bullet-list-67"></i>
                <p>Personel List</p>
              </a>
            </li>
          </form>
          <li>
            <a href="javascript:;">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Product List</p>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Material List</p>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="nc-icon nc-paper"></i>
              <p>Customer Bills</p>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="nc-icon nc-paper"></i>
              <p>Company Bills</p>
            </a>
          </li>
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
            <a class="navbar-brand" href="javascript:;">Sputek Admin Panel</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Employee List</h4>
              </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Ssn
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Surname
                  </th>
                  <th>
                    Age
                  </th>
                  <th>
                    Phone Number
                  </th>
                  <th>
                    Mail
                  </th>
                  <th>
                    Position
                  </th>
                </thead>
                <tbody>
                      <?php

                        $serverName = "DESKTOP-70KJCOM";
                        $connectionInfo = array( "Database"=>"sputekDB");

                        $conn = sqlsrv_connect($serverName , $connectionInfo);

                        if( $conn ) {
                        }else{
                             echo "Connection could not be established.<br />";
                             die(print_r(sqlsrv_errors(), true));
                        }

                        $sqlEmployee = "SELECT * FROM Employee";
                        $stmtEmployee = sqlsrv_query( $conn, $sqlEmployee );

                        while( $row = sqlsrv_fetch_array( $stmtEmployee, SQLSRV_FETCH_ASSOC) ) {
                            printf("
                            <tr>
                              <td>%s</td>
                              <td>%s</td>
                              <td>%s</td>
                              <td>%s</td>
                              <td>%s</td>
                              <td>%s</td>
                              <td>%s</td>
                            </tr>",$row['Ssn'],$row['FirstName'],$row['LastName'],$row['Age'],$row['PhoneNumber'],$row['mail'],$row['Position']);
                        }

                      ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.sputek.com" target="_blank">Sputek</a></li>
              </ul>
            </nav>
      </footer>
    </div>
  </div>
</div>
  </body>

</html>
