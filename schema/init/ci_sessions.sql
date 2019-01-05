-- auto-generated definition
create table ci_sessions
(
  session_id    varchar(40) default '0' not null
    primary key,
  ip_address    varchar(16) default '0' not null,
  user_agent    varchar(120) not null,
  last_activity int default '0' not null,
  user_data     text not null
);

create index last_activity_idx
  on ci_sessions (last_activity);