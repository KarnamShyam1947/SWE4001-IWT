CREATE DATABASE IF NOT EXISTS work;

USE work;

DROP TABLE IF EXISTS scores;

CREATE TABLE scores(
    id INT auto_increment,
    score INT,
    no_of_wickets INT,
    overs DECIMAL,
    country VARCHAR(30),
    primary key(id)
);

INSERT INTO scores VALUES (1, 250, 4, 45.2, 'India');
