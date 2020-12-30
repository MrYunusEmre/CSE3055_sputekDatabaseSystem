CREATE PROCEDURE ProcedureGiveRandomOrderProduct
AS 

DECLARE @randomCustomerSsn bigint
SELECT top(1) @randomCustomerSsn=customer.Ssn
FROM Customer customer
ORDER BY NEWID()

DECLARE @randomProductId int
SELECT top(1) @randomProductId = product.productId
FROM Product product
ORDER BY NEWID()

DECLARE @productCount int
SELECT @productCount=ps.productCount
FROM Product_Storage ps
WHERE ps.productId=@randomProductId

DECLARE @lower_limit int = 3
DECLARE @upper_limit int = 1 
DECLARE @randomCount int
SELECT @randomCount=ROUND((@upper_limit - @lower_limit) * RAND(CHECKSUM(NEWID())), 0) + @lower_limit

IF (@productCount-@randomCount)>=0
	insert into Order_Customer values
	(@randomCustomerSsn,@randomProductId,@randomCount,SYSDATETIME())
ELSE 
	SELECT 'There is no enough product in our stocks'