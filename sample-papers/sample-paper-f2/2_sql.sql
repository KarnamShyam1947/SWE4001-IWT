CREATE DATABASE IF NOT EXISTS work;

USE work;

DROP TABLE IF EXISTS accounts;

CREATE  TABLE accounts(
    id INT auto_increment,
    username VARCHAR(30),
    password VARCHAR(30),
    status VARCHAR(10) default "inactive",
    primary key(id)
);

-- INSERTING SAMPLE DATA
INSERT INTO accounts(username, password, status)
values("user1", "pass1", "active"); 

INSERT INTO accounts(username, password, status)
values("user2", "pass2", "inactive");

-- **remaining can be inserted here 
