UPDATE
	t_orders_data tod
SET
	orders_route = tod2.old_orders_route,
	orders_user_id = tod2.orders_user_id
FROM (
	SELECT
		system_orders_id,
		(CASE old_orders_route
			WHEN '1' THEN '1'
			WHEN '2' THEN '2'
			WHEN '3' THEN '3'							
			WHEN '4' THEN '5'							
			WHEN '5' THEN '4'							
			WHEN '7' THEN '7'							
			WHEN '8' THEN '6'							
			WHEN '9' THEN '3'							
			WHEN '10' THEN '3'							
			WHEN '12' THEN '3'							
			WHEN '16' THEN '3'							
			WHEN '17' THEN '3'							
			WHEN '18' THEN '3'							
			WHEN '19' THEN '3'							
			WHEN '20' THEN '3'							
			WHEN '21' THEN '3'							
			WHEN '22' THEN '3'							
		END) as old_orders_route,								
		(CASE old_orders_route								
			WHEN '1' THEN Null							
			WHEN '2' THEN Null							
			WHEN '3' THEN Null							
			WHEN '4' THEN Null							
			WHEN '5' THEN Null							
			WHEN '7' THEN Null							
			WHEN '8' THEN Null							
			WHEN '9' THEN 6							
			WHEN '10' THEN 7							
			WHEN '12' THEN 8							
			WHEN '16' THEN 9							
			WHEN '17' THEN 10							
			WHEN '18' THEN 11							
			WHEN '19' THEN 12							
			WHEN '20' THEN 13							
			WHEN '21' THEN 14							
			WHEN '22' THEN 15							
		END) as orders_user_id								
	FROM									
		t_orders_data								
) as tod2
WHERE old_orders_id LIKE 'E%'
	AND tod.system_orders_id=tod2.system_orders_id;