-- auto-generated definition
create table ci_sessions
(
  session_id    varchar(40) charset latin1 default '0' not null
    primary key,
  ip_address    varchar(16) charset latin1 default '0' not null,
  user_agent    varchar(120) charset latin1            not null,
  last_activity int default '0'                        not null,
  user_data     text charset latin1                    not null
);

create index last_activity_idx
  on ci_sessions (last_activity);