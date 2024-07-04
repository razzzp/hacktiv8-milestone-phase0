CREATE DATABASE IF NOT EXISTS hacktiv8_milestone_0;

USE hacktiv8_milestone_0;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(320) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255),
    password varchar(255) NOT NULL
);


CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255),
    email VARCHAR(320) NOT NULL,
    phone_number VARCHAR(20),
    subject VARCHAR(255),
    messsage TEXT NOT NULL
);