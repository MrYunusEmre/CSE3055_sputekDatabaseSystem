CREATE VIEW [Finished Materials And Models In Storage]
AS
SELECT  material.materialId "Material Id" , material.materialName "Material Name" , model.modelId "Model Id" , model.modelName "Model Name" 
FROM Material material inner join Model model on model.materialId=material.materialId inner join Model_Storage ms on ms.modelId=model.modelId
WHERE ms.modelCount=0 