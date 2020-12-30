CREATE PROCEDURE ProcedureGiveRandomOrderMaterial
AS	

DECLARE @randomSsn bigint
SELECT top(1) @randomSsn=employee.Ssn
FROM Employee employee
ORDER BY NEWID()

declare @randomMaterialId int
SELECT top(1) @randomMaterialId=material.materialId
FROM Material material
ORDER BY NEWID()

--SELECT @randomMaterialId as "Material id"

DECLARE @randomModelId int
SELECT top(1) @randomModelId = model.modelId
FROM Model model , Material material
WHERE model.materialId=@randomMaterialId
ORDER BY NEWID()

--SELECT @randomModelId as "Model id"

DECLARE @randomCompanyId int
SELECT top(1) @randomCompanyId = company.companyID
FROM Model model , Material material , Company company , Company_Material_Model cmp
WHERE model.materialId=@randomMaterialId and cmp.modelId=@randomModelId and cmp.materialId=@randomMaterialId and cmp.companyId=company.companyID 
ORDER BY NEWID()

--SELECT @randomCompanyId as "Company id"

DECLARE @lower_limit int = 5
DECLARE @upper_limit int = 1 
DECLARE @randomCount int
SELECT @randomCount=ROUND((@upper_limit - @lower_limit) * RAND(CHECKSUM(NEWID())), 0) + @lower_limit

insert into Order_Company values
(@randomSsn,@randomMaterialId,@randomModelId,@randomCompanyId,@randomCount,SYSDATETIME())