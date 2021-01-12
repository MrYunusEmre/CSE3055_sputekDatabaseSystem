CREATE TRIGGER TrgInsertModel
 ON Model
 AFTER INSERT
AS
BEGIN
	
	declare @modelId int 
	declare @modelCount int = 0
	select @modelId=inserted.modelId from inserted
	Insert into Model_Storage values (@modelId,@modelCount)

END