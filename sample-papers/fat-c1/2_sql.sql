CREATE DATABASE IF NOT EXISTS work;

USE work;

DROP TABLE IF EXISTS costumer;

CREATE TABLE costumer(
    id INT auto_increment,
    name VARCHAR(30),
    country VARCHAR(30),
    credits INT,
    primary key(id)
);

INSERT INTO costumer values(1, 'John Doe', 'USA', 1000);
INSERT INTO costumer values(2, 'Jane Smith', 'Canada', 1500);
INSERT INTO costumer values(3, 'Alice Johnson', 'UK', 1200);
INSERT INTO costumer values(4, 'Bob Williams', 'Australia', 800);
INSERT INTO costumer values(5, 'Eva Martinez', 'Spain', 2000);
INSERT INTO costumer values(6, 'Michael Kim', 'South Korea', 900);
INSERT INTO costumer values(7, 'Sophie Müller', 'Germany', 1300);
INSERT INTO costumer values(8, 'Carlos Rodriguez', 'Mexico', 1100);
INSERT INTO costumer values(9, 'Aisha Ahmed', 'UAE', 1600);
INSERT INTO costumer values(10, 'Yuki Tanaka', 'Japan', 1800);
INSERT INTO costumer values(11, 'Maria Sanchez', 'Argentina', 1200);
INSERT INTO costumer values(12, 'Chen Wei', 'China', 1400);
INSERT INTO costumer values(13, 'Ravi Patel', 'India', 900);
INSERT INTO costumer values(14, 'Marta González', 'Spain', 1100);
INSERT INTO costumer values(15, 'Alexandre Dupont', 'France', 1600);
INSERT INTO costumer values(16, 'Emily Davis', 'USA', 1300);
INSERT INTO costumer values(17, 'Luca Ferrari', 'Italy', 1000);
INSERT INTO costumer values(18, 'Fátima Silva', 'Brazil', 1500);
INSERT INTO costumer values(19, 'Khaled Al-Farsi', 'Saudi Arabia', 800);
INSERT INTO costumer values(20, 'Aiko Tanaka', 'Japan', 2000);
