CREATE VIEW [Bills with higher price]
AS
SELECT * 
FROM Bill_Customer bc
WHERE bc.TotalPrice > (SELECT AVG(TotalPrice) FROM Bill_Customer)