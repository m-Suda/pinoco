INSERT INTO									
	t_orders_item								
(									
	  orders_id,								
	  item_id,								
	  item_quantity,								
	  unit_price,								
	  delivery_flag,								
	  item_remarks,								
	  delivery_date,								
	  ovserve_flag,								
	  completion_date,								
	  discount_rate,								
	  discount_amount,								
	  amount,								
	  sales_tax,								
	  old_item_id,
	  old_office,
	  old_slip_item_id,
	  delete_flag,								
	  create_date,								
	  create_user_id,								
	  update_date,								
	  update_user_id								
)									
SELECT									
	tod.system_orders_id,								
	NULL,
	tsim.item_quantity ,								
	tsim.unit_price,								
	 'f',								
	tsim.remarks,								
	null,								
	 'f',								
	null,								
	0,								
	0,								
	tsim.amount,								
	tsim.sales_tax,								
	tsim.item_id,
	tsim.office,
	tsim.slip_item_id,
	 '0',								
	NOW(),								
	2,								-- 「移行担当ユーザー」を直接指定
	NOW(),								
	2								-- 「移行担当ユーザー」を直接指定
FROM									
	(SELECT
		slip_item_id,
		item_id,
		unit_price,
		item_quantity,
		amount,
		sales_tax,
		cust_id,
		slip_mid,
		remarks,
		office,
		(CASE office
			WHEN '1' THEN 'E'||slip_mid
			WHEN '2' THEN 'W'||slip_mid
		END) AS order_id
	FROM
		t_slip_item_migration
	) AS tsim
LEFT JOIN									
	(SELECT								
		system_orders_id,							
		old_orders_id,							
		slip_id							
	FROM								
		t_orders_data							
	) as tod								
ON tsim.order_id = old_orders_id									
