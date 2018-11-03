UPDATE					
	t_orders_data tod				
SET 					
	sub_total = toi.amount,				
	sales_tax = toi.sales_tax,				
	grand_total = toi.grand_total				
FROM					
	(SELECT				
		orders_id,			
		SUM(amount) as amount,			
		SUM(sales_tax) as sales_tax,			
		SUM(amount) + SUM(sales_tax) as grand_total			
	FROM				
		t_orders_item			
	GROUP BY orders_id				
	) as toi				
WHERE					
	tod.system_orders_id = toi.orders_id;
