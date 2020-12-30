CREATE PROCEDURE ProcedureGetAllProductOrders
AS 
SELECT customer.FirstName + ' ' + customer.LastName as "Customer" , oc.orderId , oc.orderDate , product.productName , oc.productCount
FROM Customer customer , Order_Customer oc , Product product
WHERE customer.Ssn=oc.Ssn and oc.productId=product.productId