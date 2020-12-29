CREATE TRIGGER TrgOrderCustomer
ON Order_Customer
AFTER INSERT
AS
BEGIN
	
	UPDATE ps
	SET ps.productCount = ps.productCount - i.productCount
	FROM Product_Storage ps inner join inserted i on i.productId=ps.productId

END