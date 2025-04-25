-- Create Customers Table
CREATE TABLE customers (
    customer_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
);

-- Create Products Table
CREATE TABLE products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    photo VARCHAR(30),
    name VARCHAR(30),
    price DECIMAL(6,2)
);

-- Create Orders Table
CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    total DECIMAL(10,2) DEFAULT 0,
    order_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(10) DEFAULT 'pending', -- Status can be 'pending' or 'completed'
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE CASCADE
);

-- Create Order_Items Table
CREATE TABLE order_items (
    order_item_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE RESTRICT
);

-- Insert Sample Data into Customers Table
INSERT INTO customers (email, password) VALUES
('user1', 'user1'),
('user2', 'user2'),
('admin', 'admin');

-- Insert Sample Data into Products Table (8 for Category 1, 8 for Category 2)
INSERT INTO products (photo, name, price) VALUES
-- Category 1 Products
('c1_1.jpg', 'c1_1 name', 150.00),
('c1_2.jpg', 'c1_2 name', 200.00),
('c1_3.jpg', 'c1_3 name', 180.00),
('c1_4.jpg', 'c1_4 name', 300.00),
('c1_5.jpg', 'c1_5 name', 280.00),
('c1_6.jpg', 'c1_6 name', 120.00),
('c1_7.jpg', 'c1_7 name', 100.00),
('c1_8.jpg', 'c1_8 name', 90.00),

-- Category 2 Products
('c2_1.jpg', 'c2_1 name', 610.00),
('c2_2.jpg', 'c2_2 name', 600.00),
('c2_3.jpg', 'c2_3 name', 590.00),
('c2_4.jpg', 'c2_4 name', 400.00),
('c2_5.jpg', 'c2_5 name', 420.00),
('c2_6.jpg', 'c2_6 name', 300.00),
('c2_7.jpg', 'c2_7 name', 310.00),
('c2_8.jpg', 'c2_8 name', 800.00);

-- Example Insert into Orders Table
INSERT INTO orders (customer_id, total) VALUES
(1, 1230.00);

-- Example Insert into Order_Items Table
INSERT INTO order_items (order_id, product_id, quantity) VALUES
(1, 1, 2), -- 2 units of c1_1
(1, 9, 1), -- 1 unit of c2_1
(1, 13, 1); -- 1 unit of c2_5
