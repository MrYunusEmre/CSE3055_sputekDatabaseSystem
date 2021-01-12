ALTER PROCEDURE ProcedureUpdatingProductStorage @Ssn bigint , @productId int , @count int
AS
UPDATE ps
SET ps.productCount= @count+ps.productCount
FROM Product_Storage ps , Employee e
WHERE e.Ssn=@Ssn and ps.productId=@productId