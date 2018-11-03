UPDATE											
	t_orders_data tod										
SET 											
	orders_route = tod2.orders_route,										
	orders_user_id = tod2.orders_user_id										
FROM (											
	SELECT										
		system_orders_id,
		(CASE old_orders_route									
			WHEN '1' THEN '1'								
			WHEN '2' THEN '4'								
			WHEN '3' THEN '2'								
			WHEN '4' THEN '6'								
			WHEN '5' THEN '7'								
			WHEN '7' THEN '3'								
			WHEN '8' THEN '3'								
			WHEN '9' THEN '3'								
			WHEN '10' THEN '3'								
			WHEN '11' THEN '3'								
			WHEN '12' THEN '3'								
		END) as orders_route,									
		(CASE old_orders_route									
			WHEN '1' THEN null								
			WHEN '2' THEN null								
			WHEN '3' THEN null								
			WHEN '4' THEN null								
			WHEN '5' THEN null								
			WHEN '7' THEN null								
			WHEN '8' THEN 3								
			WHEN '9' THEN 4								
			WHEN '10' THEN null								
			WHEN '11' THEN 5								
			WHEN '12' THEN null								
		END) as orders_user_id									
	FROM										
		t_orders_data									
	WHERE old_orders_id LIKE 'W%'
) as tod2											
WHERE tod.system_orders_id=tod2.system_orders_id;
