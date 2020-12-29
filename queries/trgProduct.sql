CREATE TRIGGER TrgInsertProduct
 ON Product
 AFTER INSERT
AS
BEGIN
	
	declare @productId int 
	declare @productCount int = 0
	select @productId=inserted.productId from inserted
	Insert into Product_Storage values (@productId,@productCount)

END