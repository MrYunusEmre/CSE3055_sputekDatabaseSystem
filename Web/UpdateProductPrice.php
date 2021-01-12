<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets2/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin Panel</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets2/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets2/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets2/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets2/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets2/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets2/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://sputek.com" class="simple-text">
                    SPUTEK
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Welcome</p>
                    </a>
                </li>
                <li>
                    <a href="EmployeeList.php">
                        <i class="pe-7s-note2"></i>
                        <p>Employee List</p>
                    </a>
                </li>
								<li>
										<a href="CustomerList.php">
												<i class="pe-7s-note2"></i>
												<p>Customer List</p>
										</a>
								</li>
                <li>
                    <a href="MaterialList.php">
                        <i class="pe-7s-note2"></i>
                        <p>Material List</p>
                    </a>
                </li>
								<li >
										<a href="UpdateMaterialPrice.php">
												<i class="pe-7s-note2"></i>
												<p>Update Material Price</p>
										</a>
								</li>
								<li>
										<a href="ProductList.php">
												<i class="pe-7s-note2"></i>
												<p>Product List</p>
										</a>
								</li>
								<li class="active">
										<a href="UpdateProductPrice.php">
												<i class="pe-7s-note2"></i>
												<p>Update Product Price</p>
										</a>
								</li>
								<li>
										<a href="index.php">
												<i class="pe-7s-note2"></i>
												<p>Exit</p>
										</a>
								</li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Product List</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Product Price</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                      <th>Product</th>
                                    	<th>Price</th>
																			<th>Update Price</th>
                                    </thead>
                                    <tbody>
																			<?php

																				$serverName = "DESKTOP-70KJCOM";
																				$connectionInfo = array( "Database"=>"sputekDB","CharacterSet" => "UTF-8");

																				$conn = sqlsrv_connect($serverName , $connectionInfo);

																				if( $conn ) {
																				}else{
																						 echo "Connection could not be established.<br />";
																						 die(print_r(sqlsrv_errors(), true));
																				}

																				$sqlAllMaterials = "SELECT * FROM Product p";
																				$stmtAllMaterials = sqlsrv_query($conn, $sqlAllMaterials);

																				while( $row = sqlsrv_fetch_array( $stmtAllMaterials, SQLSRV_FETCH_ASSOC) ) {
																						printf("
																						<tr>
																							<td>%s</td>
																							<td>%s</td>
																							<td>
																								<form method=post action=UpdatePriceProduct.php>
																									<input type=hidden size=1 class=form__field value=%s name=productId id='productId' readonly />
																									<input type=input class=form__field placeholder=UpdatedPrice name=UpdatedPrice id='UpdatedPrice' required />
																									<button>Update</button>
																								</form>
																							</td>
																						</tr>",$row['productName'],$row['productPrice'],$row['productId']);
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
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="dashboard.php">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="http://sputek.com">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets2/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets2/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets2/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets2/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets2/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets2/js/demo.js"></script>


</html>
