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

$name = $_POST["name"];
$lastname = $_POST["lastName"];
$ssn= $_POST["ssn"];
$mailAddress = $_POST["mailAddress"];
$phoneNumber = $_POST["phoneNumber"];
$birthDate = $_POST["birthDate"];
$address = $_POST["address"];
$userName = $_POST["userName"];
$pass = $_POST["pass"];


$serverName = "DESKTOP-70KJCOM";
$connectionInfo = array( "Database"=>"sputekDB","CharacterSet" => "UTF-8");

$conn = sqlsrv_connect($serverName , $connectionInfo);

if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die(print_r(sqlsrv_errors(), true));
}


$sql = "INSERT INTO Customer (Ssn, FirstName,LastName,BirthDate,PhoneNumber,mail,AddressDetails,userName,userPassword) VALUES (?,?,?,?,?,?,?,?,?)";
$params = array($ssn,$name,$lastname,$birthDate,$phoneNumber,$mailAddress,$address,$userName,$pass);

$flag = 0;

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
     $flag = 0;
}else{
  $flag = 1;
}

if($flag == 1){
  header("Location:index.php");
}



 ?>



</body>

</html>
