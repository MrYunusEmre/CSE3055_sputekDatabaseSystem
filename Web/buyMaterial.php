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

  $serverName = "DESKTOP-GIRCR1I";
  $connectionInfo = array( "Database"=>"sputekDB","CharacterSet" => "UTF-8");

  $conn = sqlsrv_connect($serverName , $connectionInfo);

  $Ssn = $_POST["Ssn"];
  $Count = $_POST["Count"];
  $modelId = $_POST["modelId"];

  if( $conn ) {
  }else{
       echo "Connection could not be established.<br />";
       die(print_r(sqlsrv_errors(), true));
  }

  $sqlAllMaterials = "SELECT mat.materialName,mat.materialId,mod.modelName,mod.modelId,com.companyId,com.companyName,ms.modelCount
  FROM Company_Material_Model cmp inner join Material mat on cmp.materialId=mat.materialId
                                  inner join Model mod on cmp.modelId=mod.modelId
                                  inner join Company com on cmp.companyId=com.companyId
                                  inner join Model_Storage ms on ms.modelId=mod.modelId";
  $stmtAllMaterials = sqlsrv_query($conn, $sqlAllMaterials);
  $materialId;
  $companyId;
  while( $row = sqlsrv_fetch_array( $stmtAllMaterials, SQLSRV_FETCH_ASSOC) ) {
    $tempmodelId = $row['modelId'];
    if(strcmp($tempmodelId,$modelId)==0){
      $materialId=$row['materialId'];
      $companyId=$row['companyId'];
    }
  }

  $sqlProcedureAllMaterialAndModelCounts = "exec ProcedureGiveOrderMaterial @Ssn=$Ssn , @materialId=$materialId , @modelId=$modelId , @companyId=$companyId , @count=$Count";
  $stmtProcedureAllMaterialAndModelCounts = sqlsrv_query( $conn, $sqlProcedureAllMaterialAndModelCounts );

  header("Location:MaterialList.php");

?>

</body>

</html>
