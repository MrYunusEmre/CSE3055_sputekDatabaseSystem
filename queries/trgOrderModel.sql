ALTER TRIGGER TrgOrderModel
ON Order_Company
AFTER INSERT
AS
BEGIN
	
	UPDATE ms
	SET ms.modelCount = ms.modelCount + i.count
	FROM Model_Storage ms inner join inserted i on ms.modelId=i.modelId

	-- create bill for company
	INSERT INTO Bill_Company
	SELECT i.orderId , employee.Ssn , employee.FirstName , employee.LastName , employee.Position , i.orderDate , 
	material.materialName , model.modelId , company.companyName , model.modelPrice , i.count , (model.modelPrice*i.count)
	FROM inserted i , Employee employee , Material material , Model model , Company company
	WHERE employee.Ssn=i.Ssn and material.materialId=i.materialId and model.modelId=i.modelId and company.companyID=i.companyId

END