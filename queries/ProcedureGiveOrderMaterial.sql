--use SputekDB
ALTER PROCEDURE ProcedureGiveOrderMaterial @Ssn bigint , @materialId int , @modelId int , @companyId int , @count int
AS

DECLARE @controlM int = 0
SELECT @controlM=cmp.materialId
FROM Company_Material_Model cmp
WHERE cmp.materialId=@materialId and cmp.modelId=@modelId and cmp.companyId=@companyId

DECLARE @controlE bigint = 0
SELECT @controlE=employee.Ssn
FROM Employee employee
WHERE employee.Ssn=@Ssn

IF @controlE=0 or @controlM=0
	SELECT 'Wrong Input'
ELSE 
	insert into Order_Company values
	(@Ssn,@materialId,@modelId,@companyId,@count,SYSDATETIME())