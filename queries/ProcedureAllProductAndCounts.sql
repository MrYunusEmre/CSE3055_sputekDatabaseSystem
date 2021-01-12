CREATE PROCEDURE ProcedureAllProductAndCounts
AS
SELECT product.productName , ps.productCount
FROM Product product , Product_Storage ps
WHERE product.productId=ps.productId