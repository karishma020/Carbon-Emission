CREATE DATABASE carbon_emission_db;

USE carbon_emission_db;

CREATE TABLE fines (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    ref_number VARCHAR(50) NOT NULL UNIQUE,
    amount DECIMAL(10,2) NOT NULL,
    fine_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
