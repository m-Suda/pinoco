UPDATE
    t_orders_item toi
SET
    item_id = msi.system_item_id
FROM (
    SELECT
        system_item_id,
        item_id,
        office
    FROM
        m_sales_item
) as msi
WHERE
    msi.item_id=upper(translate(toi.old_item_id, '－０１２３４５６７８９ＡＢＣＤＥＦＧＨＩＪＫＬＭＮＯＰＱＲＳＴＵＶＷＸＹＺａｂｃｄｅｆｇｈｉｊｋｌｍｎｏｐｑｒｓｔｕｖｗｘｙｚ', '-0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'))
    AND msi.office = toi.old_office
    AND toi.old_item_id IN ('026A','026D','030G,041D','041E','041F','0G31','1002M','1005M','157K','190','191','192','211A','212','213','218','219','30G1','30G2','41','519','528A','550','551','552','A052','A058','A27','AW6','G130','N154','N157','N1600','N162','N26','N508','N518','U1','U2','U4','W4');
