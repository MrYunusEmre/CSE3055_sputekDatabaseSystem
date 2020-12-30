CREATE PROCEDURE ProcedureAllMaterialAndModelCounts
AS
SELECT material.materialName , model.modelName , ms.modelCount
FROM Material material inner join Model model on material.materialId=model.materialId inner join Model_Storage ms on ms.modelId=model.modelId