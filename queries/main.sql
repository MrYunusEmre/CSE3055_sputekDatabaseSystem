-- material ids      model ids --> company ids        
--     1			[1,2] --> 1
--     2			[3,4] --> 2			,   [5,6] --> 3
--     3			7 --> 4				,	8 --> 5	,   9 --> 6
--	   4		    [10,11] --> 1
--	   5			[12,13,14] --> 7	,   [15,16] --> 8		,  [17-23] --> 9	,   [24,38] --> 10
--	   6			[39,40] --> 11		,	[41,42] --> 12		
--	 
--BACKUP DATABASE sputekDB TO DISK='D:\sputekDatabase.bak'
use SputekDB
DBCC CHECKIDENT ('Order_Company', RESEED, 0)  
DBCC CHECKIDENT ('Order_Customer', RESEED, 0)  -- reseed order ids

-- TRIGGERS
-- TrgOrderProduct -> When a customer order inserted in 'Order_Customer' table , update product count in 'Product_Storage' wirh count-=ordercount and create bill inside
-- TrgOrderModel -> When material order inserted in 'Order_Company' table , update model count in 'Model_Storage' with count+=ordercount and create bill inside
-- TrgInsertProduct ->  When a product inserted in 'Product' table , create row with this productId and count=0
-- TrgInsertModel -> When a new model added in 'Model' table , create row for this model in 'Model_Storage' table with count=0 

-- PROCEDURES
-- 7     give random order or give this informations with parameter
exec ProcedureGiveRandomOrderMaterial		 
-- 5     give material orders with this procedure parameters
exec ProcedureGiveOrderMaterial @Ssn=19115325844 , @materialId=1 , @modelId=1 , @companyId=1 , @count=2	
-- 1     look all materials and model counts company has
exec ProcedureAllMaterialAndModelCounts		 
-- 3     look all order details , who gave order, how many , when , which material and model from which company
exec ProcedureGetAllMaterialOrders			
-- 8     give random order or give this informations with parameter
exec ProcedureGiveRandomOrderProduct		 
-- 6     give product order with customer ssn and product id with count
exec ProcedureGiveOrderProduct @Ssn=39970214094 , @productId=2 , @count=1	
-- 2     look all products and counts company have
exec ProcedureAllProductAndCounts		
-- 4     look all order details of customers , who gave order , how many , which product and when 
exec ProcedureGetAllProductOrders	
-- 9     updating price of the model
exec ProcedureUpdatePrice @modelId=1 , @price=100
-- 10    updating price of the product 
exec ProcedureUpdatePriceProduct @productId=1 , @price=100
-- 11 updating product storage
exec ProcedureUpdatingProductStorage @Ssn=11111111111 , @productId=1 , @count=8

-- VIEWS
-- view for existing products in storage
SELECT * FROM [Existing Products In Storage]	
-- view for finished materials in storage
SELECT * FROM [Finished Materials And Models In Storage]
-- view for bills of all customers
SELECT * FROM [All bills]
-- view for bills which has total price over than avg totalprice for customers
SELECT * FROM [Bills with higher price]
-- view for bills of all employees
SELECT * FROM [All Company Bills]
-- view for bills which has total price over than avg totalprice for employees
SELECT * FROM [Bills with higher price Company]