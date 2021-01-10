<?php
 
//mssql connection için gerekli kodlar  
 
$serverName = "DESKTOP-70KJCOM"; //mssql server name buraya gelecek.
 
$connectionInfo = array( "Database"=>"SputekDB"); //db name buraya gelecek.
$conn = sqlsrv_connect($serverName, $connectionInfo);
 
 
if ($conn) {
 echo "Connection Successfull <hr>";
}else{
 echo "Connection Failed! <hr>";
 die(print_r(sqlsrv_errors(), true));
}
 
?>