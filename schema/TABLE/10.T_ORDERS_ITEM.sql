﻿-- 受注商品

DROP TABLE T_ORDERS_ITEM;

CREATE TABLE T_ORDERS_ITEM
(
	ORDERS_ITEM_ID		serial	NOT NULL,
	ORDERS_ID		int4,
	ITEM_ID		int4,
	ITEM_NAME		text,
	ITEM_QUANTITY		int4,
	UNIT_PRICE		numeric,
	DELIVERY_FLAG		char(1)	DEFAULT 'f',
	ITEM_REMARKS		text,
	DELIVERY_DATE		timestamp,
	OVSERVE_FLAG		char(1),
	COMPLETION_DATE		timestamp,
	DISCOUNT_RATE		int4,
	DISCOUNT_AMOUNT		int4,
	AMOUNT		int4,
	SALES_TAX		int4,
	OLD_ITEM_ID		varchar(10),
	OLD_OFFICE		char(1),
	OLD_SLIP_ITEM_ID		varchar(20),
	DELETE_FLAG		char(1)	DEFAULT '0'	NOT NULL,
	CREATE_DATE		timestamp	NOT NULL,
	CREATE_USER_ID		int4	NOT NULL,
	UPDATE_DATE		timestamp	NOT NULL,
	UPDATE_USER_ID		int4	NOT NULL,
CONSTRAINT T_ORDERS_ITEM_pkey PRIMARY KEY (ORDERS_ITEM_ID));


COMMENT ON TABLE T_ORDERS_ITEM IS '受注商品';
COMMENT ON COLUMN T_ORDERS_ITEM.ORDERS_ITEM_ID IS '受注商品ID';
COMMENT ON COLUMN T_ORDERS_ITEM.ORDERS_ID IS '受注No';
COMMENT ON COLUMN T_ORDERS_ITEM.ITEM_ID IS '商品ID';
COMMENT ON COLUMN T_ORDERS_ITEM.ITEM_NAME IS '商品名';
COMMENT ON COLUMN T_ORDERS_ITEM.ITEM_QUANTITY IS '数量';
COMMENT ON COLUMN T_ORDERS_ITEM.UNIT_PRICE IS '単価';
COMMENT ON COLUMN T_ORDERS_ITEM.DELIVERY_FLAG IS '業者納品書チェック';
COMMENT ON COLUMN T_ORDERS_ITEM.ITEM_REMARKS IS '商品備考';
COMMENT ON COLUMN T_ORDERS_ITEM.DELIVERY_DATE IS '納品予定日';
COMMENT ON COLUMN T_ORDERS_ITEM.OVSERVE_FLAG IS '厳守フラグ';
COMMENT ON COLUMN T_ORDERS_ITEM.COMPLETION_DATE IS '完成日';
COMMENT ON COLUMN T_ORDERS_ITEM.DISCOUNT_RATE IS '値引率(％)';
COMMENT ON COLUMN T_ORDERS_ITEM.DISCOUNT_AMOUNT IS '値引き金額';
COMMENT ON COLUMN T_ORDERS_ITEM.AMOUNT IS '金額';
COMMENT ON COLUMN T_ORDERS_ITEM.SALES_TAX IS '消費税';
COMMENT ON COLUMN T_ORDERS_ITEM.OLD_ITEM_ID IS '旧商品ID';
COMMENT ON COLUMN T_ORDERS_ITEM.OLD_OFFICE IS '営業所';
COMMENT ON COLUMN T_ORDERS_ITEM.OLD_SLIP_ITEM_ID IS '旧明細ID';
COMMENT ON COLUMN T_ORDERS_ITEM.DELETE_FLAG IS '削除フラグ';
COMMENT ON COLUMN T_ORDERS_ITEM.CREATE_DATE IS '登録日';
COMMENT ON COLUMN T_ORDERS_ITEM.CREATE_USER_ID IS '登録者ID';
COMMENT ON COLUMN T_ORDERS_ITEM.UPDATE_DATE IS '更新日';
COMMENT ON COLUMN T_ORDERS_ITEM.UPDATE_USER_ID IS '更新者ID';

