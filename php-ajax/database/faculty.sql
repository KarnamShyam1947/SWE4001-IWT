CREATE DATABASE IF NOT EXISTS work;

USE work;

DROP TABLE IF EXISTS faculty;

CREATE TABLE faculty (
    id INT auto_increment,
    name VARCHAR(30),
    department VARCHAR(30),
    primary key(id)
);
