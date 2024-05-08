CREATE DATABASE IF NOT EXISTS work;

USE work;

DROP TABLE IF EXISTS state_details;

CREATE  TABLE state_details(
    id INT auto_increment,
    state_name VARCHAR(30),
    district_name VARCHAR(30),
    district_population INT default 10000,
    district_headquarter VARCHAR(30),
    primary key(id)
);

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Andhra Pradesh", "visakhapatnam", 2331000, "visakhapatnam");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Andhra Pradesh", "Anantapur", 486000, "Anantapur");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Andhra Pradesh", "Chittoor", 4640000, "Chittoor");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Arunachal Pradesh", "Itanagar", 81000, "Itanagar");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Arunachal Pradesh", "Naharlagun", 49000, "Naharlagun");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Bihar", "Patna", 2580000, "Patna");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Bihar", "Gaya", 598000, "Gaya");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Gujarat", "Ahmedabad", 7692000, "Ahmedabad");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Gujarat", "Surat", 8065000, "Surat");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Karnataka", "Bangalore", 13608000, "Bangalore");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Karnataka", "Mysuru", 1288000, "Mysuru");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Maharashtra", "Mumbai", 21297000, "Mumbai");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Maharashtra", "Pune", 4307000, "Pune");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Rajasthan", "Jaipur", 4207000, "Jaipur");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Rajasthan", "Jodhpur", 1587000, "Jodhpur");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Tamil Nadu", "Chennai", 6407000, "Chennai");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Tamil Nadu", "Coimbatore", 3009000, "Coimbatore");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Uttar Pradesh", "Lucknow", 3945000, "Lucknow");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("Uttar Pradesh", "Kanpur", 3234000, "Kanpur");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("West Bengal", "Kolkata", 15332793, "Kolkata");

INSERT INTO state_details(state_name, district_name, district_population, district_headquarter)
VALUES("West Bengal", "Howrah", 5500000, "Howrah");
