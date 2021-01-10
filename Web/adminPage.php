<!DOCTYPE html>
<html lang="tr-TR">

<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
	<meta http-equiv="Content-Language" content="tr">
	<meta charset="utf-8">

	<title>Admin Panel</title>
</head>

<body>

<form method="post" , action="getAllMaterials.php">

  <button name="getAllMaterials"></button>

</form>


<?php

$serverName = "DESKTOP-70KJCOM";
$connectionInfo = array( "Database"=>"sputekDB");

$conn = sqlsrv_connect($serverName , $connectionInfo);

if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die(print_r(sqlsrv_errors(), true));
}

?>





</body>

</html>
