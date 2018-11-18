-- auto-generated definition
create table mst_user
(
  user_id     varchar(50)             not null
    primary key,
  user_name   varchar(30)             null,
  user_auth   smallint(6)             not null,
  password    text                    null,
  company_id  varchar(32)             null,
  create_user varchar(16)             not null,
  create_date varchar(14)             not null,
  update_user varchar(16)             not null,
  update_date varchar(14)             not null,
  is_delete   smallint(6) default '0' not null
);