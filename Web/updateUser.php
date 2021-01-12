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

$Ssn = $_SESSION["Ssn"];

$Ad = $_GET["isim"];
$Soyad = $_GET["soyad"];
$Adres = $_GET["adres"];
$Sifre = $_GET["sifre"];


$serverName = "DESKTOP-70KJCOM";
$connectionInfo = array( "Database"=>"sputekDB","CharacterSet" => "UTF-8");

$conn = sqlsrv_connect($serverName , $connectionInfo);

if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die(print_r(sqlsrv_errors(), true));
}

$sql = "UPDATE Customer SET FirstName = ?,LastName = ?,AddressDetails = ?,userPassword = ? WHERE Ssn = ?";
$params = array( $Ad, $Soyad , $Adres ,$Sifre,$Ssn );

$flag = 0;
$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
     $flag = 0;
}else{
  $flag = 1;
}

if($flag == 1){
  header("Location:userProfile.php");
}




 ?>




</body>

</html>
