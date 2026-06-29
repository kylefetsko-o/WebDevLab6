CREATE DATABASE IF NOT EXISTS bookie_bookstore;
USE bookie_bookstore;

CREATE TABLE Customer (
  customer_id INT AUTO_INCREMENT PRIMARY KEY,
  last_name VARCHAR(50) NOT NULL,
  first_name VARCHAR(50) NOT NULL,
  phone_number VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(100) NOT NULL,
  address VARCHAR(200) NOT NULL,
  birthdate DATE NOT NULL
);

CREATE TABLE Book (
  book_id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  author VARCHAR(100) NOT NULL,
  price DECIMAL(6,2) NOT NULL,
  description TEXT
);

CREATE TABLE Orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  customer_id INT NOT NULL,
  total_price DECIMAL(8,2) NOT NULL
);

CREATE TABLE Order_Item (
  order_item_id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  book_id INT NOT NULL,
  quantity INT NOT NULL
);

INSERT INTO Book (title, author, price, description) VALUES
('The Great Gatsby', 'F. Scott Fitzgerald', 12.99, 'A Great Story'),
('The Hobbit', 'J.R.R. Tolkien', 14.50, 'A Hobbit Story'),
('Paradox', 'A. Writer', 9.99, 'A paradoxical story'),
('Harry Potter and the Deathly Hallows', 'J.K. Rowling', 19.99, 'A potter story');
