CREATE PROCEDURE ProcedureUpdatePriceProduct @productId int , @price int
AS
UPDATE p
SET p.productPrice=@price
FROM Product p
WHERE p.productId=@productId