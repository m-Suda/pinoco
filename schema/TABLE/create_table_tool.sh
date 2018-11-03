#!/bin/sh


PGPASSWORD=postgres psql -U postgres -d hsc_db -f 01.M_CUSTOMER_DATA.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 02.M_ORDER_DESTINATION.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 03.M_SALES_ITEM.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 04.M_USER_AREA.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 05.M_USER_DATA.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 06.T_DELIVERY_DATA.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 07.T_ESTIMATES_DATA.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 08.T_ESTIMATES_ITEM.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 09.T_ORDERS_DATA.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 10.T_ORDERS_ITEM.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 11.T_ORDERS_INVOICE.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 12.T_REPEAT_ANNOUNCEMENT.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 13.T_SALES_ITEM_MEMO.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 14.T_SLIP_CUSTOMER_DATA.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 15.T_STOCK_EXCLUSIVE.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 16.T_STOCK_HISTORY.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 17.T_STOCK_INFOMATION.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 18.T_STOCK_LOCK.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 19.T_SLIP_MIGRATION.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f 20.T_SLIP_ITEM_MIGRATION.sql

PGPASSWORD=postgres psql -U postgres -d hsc_db -f create_sf_translate_case.sql
PGPASSWORD=postgres psql -U postgres -d hsc_db -f t_orders_data_slip_id_seq.sql

