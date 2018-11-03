CREATE TABLE IF NOT EXISTS ci_sessions (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(16) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity integer DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	CONSTRAINT                 ci_sessions_pkey PRIMARY KEY (session_id)
);
CREATE INDEX last_activity_idx ON ci_sessions ( last_activity );