-- Table: mst_company

-- DROP TABLE mst_company;

CREATE TABLE mst_company
(
  company_id serial NOT NULL, -- 法人ID
  company_name character varying(64), -- 法人名
  company_name_kana character varying(64), -- 法人名かな
  tel character varying(12), -- 電話番号
  mail_address text, -- メールアドレス1
  zip character varying(7), -- 郵便番号
  address text, -- 住所
  create_user character varying(16) NOT NULL, -- 登録者
  create_date character varying(14) NOT NULL, -- 登録日時
  update_user character varying(16) NOT NULL, -- 更新者
  update_date character varying(14) NOT NULL, -- 更新日時
  is_delete smallint NOT NULL DEFAULT 0, -- 削除フラグ(1:削除、2:未削除)
  CONSTRAINT mst_company_pkey PRIMARY KEY (company_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE mst_company
  OWNER TO postgres;
COMMENT ON COLUMN mst_company.company_id IS '法人ID';
COMMENT ON COLUMN mst_company.company_name IS '法人名';
COMMENT ON COLUMN mst_company.company_name_kana IS '法人名かな';
COMMENT ON COLUMN mst_company.tel IS '電話番号';
COMMENT ON COLUMN mst_company.mail_address IS 'メールアドレス1';
COMMENT ON COLUMN mst_company.zip IS '郵便番号';
COMMENT ON COLUMN mst_company.address IS '住所';
COMMENT ON COLUMN mst_company.create_user IS '登録者';
COMMENT ON COLUMN mst_company.create_date IS '登録日時';
COMMENT ON COLUMN mst_company.update_user IS '更新者';
COMMENT ON COLUMN mst_company.update_date IS '更新日時';
COMMENT ON COLUMN mst_company.is_delete IS '削除フラグ';

INSERT INTO mst_company(company_name, company_name_kana, zip, address, create_user, create_date, update_user, update_date) VALUES ('ジョブサポート', 'ジョブサポート', '1020072', '東京都千代田区飯田橋3-11-13 FORCAST飯田橋ビル8階', 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'), 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'));
INSERT INTO mst_company(company_name, company_name_kana, zip, address, create_user, create_date, update_user, update_date) VALUES ('クリーブ', 'クリーブ', '1020072', '東京都千代田区飯田橋3-11-13 FORCAST飯田橋ビル8階', 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'), 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'));
INSERT INTO mst_company(company_name, company_name_kana, zip, address, create_user, create_date, update_user, update_date) VALUES ('ボンクレ', 'ボンクレ', '1020072', '東京都千代田区飯田橋3-11-13 FORCAST飯田橋ビル8階', 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'), 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'));
