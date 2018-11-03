-- Table: mst_user

-- DROP TABLE mst_user;

CREATE TABLE mst_user
(
  user_id character varying(50) NOT NULL, -- ユーザーID
  user_name character varying(30), -- ユーザー名
  user_type smallint NOT NULL, -- ユーザー種別 1：管理者　2：研修生
  password text, -- パスワード
  company_id smallint NOT NULL, -- 法人ID
  mail_address text, -- メールアドレス
  start_date character varying(19), -- 研修開始日
  end_date character varying(19), -- 研修終了日
  create_user character varying(16) NOT NULL, -- 登録者
  create_date character varying(14) NOT NULL, -- 登録日時
  update_user character varying(16) NOT NULL, -- 更新者
  update_date character varying(14) NOT NULL, -- 更新日時
  is_delete smallint NOT NULL DEFAULT 0, -- 削除フラグ
  CONSTRAINT mst_user_pkey PRIMARY KEY (user_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE mst_user
  OWNER TO postgres;
COMMENT ON COLUMN mst_user.user_id IS 'ユーザーID';
COMMENT ON COLUMN mst_user.user_name IS 'ユーザー名';
COMMENT ON COLUMN mst_user.user_type IS 'ユーザー種別 1：管理者　2：研修生';
COMMENT ON COLUMN mst_user.password IS 'パスワード';
COMMENT ON COLUMN mst_user.company_id IS '法人ID';
COMMENT ON COLUMN mst_user.mail_address IS 'メールアドレス';
COMMENT ON COLUMN mst_user.start_date IS '研修開始日';
COMMENT ON COLUMN mst_user.end_date IS '研修終了日';
COMMENT ON COLUMN mst_user.create_user IS '登録者';
COMMENT ON COLUMN mst_user.create_date IS '登録日時';
COMMENT ON COLUMN mst_user.update_user IS '更新者';
COMMENT ON COLUMN mst_user.update_date IS '更新日時';
COMMENT ON COLUMN mst_user.is_delete IS '削除フラグ';

INSERT INTO mst_user(user_id, user_name, user_type, password, company_id, mail_address, create_user, create_date, update_user, update_date) VALUES ('admin', 'システム管理者', 1, 'p12345678', 1, 'admin@job-support.co.jp', 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'), 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'));
INSERT INTO mst_user(user_id, user_name, user_type, password, company_id, mail_address, create_user, create_date, update_user, update_date) VALUES ('job01', 'job社員', 2, 'p12345678', 1, 'job@job-support.co.jp', 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'), 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'));
INSERT INTO mst_user(user_id, user_name, user_type, password, company_id, mail_address, create_user, create_date, update_user, update_date) VALUES ('user01', '研修生A', 3, 'p12345678', 2, 'trainee01@job-support.co.jp', 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'), 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'));
INSERT INTO mst_user(user_id, user_name, user_type, password, company_id, mail_address, create_user, create_date, update_user, update_date) VALUES ('user02', '研修生B', 3, 'p12345678', 3, 'trainee02@job-support.co.jp', 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'), 'SYSTEM', to_char(now(), 'yyyyMMddHH24MISS'));
