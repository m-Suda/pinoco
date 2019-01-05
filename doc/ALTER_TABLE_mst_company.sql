-- auto-generated definition
create table mst_company
(
  company_id        varchar(32)             not null
    primary key,
  company_name      varchar(64)             null,
  create_user       varchar(16)             not null,
  create_date       varchar(14)             not null,
  update_user       varchar(16)             not null,
  update_date       varchar(14)             not null,
  is_delete         smallint(6) default '0' not null,
  tel               varchar(12)             null,
  email             text                    null,
  company_name_kana varchar(128)            null,
  zip               varchar(8)              null,
  address           text                    null
);

