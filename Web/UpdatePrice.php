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

  $serverName = "DESKTOP-70KJCOM";
  $connectionInfo = array( "Database"=>"sputekDB","CharacterSet" => "UTF-8");

  $conn = sqlsrv_connect($serverName , $connectionInfo);

  $UpdatedPrice = $_POST["UpdatedPrice"];
  $modelId = $_POST["modelId"];

  if( $conn ) {
  }else{
       echo "Connection could not be established.<br />";
       die(print_r(sqlsrv_errors(), true));
  }

  $sqlProcedureUpdatePrice = "exec ProcedureUpdatePrice @modelId=$modelId , @price=$UpdatedPrice";
  $stmtProcedureUpdatePrice = sqlsrv_query( $conn, $sqlProcedureUpdatePrice );

  header("Location:UpdateMaterialPrice.php");

?>

</body>

</html>
