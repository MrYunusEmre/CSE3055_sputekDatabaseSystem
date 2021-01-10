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

$username = $_POST["username"];
$userpassword = $_POST["pass"];


$serverName = "DESKTOP-70KJCOM";
$connectionInfo = array( "Database"=>"sputekDB");

$conn = sqlsrv_connect($serverName , $connectionInfo);

if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die(print_r(sqlsrv_errors(), true));
}

$sqlUserName = "SELECT userName FROM Customer";
$sqlUserPassword = "SELECT userPassword FROM Customer";

$stmtname = sqlsrv_query( $conn, $sqlUserName );
if( $stmtname === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$stmtpass = sqlsrv_query( $conn, $sqlUserPassword );
if( $stmtpass === false) {
    die( print_r( sqlsrv_errors(), true) );
}


while( $row = sqlsrv_fetch_array( $stmtname, SQLSRV_FETCH_ASSOC) ) {
    if(strcmp($row["userName"] , $username) == 0){
      echo "kullanıcı adı başarıyla eşleşti";
      while( $row = sqlsrv_fetch_array( $stmtpass, SQLSRV_FETCH_ASSOC) ){
        if(strcmp($row["userPassword"], $userpassword) == 0){
          echo "şifre başarıyla eşleşti";
          header("Location:welcomePage.php");
          break;
        }
      }
    }
  }

sqlsrv_free_stmt( $stmtname);
sqlsrv_free_stmt( $stmtpass);

?>





</body>

</html>
