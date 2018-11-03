﻿-- 商品

DROP TABLE M_SALES_ITEM;

CREATE TABLE M_SALES_ITEM
(
	SYSTEM_ITEM_ID		serial	NOT NULL,
	ITEM_ID		varchar(15),
	ITEM_NAME		text,
	ITEM_TYPE		char(1),
	UNIT		varchar(2),
	UNIT_PRICE		numeric,
	DISCOUNT		char(1),
	STOCK_ANNOUNCEMENT		int4,
	ORDER_DESTINATION		int4,
	ITEM_IMAGE		text,
	OFFICE		char(1),
	TAX_FLAG		char(1)	DEFAULT 'ｔ',
	DELETE_FLAG		char(1)	DEFAULT '0'	NOT NULL,
	CREATE_DATE		timestamp	NOT NULL,
	CREATE_USER_ID		int4	NOT NULL,
	UPDATE_DATE		timestamp	NOT NULL,
	UPDATE_USER_ID		int4	NOT NULL,
CONSTRAINT M_SALES_ITEM_pkey PRIMARY KEY (SYSTEM_ITEM_ID));


COMMENT ON TABLE M_SALES_ITEM IS '商品';
COMMENT ON COLUMN M_SALES_ITEM.SYSTEM_ITEM_ID IS 'システム商品ID';
COMMENT ON COLUMN M_SALES_ITEM.ITEM_ID IS '商品ID';
COMMENT ON COLUMN M_SALES_ITEM.ITEM_NAME IS '商品名';
COMMENT ON COLUMN M_SALES_ITEM.ITEM_TYPE IS '商品区分';
COMMENT ON COLUMN M_SALES_ITEM.UNIT IS '単位';
COMMENT ON COLUMN M_SALES_ITEM.UNIT_PRICE IS '単価';
COMMENT ON COLUMN M_SALES_ITEM.DISCOUNT IS '値引き';
COMMENT ON COLUMN M_SALES_ITEM.STOCK_ANNOUNCEMENT IS '在庫告知';
COMMENT ON COLUMN M_SALES_ITEM.ORDER_DESTINATION IS '発注先';
COMMENT ON COLUMN M_SALES_ITEM.ITEM_IMAGE IS '商品画像';
COMMENT ON COLUMN M_SALES_ITEM.OFFICE IS '営業所';
COMMENT ON COLUMN M_SALES_ITEM.TAX_FLAG IS '消費税フラグ';
COMMENT ON COLUMN M_SALES_ITEM.DELETE_FLAG IS '削除フラグ';
COMMENT ON COLUMN M_SALES_ITEM.CREATE_DATE IS '登録日';
COMMENT ON COLUMN M_SALES_ITEM.CREATE_USER_ID IS '登録者ID';
COMMENT ON COLUMN M_SALES_ITEM.UPDATE_DATE IS '更新日';
COMMENT ON COLUMN M_SALES_ITEM.UPDATE_USER_ID IS '更新者ID';

