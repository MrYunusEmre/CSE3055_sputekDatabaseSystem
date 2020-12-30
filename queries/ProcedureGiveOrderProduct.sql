--use SputekDB
ALTER PROCEDURE ProcedureGiveOrderProduct @Ssn bigint , @productId int , @count int
AS

DECLARE @controlP int = 0
SELECT @controlP=product.productId
FROM Product product
WHERE product.productId=@productId

DECLARE @controlSsn bigint = 0
SELECT @controlSsn=customer.Ssn
FROM Customer customer
WHERE customer.Ssn=@Ssn

DECLARE @productCount int
SELECT @productCount=ps.productCount
FROM Product_Storage ps
WHERE ps.productId=@productId

IF (@productCount-@count)<0
	SELECT 'There is no enough product'
ELSE IF @controlP!=0 and @controlSsn!=0 
		insert into Order_Customer values
		(@Ssn,@productId,@count,SYSDATETIME())
ELSE 
		SELECT 'Wrong input'