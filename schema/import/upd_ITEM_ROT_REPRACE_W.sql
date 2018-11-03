update m_sales_item set unit = '1', unit_price = unit_price*10 WHERE item_id = '030G' AND office='2';
update m_sales_item set unit = '2', unit_price = unit_price/1000 WHERE item_id = '041E' AND office='2';
update m_sales_item set unit = '2', unit_price = unit_price/1000 WHERE item_id = '041F' AND office='2';
update m_sales_item set unit = '1', unit_price = unit_price*100 WHERE item_id = '157K' AND office='2';
update m_sales_item set unit = '1', unit_price = unit_price*10 WHERE item_id = '30G1' AND office='2';
update m_sales_item set unit = '1', unit_price = unit_price*10 WHERE item_id = '30G2' AND office='2';
update m_sales_item set unit = '1', unit_price = unit_price*1000 WHERE item_id = '41F' AND office='2';
update m_sales_item set unit = '1', unit_price = unit_price*50 WHERE item_id = '512Y' AND office='2';
update m_sales_item set unit = '1', unit_price = unit_price*100 WHERE item_id = 'A3FR' AND office='2';
update m_sales_item set unit = '1', unit_price = unit_price*50 WHERE item_id = 'A514' AND office='2';
update m_sales_item set unit = '1', unit_price = unit_price*50 WHERE item_id = 'E511' AND office='2';
update m_sales_item set unit = '1', unit_price = unit_price*100 WHERE item_id = 'L10' AND office='2';

UPDATE t_stock_infomation SET stock_count=stock_count/10, assumption_stock_count=assumption_stock_count/10 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='030G' AND office='2');
UPDATE t_stock_infomation SET stock_count=stock_count*1000, assumption_stock_count=assumption_stock_count*1000 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='041E' AND office='2');
UPDATE t_stock_infomation SET stock_count=stock_count*1000, assumption_stock_count=assumption_stock_count*1000 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='041F' AND office='2');
UPDATE t_stock_infomation SET stock_count=stock_count/100, assumption_stock_count=assumption_stock_count/100 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='157K' AND office='2');
UPDATE t_stock_infomation SET stock_count=stock_count/10, assumption_stock_count=assumption_stock_count/10 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='30G1' AND office='2');
UPDATE t_stock_infomation SET stock_count=stock_count/10, assumption_stock_count=assumption_stock_count/10 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='30G2' AND office='2');
UPDATE t_stock_infomation SET stock_count=stock_count/1000, assumption_stock_count=assumption_stock_count/1000 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='41F' AND office='2');
UPDATE t_stock_infomation SET stock_count=stock_count/50, assumption_stock_count=assumption_stock_count/50 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='512Y' AND office='2');
UPDATE t_stock_infomation SET stock_count=stock_count/100, assumption_stock_count=assumption_stock_count/100 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='A3FR' AND office='2');
UPDATE t_stock_infomation SET stock_count=stock_count/50, assumption_stock_count=assumption_stock_count/50 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='A514' AND office='2');
UPDATE t_stock_infomation SET stock_count=stock_count/50, assumption_stock_count=assumption_stock_count/50 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='E511' AND office='2');
UPDATE t_stock_infomation SET stock_count=stock_count/100, assumption_stock_count=assumption_stock_count/100 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='L10' AND office='2');



update t_orders_item set item_quantity=item_quantity/10, unit_price = unit_price*10 WHERE item_id =  (select system_item_id from m_sales_item WHERE item_id='030G' AND office='2');
update t_orders_item set item_quantity=item_quantity*1000, unit_price = unit_price/1000 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='030G' AND office='2');
update t_orders_item set item_quantity=item_quantity*1000, unit_price = unit_price/1000 WHERE item_id = (select system_item_id from m_sales_item WHERE item_id='041B' AND office='2');
update t_orders_item set item_quantity=item_quantity/100, unit_price = unit_price*100 WHERE item_id =  (select system_item_id from m_sales_item WHERE item_id='157K' AND office='2');
update t_orders_item set item_quantity=item_quantity/10, unit_price = unit_price*10 WHERE item_id =  (select system_item_id from m_sales_item WHERE item_id='30G1' AND office='2');
update t_orders_item set item_quantity=item_quantity/10, unit_price = unit_price*10 WHERE item_id =  (select system_item_id from m_sales_item WHERE item_id='30G2' AND office='2');
update t_orders_item set item_quantity=item_quantity/1000, unit_price = unit_price*1000 WHERE item_id =  (select system_item_id from m_sales_item WHERE item_id='41F' AND office='2');
update t_orders_item set item_quantity=item_quantity/50, unit_price = unit_price*50 WHERE item_id =  (select system_item_id from m_sales_item WHERE item_id='512Y' AND office='2');
update t_orders_item set item_quantity=item_quantity/100, unit_price = unit_price*100 WHERE item_id =  (select system_item_id from m_sales_item WHERE item_id='A3FR' AND office='2');
update t_orders_item set item_quantity=item_quantity/50, unit_price = unit_price*50 WHERE item_id =  (select system_item_id from m_sales_item WHERE item_id='A514' AND office='2');
update t_orders_item set item_quantity=item_quantity/50, unit_price = unit_price*50 WHERE item_id =  (select system_item_id from m_sales_item WHERE item_id='E511' AND office='2');
update t_orders_item set item_quantity=item_quantity/100, unit_price = unit_price*100 WHERE item_id =  (select system_item_id from m_sales_item WHERE item_id='L10' AND office='2');


