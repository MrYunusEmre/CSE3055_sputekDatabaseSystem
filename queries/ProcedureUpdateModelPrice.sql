CREATE PROCEDURE ProcedureUpdatePrice @modelId int , @price int
AS
UPDATE model
SET model.modelPrice=@price
FROM Model model 
WHERE model.modelId=@modelId
