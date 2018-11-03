UPDATE															
	t_orders_data tod														
SET															
	order_confirm = 't'												-- 既製品以外を含む受注を「確定済」に変更		
													
WHERE															
	tod.system_orders_id IN (SELECT														
		orders_id													
	FROM														
		t_orders_item toi													
															
	LEFT JOIN (														
		SELECT													
			system_item_id,												
			item_name,												
			item_type												
		FROM													
			m_sales_item												
	)as msi														
	ON toi.item_id = msi.system_item_id														
	WHERE toi.delete_flag = '0'														
	AND msi.item_type IN('2','3')														
	GROUP BY toi.orders_id														
	);
