CREATE VIEW [Existing Products In Storage]
AS
SELECT product.productName , ps.productCount
FROM Product product , Product_Storage ps
WHERE product.productId=ps.productId and ps.productCount>0