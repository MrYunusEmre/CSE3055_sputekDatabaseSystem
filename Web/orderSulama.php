<!DOCTYPE html>
<html lang="tr-TR">

<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
	<meta http-equiv="Content-Language" content="tr">
	<meta charset="utf-8">

	<title>Sayfa Baslıgı</title>
</head>

<body>

<?php

session_start();

$Ssn = $_SESSION['Ssn'];
$productId = 4;
$miktar = $_GET["miktar"];

$serverName = "DESKTOP-GIRCR1I";
$connectionInfo = array( "Database"=>"sputekDB","CharacterSet" => "UTF-8");

$conn = sqlsrv_connect($serverName , $connectionInfo);

if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die(print_r(sqlsrv_errors(), true));
}

$sqlOrder = "EXECUTE ProcedureGiveOrderProduct @Ssn = ?, @productId = ?, @count = ?";
$params =array( $Ssn, $productId , $miktar );
$flag = 0;

$stmt = sqlsrv_prepare( $conn, $sqlOrder, $params );
if( !$stmt ) {
    die( print_r( sqlsrv_errors(), true));
}


if( sqlsrv_execute( $stmt ) === false ) {
      $flag = 1;
      die( print_r( sqlsrv_errors(), true));
}

if($flag == 0){
  header("Location:products.php");
}

 ?>


</body>

</html>
