-- Table: trn_attendance

-- DROP TABLE trn_attendance;

CREATE TABLE trn_attendance
(
  id serial NOT NULL, -- 勤怠ID
  user_id character varying(6) NOT NULL, --ユーザーID
  today character varying(8), -- 本日日付
  arrival_time character varying(14), -- 出勤時間
  leave_time character varying(14), -- 退勤時間
  day_report text, -- 日報
  create_user character varying(16) NOT NULL, -- 登録者
  create_date character varying(14) NOT NULL, -- 登録日時
  update_user character varying(16) NOT NULL, -- 更新者
  update_date character varying(14) NOT NULL, -- 更新日時
  is_delete smallint NOT NULL DEFAULT 0, -- 削除フラグ
  CONSTRAINT trn_attendance_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE trn_attendance
  OWNER TO postgres;
COMMENT ON COLUMN trn_attendance.id IS '勤怠ID';
COMMENT ON COLUMN trn_attendance.user_id IS 'ユーザーID';
COMMENT ON COLUMN trn_attendance.today IS '本日日付';
COMMENT ON COLUMN trn_attendance.arrival_time IS '出勤時間';
COMMENT ON COLUMN trn_attendance.leave_time IS '退勤時間';
COMMENT ON COLUMN trn_attendance.day_report IS '日報';
COMMENT ON COLUMN trn_attendance.create_date IS '登録日時';
COMMENT ON COLUMN trn_attendance.update_user IS '更新者';
COMMENT ON COLUMN trn_attendance.update_date IS '更新日時';
COMMENT ON COLUMN trn_attendance.is_delete IS '削除フラグ';

