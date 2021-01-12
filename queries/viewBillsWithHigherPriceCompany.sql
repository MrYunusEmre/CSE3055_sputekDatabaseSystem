CREATE VIEW [Bills with higher price Company]
AS
SELECT * 
FROM Bill_Company bc
WHERE bc.TotalPrice > (SELECT AVG(TotalPrice) FROM Bill_Company)