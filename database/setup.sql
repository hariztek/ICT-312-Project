-- Create the database
CREATE DATABASE IF NOT EXISTS zapcart_db;
USE zapcart_db;

-- Create categories table
CREATE TABLE IF NOT EXISTS categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    icon VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create products table
CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    category_id INT,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Create product specifications table
CREATE TABLE IF NOT EXISTS product_specifications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    product_id INT,
    spec_name VARCHAR(100) NOT NULL,
    spec_value TEXT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Insert sample categories
INSERT INTO categories (name, icon) VALUES
('Smartphones', 'fa-mobile-alt'),
('Laptops', 'fa-laptop'),
('Accessories', 'fa-headphones'),
('Audio', 'fa-volume-up'),
('Wearables', 'fa-watch-smart'),
('Home Appliances', 'fa-blender');

-- Insert sample products
INSERT INTO products (category_id, name, price, description, image) VALUES
(1, 'iPhone 13', 799.99, 'Latest iPhone model with advanced features', 'iphone13.jpg'),
(1, 'Samsung Galaxy S21', 649.99, 'Powerful Android smartphone with amazing camera', 'galaxy-s21.jpg'),
(2, 'MacBook Pro', 1299.99, 'Professional laptop for creators and developers', 'macbook-pro.jpg'),
(3, 'Sony WH-1000XM4', 349.99, 'Premium noise-cancelling headphones', 'sony-wh1000xm4.jpg');

-- Insert sample specifications
INSERT INTO product_specifications (product_id, spec_name, spec_value) VALUES
(1, 'Display', '6.1-inch Super Retina XDR'),
(1, 'Processor', 'A15 Bionic chip'),
(1, 'Storage', '128GB'),
(1, 'Camera', '12MP Dual-camera system'),
(2, 'Display', '6.2-inch Dynamic AMOLED'),
(2, 'Processor', 'Snapdragon 888'),
(2, 'Storage', '128GB'),
(2, 'Camera', '108MP Triple camera system'); 