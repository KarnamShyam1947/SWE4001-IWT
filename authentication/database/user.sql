CREATE DATABASE IF NOT EXISTS work;

USE work;

DROP TABLE IF EXISTS users;

CREATE TABLE users(
    id INT auto_increment,
    dob VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(30),
    phone VARCHAR(15),
    gender VARCHAR(10),
    password VARCHAR(255),
    image_url VARCHAR(100) default 'https://cdn.landesa.org/wp-content/uploads/default-user-image.png',
    primary key(id),
    unique(email)
);
