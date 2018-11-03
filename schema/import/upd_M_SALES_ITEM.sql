UPDATE
	m_sales_item
SET
	item_id
=
	RIGHT(
		RTRIM(item_id),
		LENGTH(item_id) -
			CASE WHEN SUBSTRING(item_id,1,1)<>'0' THEN 0 ELSE
			CASE WHEN SUBSTRING(item_id,2,1)<>'0' THEN 1 ELSE
			CASE WHEN SUBSTRING(item_id,3,1)<>'0' THEN 2 ELSE
			CASE WHEN SUBSTRING(item_id,4,1)<>'0' THEN 3 ELSE
			0 END END END END
	)
WHERE item_id NOT IN('0','00','0000');