CREATE DATABASE dynamic_project;
USE dynamic_project;
CREATE TABLE brands (
  brand_id INT AUTO_INCREMENT PRIMARY KEY,
  brand_name VARCHAR(100) NOT NULL UNIQUE,
  country VARCHAR(100)
);
CREATE TABLE cars (
  car_id INT AUTO_INCREMENT PRIMARY KEY,
  brand_id INT,
  model VARCHAR(100) NOT NULL,
  year YEAR NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  status ENUM('available', 'sold') DEFAULT 'available',
  added_date DATE DEFAULT CURRENT_DATE,
  FOREIGN KEY (brand_id) REFERENCES brands(brand_id) ON DELETE CASCADE
);
INSERT INTO brands (brand_name, country) VALUES
('Nissan', 'Japan'),
('Ford', 'USA'),
('BMW', 'Germany');

INSERT INTO cars (brand_id, model, year, price, status) VALUES
(1, 'GTR R34', 2020, 15000.00, 'available'),
(2, 'Shelby GT 500', 2022, 42000.00, 'sold'),
(3, 'M5 CS', 2021, 60000.00, 'available');
 