ALTER TRIGGER TrgOrderCustomer
ON Order_Customer
AFTER INSERT
AS
BEGIN
	
	-- update product count in storage
	UPDATE ps
	SET ps.productCount = ps.productCount - i.productCount
	FROM Product_Storage ps inner join inserted i on i.productId=ps.productId

	-- create bill for customer
	INSERT INTO Bill_Customer
	SELECT oc.orderId , customer.Ssn , customer.FirstName , customer.LastName , customer.PhoneNumber , customer.AddressDetails , customer.mail , customer.PostalCode ,
	   customer.DistrictNo , oc.orderDate , product.productName , product.productPrice , oc.productCount , (oc.productCount*product.productPrice)
	FROM Customer customer , Product product inner join Product_Storage ps on ps.productId=product.productId , Order_Customer oc , inserted i
	WHERE oc.orderId=i.orderId and oc.Ssn=customer.Ssn and oc.productId=product.productId 

END