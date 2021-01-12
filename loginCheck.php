<!DOCTYPE html>
<html lang="tr-TR">

<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
	<meta http-equiv="Content-Language" content="tr">
	<meta charset="utf-8">

	<title>Sayfa Baslıgı</title>
</head>

<body>

<?php

$username = $_POST["username"];
$userpassword = $_POST["pass"];


$serverName = "DESKTOP-70KJCOM";
$connectionInfo = array( "Database"=>"sputekDB","CharacterSet" => "UTF-8");

$conn = sqlsrv_connect($serverName , $connectionInfo);

if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die(print_r(sqlsrv_errors(), true));
}

$sqlUserName = "SELECT userName FROM Customer";
$sqlUserPassword = "SELECT userPassword , Ssn FROM Customer ";
$sqlUserSsn = "SELECT Ssn , userName FROM Customer ";
$Ssn = "";
$stmtname = sqlsrv_query( $conn, $sqlUserName );
if( $stmtname === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$stmtpass = sqlsrv_query( $conn, $sqlUserPassword );
if( $stmtpass === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$stmtSsn = sqlsrv_query( $conn, $sqlUserSsn );
if( $stmtSsn === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$sqlEmployee = "SELECT Ssn From Employee";

$stmtEmp = sqlsrv_query( $conn, $sqlEmployee );
if( $stmtEmp === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$flagEmployee = 0;

while( $row = sqlsrv_fetch_array( $stmtEmp, SQLSRV_FETCH_ASSOC) ){
	if(strcmp($row["Ssn"], $username) == 0 && strcmp($userpassword,"admin") == 0){

		$flagEmployee = 1;
		break;
	}
}


$flag = 0;
while( $row = sqlsrv_fetch_array( $stmtname, SQLSRV_FETCH_ASSOC) ) {
    if(strcmp($row["userName"] , $username) == 0){

      while( $row = sqlsrv_fetch_array( $stmtpass, SQLSRV_FETCH_ASSOC) ){
        if(strcmp($row["userPassword"], $userpassword) == 0){

					$Ssn = $row["Ssn"];

          $flag = 1;
          break;
        }
      }
    }
  }

if($flagEmployee == 1){
	session_start();

	$_SESSION['Ssn'] = $Ssn;

	header("Location:dashboard.php");

}elseif($flag == 1){
	session_start();

	$_SESSION['Ssn'] = $Ssn;

	header("Location:products.php");

}else{
	header("Location:loginError.php");
}


sqlsrv_free_stmt( $stmtname);
sqlsrv_free_stmt( $stmtpass);


 ?>


</body>

</html>
