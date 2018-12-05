DROP TABLE IF EXISTS users;
CREATE TABLE users (id serial PRIMARY KEY, username text, password text, email text);
DROP TABLE IF EXISTS lifts;
CREATE TABLE lifts (lift_id bigint unsigned, day date, bench float, squat float, deadlift float, overhead float, pullups float);
ALTER TABLE lifts ADD CONSTRAINT fk_userid_liftid FOREIGN KEY(lift_id) REFERENCES users(id);
ALTER TABLE lifts ADD PRIMARY KEY(lift_id, day);
