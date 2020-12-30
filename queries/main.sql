-- material ids      model ids --> company ids        
--     1			[1,2] --> 1
--     2			[3,4] --> 2			,   [5,6] --> 3
--     3			7 --> 4				,	8 --> 5	,   9 --> 6
--	   4		    [10,11] --> 1
--	   5			[12,13,14] --> 7	,   [15,16] --> 8		,  [17-23] --> 9	,   [24,38] --> 10
--	   6			[39,40] --> 11		,	[41,42] --> 12		
--	 
use SputekDB
DBCC CHECKIDENT ('Order_Company', RESEED, 1)  
DBCC CHECKIDENT ('Order_Customer', RESEED, 1)  -- reseed order ids

-- TRIGGERS
-- TrgOrderProduct -> When a customer order inserted in 'Order_Customer' table , update product count in 'Product_Storage' wirh count-=ordercount
-- TrgOrderModel -> When material order inserted in 'Order_Company' table , update model count in 'Model_Storage' with count+=ordercount 
-- TrgInsertProduct ->  When a product inserted in 'Product' table , create row with this productId and count=0
-- TrgInsertModel -> When a new model added in 'Model' table , create row for this model in 'Model_Storage' table with count=0 

-- PROCEDURES
-- give random order or give this informations with parameter
exec ProcedureGiveRandomOrderMaterial		 
-- give material orders with this procedure parameters
exec ProcedureGiveOrderMaterial @Ssn=19115325844 , @materialId=1 , @modelId=1 , @companyId=1 , @count=2	
-- look all materials and model counts company has
exec ProcedureAllMaterialAndModelCounts		 
 -- look all order details , who gave order, how many , when , which material and model from which company
exec ProcedureGetAllMaterialOrders			
--  give random order or give this informations with parameter
exec ProcedureGiveRandomOrderProduct		 
-- give product order with customer ssn and product id with count
exec ProcedureGiveOrderProduct @Ssn=39970214094 , @productId=2 , @count=1	
-- look all products and counts company have
exec ProcedureAllProductAndCounts		
-- look all order details of customers , who gave order , how many , which product and when 
exec ProcedureGetAllProductOrders			 


