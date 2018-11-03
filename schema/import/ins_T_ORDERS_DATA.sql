INSERT INTO															
	t_orders_data														
(															
	old_orders_id,														
	issue_flag,														
	dispatch_flag,														
	finished_flag,														
	order_confirm,														
	orders_date,														
	orders_route,														
	slip_id,														
	slip_date,														
	expected_shipping_date,														
	arraival_date,														
	delivery_time_zone,														
	orders_office,														
	orders_user_id,														
	user_id,														
	payment_method,														
	invoice_type,														
	name,														
	honorific,														
	zip,														
	address1,														
	address2,														
	tel_no,														
	fax_no,														
	email,														
	slip_remarks,														
	internal_remarks,														
	customer_id,														
	sub_total,														
	sales_tax,														
	grand_total,														
	old_orders_route,
	delete_flag,														
	create_date,														
	create_user_id,														
	update_date,														
	update_user_id														
)															
SELECT															
	(CASE tsm.office												-- 東京インポート時は「E」、大阪インポート時は「W」		
		WHEN '1' THEN CONCAT('E',tsm.slip_mid)													
		WHEN '2' THEN CONCAT('W',tsm.slip_mid)													
	END) as slip_mid,														
	 't',														
	 't',														
	 't',														
	 'f',												-- 既製品のみの受注を「未確定」にするため、初期値をｆとする		
	tsm.slip_date,														
	tsm.orders_route,														
	null,														
	tsm.slip_date,														
	null,														
	null,														
	null,														
	tsm.office,														
	tsm.orders_route::integer as user_id,														
	2,												-- 「2:移行担当ユーザー」		
	null,														
	null,														
	tscd.name,														
	tscd.honorific,														
	tscd.zip,														
	tscd.address1,														
	tscd.address2,														
	tscd.tel_no,														
	tscd.fax_no,														
	tscd.email,														
	null,														
	tsm.remarks,														
	mcd.customer_id,														
	0,														
	0,														
	0,														
	tsm.orders_route,
	 '0',														
	NOW(),														
	2,														
	NOW(),														
	2														
FROM															
	(SELECT
		sys_slip_id,
		slip_mid,
		cust_id,
		slip_date,
		orders_route,
		remarks,
		office,
		(CASE office
			WHEN '1' THEN CONCAT('E',cust_id)
			WHEN '2' THEN CONCAT('W',cust_id)
		END) AS old_cust_id
	FROM t_slip_migration) tsm														
LEFT JOIN (															
	SELECT														
		customer_id,													
		old_customer_id											-- 東京インポート時は「E」、大阪インポート時は「W」		
	FROM														
		m_customer_data mcd													
) as mcd															
ON old_cust_id = mcd.old_customer_id															
LEFT JOIN (															
	SELECT														
		slip_customer_id,													
		customer_id,													
		name,													
		honorific,													
		zip,													
		address1,													
		address2,													
		tel_no,													
		fax_no,													
		email													
	FROM														
		t_slip_customer_data													
) as tscd															
ON mcd.customer_id = tscd.customer_id															
ORDER BY slip_mid;
