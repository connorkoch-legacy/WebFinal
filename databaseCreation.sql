DROP TABLE IF EXISTS lifts;
CREATE TABLE lifts (lift_id bigint unsigned, day datetime, bench integer, squat integer, deadlift integer, overhead integer, pullups integer);
DROP TABLE IF EXISTS users;
CREATE TABLE users (id serial PRIMARY KEY, username text, password text, email text);
ALTER TABLE lifts ADD CONSTRAINT fk_userid_liftid FOREIGN KEY(lift_id) REFERENCES users(id);
ALTER TABLE lifts ADD PRIMARY KEY(lift_id, day);
