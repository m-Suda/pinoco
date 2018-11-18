-- auto-generated definition
create table mst_company
(
  company_id   varchar(32)                not null
    primary key,
  company_name varchar(64) charset latin1 null,
  create_user  varchar(16) charset latin1 not null,
  create_date  varchar(14) charset latin1 not null,
  update_user  varchar(16) charset latin1 not null,
  update_date  varchar(14) charset latin1 not null,
  is_delete    smallint(6) default '0'    not null
);