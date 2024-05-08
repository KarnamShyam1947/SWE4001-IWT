CREATE DATABASE IF NOT EXISTS work;

USE work;

DROP TABLE IF EXISTS countries;

CREATE TABLE countries(
    id int auto_increment,
    name VARCHAR(50),
    primary key(id)
);

DROP TABLE IF EXISTS states;

CREATE TABLE states(
    id int auto_increment,
    name VARCHAR(50),
    country_id int,
    primary key(id),
    foreign key(country_id) references countries(id) on delete cascade
);


INSERT INTO countries (name) VALUES ('United States');
INSERT INTO countries (name) VALUES ('Canada');
INSERT INTO countries (name) VALUES ('United Kingdom');
INSERT INTO countries (name) VALUES ('Australia');

INSERT INTO states (name, country_id) VALUES ('California', 1);
INSERT INTO states (name, country_id) VALUES ('New York', 1);
INSERT INTO states (name, country_id) VALUES ('Texas', 1);

INSERT INTO states (name, country_id) VALUES ('Ontario', 2);
INSERT INTO states (name, country_id) VALUES ('Quebec', 2);
INSERT INTO states (name, country_id) VALUES ('Columbia', 2);

INSERT INTO states (name, country_id) VALUES ('England', 3);
INSERT INTO states (name, country_id) VALUES ('Scotland', 3);
INSERT INTO states (name, country_id) VALUES ('Wales', 3);

INSERT INTO states (name, country_id) VALUES ('New South Wales', 4);
INSERT INTO states (name, country_id) VALUES ('Queensland', 4);
INSERT INTO states (name, country_id) VALUES ('Victoria', 4);

