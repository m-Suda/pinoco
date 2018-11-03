#!/bin/sh

echo 受注データインサート
PGPASSWORD=postgres psql -U postgres -d hsc_db -f ins_T_ORDERS_DATA.sql

echo 受注商品データインサート
PGPASSWORD=postgres psql -U postgres -d hsc_db -f ins_T_ORDERS_ITEM.sql

#受注商品にアップデートＳＱＬを流す。

update t_orders_item set old_item_id='19-3' WHERE old_item_id='42448';

update t_orders_item set old_item_id='19-2' WHERE old_item_id='42395';

update t_orders_item set old_item_id='19-2' WHERE old_item_id='42419';

echo 受注商品データ商品ＩＤの更新
PGPASSWORD=postgres psql -U postgres -d hsc_db -f upd_T_ORDERS_ITEM_1.sql

PGPASSWORD=postgres psql -U postgres -d hsc_db -f upd_T_ORDERS_ITEM_2.sql



echo 受注データ金額算出
PGPASSWORD=postgres psql -U postgres -d hsc_db -f upd_T_ORDERS_DATA_1.sql

echo 受注データ注文確定フラグ更新
PGPASSWORD=postgres psql -U postgres -d hsc_db -f upd_T_ORDERS_DATA_2.sql

echo 受注データ受注経路・担当者更新（東京）
PGPASSWORD=postgres psql -U postgres -d hsc_db -f upd_T_ORDERS_DATA_3E.sql


echo ロット変換
PGPASSWORD=postgres psql -U postgres -d hsc_db -f upd_ITEM_ROT_REPRACE_ALL.sql

PGPASSWORD=postgres psql -U postgres -d hsc_db -f upd_ITEM_ROT_REPRACE_W.sql

echo 商品データ0埋め解除
PGPASSWORD=postgres psql -U postgres -d hsc_db -f upd_M_SALES_ITEM.sql

