-- auto-generated definition
create table trn_attendance
(
  id           bigint unsigned auto_increment,
  user_id      varchar(50)             not null,
  today        varchar(8)              null,
  arrival_time varchar(14)             null,
  leave_time   varchar(14)             null,
  day_report   text                    null,
  create_user  varchar(16)             not null,
  create_date  varchar(14)             not null,
  update_user  varchar(16)             not null,
  update_date  varchar(14)             not null,
  is_delete    smallint(6) default '0' not null,
  constraint id
  unique (id)
);

alter table trn_attendance
  add primary key (id);

