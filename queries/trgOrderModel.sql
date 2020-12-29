CREATE TRIGGER TrgOrderModel
ON Order_Company
AFTER INSERT
AS
BEGIN
	
	UPDATE ms
	SET ms.modelCount = ms.modelCount + i.count
	FROM Model_Storage ms inner join inserted i on ms.modelId=i.modelId

END