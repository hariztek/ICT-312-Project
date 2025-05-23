-- Create Customers Table
CREATE TABLE customers (
    customer_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
);

-- Create Categories Table
CREATE TABLE categories (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    icon VARCHAR(50)
);

-- Create Products Table
CREATE TABLE products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    photo VARCHAR(30),
    name VARCHAR(30),
    price DECIMAL(6,2),
    category_id INT,
    description TEXT,
    stock_quantity INT DEFAULT 0,
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

-- Create Orders Table
CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    total DECIMAL(10,2) DEFAULT 0,
    order_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(10) DEFAULT 'pending',
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE CASCADE
);

-- Create Order_Items Table
CREATE TABLE order_items (
    order_item_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    product_id INT,
    quantity INT,
    unit_price DECIMAL(6,2),
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE RESTRICT
);

-- Create Carts Table
CREATE TABLE carts (
    cart_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE CASCADE
);

-- Create Cart_Items Table
CREATE TABLE cart_items (
    cart_item_id INT PRIMARY KEY AUTO_INCREMENT,
    cart_id INT,
    product_id INT,
    quantity INT NOT NULL DEFAULT 1,
    FOREIGN KEY (cart_id) REFERENCES carts(cart_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Insert Sample Data into Customers Table
INSERT INTO customers (email, password) VALUES
('user1', 'user1'),
('user2', 'user2'),
('admin', 'admin');

-- Insert Categories
INSERT INTO categories (category_id, name, description, icon) VALUES
(1, 'Smartphones', 'Latest smartphone models', 'fa-mobile-alt'),
(2, 'Accessories', 'Cases, chargers, and other accessories', 'fa-headphones');

-- Insert Products
INSERT INTO products (photo, name, price, category_id, description, stock_quantity) VALUES
-- Smartphones (Category 1)
('iphone13.jpg', 'iPhone 13', 999.00, 1, '6.1-inch Super Retina XDR display, A15 Bionic chip', 50),
('samsung_s22.jpg', 'Samsung Galaxy S22', 899.00, 1, 'Dynamic AMOLED 2X, 50MP camera', 40),
('pixel6.jpg', 'Google Pixel 6', 699.00, 1, 'Tensor chip, 50MP main camera', 30),
('oneplus10.jpg', 'OnePlus 10 Pro', 799.00, 1, 'Hasselblad camera, 80W fast charging', 25),
('xiaomi12.jpg', 'Xiaomi 12 Pro', 899.00, 1, '6.73" AMOLED, Snapdragon 8 Gen 1', 20),
('oppo_findx5.jpg', 'OPPO Find X5', 999.00, 1, 'MariSilicon X imaging NPU', 15),
('nothing_phone1.jpg', 'Nothing Phone (1)', 499.00, 1, 'Glyph interface, Snapdragon 778G+', 35),
('asus_rog6.jpg', 'ASUS ROG Phone 6', 1099.00, 1, '165Hz AMOLED, Snapdragon 8+ Gen 1', 10),

-- Accessories (Category 2)
('airpods_pro.jpg', 'AirPods Pro', 249.00, 2, 'Active noise cancellation, spatial audio', 100),
('magic_mouse.jpg', 'Magic Mouse', 99.00, 2, 'Multi-touch surface, rechargeable', 75),
('iphone_case.jpg', 'iPhone Leather Case', 49.00, 2, 'Premium European leather', 120),
('samsung_cover.jpg', 'Samsung Clear Cover', 29.00, 2, 'Anti-yellowing transparent case', 90),
('65w_charger.jpg', '65W USB-C Charger', 59.00, 2, 'Fast charging for phones/laptops', 60),
('car_mount.jpg', 'Car Vent Mount', 19.00, 2, 'One-hand operation, 360° rotation', 200),
('power_bank.jpg', '20,000mAh Power Bank', 49.00, 2, 'Dual USB-C ports, 18W PD', 80),
('screen_protector.jpg', 'Tempered Glass (3-Pack)', 15.00, 2, '9H hardness, bubble-free', 150);

-- Sample order
INSERT INTO orders (customer_id, total, status) VALUES
(1, 2146.00, 'processing');

-- Sample order items
INSERT INTO order_items (order_id, product_id, quantity, unit_price) VALUES
(1, 1, 1, 999.00),  -- 1 x iPhone 13
(1, 9, 1, 249.00),  -- 1 x AirPods Pro
(1, 13, 1, 59.00);  -- 1 x 65W Charger 