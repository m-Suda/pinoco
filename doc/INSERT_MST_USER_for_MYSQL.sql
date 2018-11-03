insert into mst_user(user_id, user_name, user_auth, password, create_user, create_date, update_user, update_date)
values ('administrator', 'システム管理者', 1, 'administrator', 'SYSTEM', date_format(now(), '%Y%m%d%H%i%s'), 'SYSTEM', date_format(now(), '%Y%m%d%H%i%s'));
