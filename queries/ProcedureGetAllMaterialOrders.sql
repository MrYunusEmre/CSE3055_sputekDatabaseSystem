CREATE PROCEDURE ProcedureGetAllMaterialOrders
AS
SELECT employee.FirstName + ' ' + employee.LastName as "Employee" , oc.orderId , oc.orderDate , material.materialName , model.modelName , company.companyName , oc.count
FROM Order_Company oc , Company company , Material material , Model model , Employee employee
WHERE oc.companyId=company.companyID and oc.materialId=material.materialId and oc.modelId=model.modelId and oc.Ssn=employee.Ssn