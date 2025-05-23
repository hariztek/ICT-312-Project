<?php
// Database connection configuration for MAMP
define('DB_HOST', 'localhost');
define('DB_USER', 'root');     // MAMP default username
define('DB_PASS', 'root');     // MAMP default password
define('DB_NAME', 'zapcart_db');

// Temporary flag for screenshots - set to true to use sample data
$USE_SAMPLE_DATA = true;

// Initialize $conn as null
$conn = null;

// Create database connection
try {
    if (!$USE_SAMPLE_DATA) {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
} catch(PDOException $e) {
    // For screenshots, we'll just use sample data
    $USE_SAMPLE_DATA = true;
}

// Function to get all categories
function getCategories($conn) {
    global $USE_SAMPLE_DATA;
    
    if ($USE_SAMPLE_DATA) {
        return [
            ['id' => 1, 'name' => 'Smartphones', 'icon' => 'fa-mobile-alt'],
            ['id' => 2, 'name' => 'Laptops', 'icon' => 'fa-laptop'],
            ['id' => 3, 'name' => 'Accessories', 'icon' => 'fa-headphones'],
            ['id' => 4, 'name' => 'Audio', 'icon' => 'fa-volume-up'],
            ['id' => 5, 'name' => 'Wearables', 'icon' => 'fa-watch-smart'],
            ['id' => 6, 'name' => 'Home Appliances', 'icon' => 'fa-blender']
        ];
    }

    try {
        $stmt = $conn->prepare("SELECT * FROM categories ORDER BY category_name");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return [];
    }
}

// Function to get products by category
function getProductsByCategory($conn, $categoryId) {
    global $USE_SAMPLE_DATA;
    
    if ($USE_SAMPLE_DATA) {
        $sampleProducts = [
            1 => [ // Smartphones
                [
                    'id' => 1,
                    'name' => 'iPhone 13',
                    'price' => 799.99,
                    'description' => 'Latest iPhone model with advanced features',
                    'image' => 'iphone13.jpg'
                ],
                [
                    'id' => 2,
                    'name' => 'Samsung Galaxy S21',
                    'price' => 649.99,
                    'description' => 'Powerful Android smartphone with amazing camera',
                    'image' => 'galaxy-s21.jpg'
                ]
            ],
            2 => [ // Laptops
                [
                    'id' => 3,
                    'name' => 'MacBook Pro',
                    'price' => 1299.99,
                    'description' => 'Professional laptop for creators and developers',
                    'image' => 'macbook-pro.jpg'
                ]
            ],
            3 => [ // Accessories
                [
                    'id' => 4,
                    'name' => 'Sony WH-1000XM4',
                    'price' => 349.99,
                    'description' => 'Premium noise-cancelling headphones',
                    'image' => 'sony-wh1000xm4.jpg'
                ]
            ]
        ];
        return isset($sampleProducts[$categoryId]) ? $sampleProducts[$categoryId] : [];
    }

    try {
        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :categoryId");
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return [];
    }
}

// Function to get single product details
function getProductDetails($conn, $productId) {
    global $USE_SAMPLE_DATA;
    
    if ($USE_SAMPLE_DATA) {
        $sampleProducts = [
            1 => [
                'id' => 1,
                'name' => 'iPhone 13',
                'price' => 799.99,
                'description' => 'Latest iPhone model with advanced features',
                'image' => 'iphone13.jpg',
                'specifications' => [
                    'Display' => '6.1-inch Super Retina XDR',
                    'Processor' => 'A15 Bionic chip',
                    'Storage' => '128GB',
                    'Camera' => '12MP Dual-camera system'
                ]
            ],
            2 => [
                'id' => 2,
                'name' => 'Samsung Galaxy S21',
                'price' => 649.99,
                'description' => 'Powerful Android smartphone with amazing camera',
                'image' => 'galaxy-s21.jpg',
                'specifications' => [
                    'Display' => '6.2-inch Dynamic AMOLED',
                    'Processor' => 'Snapdragon 888',
                    'Storage' => '128GB',
                    'Camera' => '108MP Triple camera system'
                ]
            ]
        ];
        return isset($sampleProducts[$productId]) ? $sampleProducts[$productId] : null;
    }

    try {
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :productId");
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($product) {
            $stmt = $conn->prepare("SELECT * FROM product_specifications WHERE product_id = :productId");
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
            $stmt->execute();
            $specs = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
            $product['specifications'] = $specs;
        }
        
        return $product;
    } catch(PDOException $e) {
        return null;
    }
}

// Function to get all deals
function getDeals($conn) {
    global $USE_SAMPLE_DATA;
    
    if ($USE_SAMPLE_DATA) {
        return [
            [
                'id' => 1,
                'product_id' => 1,
                'name' => 'iPhone 13',
                'original_price' => 799.99,
                'deal_price' => 699.99,
                'discount_percentage' => 13,
                'description' => 'Limited time offer on the latest iPhone model',
                'image' => 'iphone13.jpg',
                'time_remaining' => '2 days left'
            ],
            [
                'id' => 2,
                'product_id' => 2,
                'name' => 'Samsung Galaxy S21',
                'original_price' => 649.99,
                'deal_price' => 549.99,
                'discount_percentage' => 15,
                'description' => 'Special discount on this powerful Android smartphone',
                'image' => 'galaxy-s21.jpg',
                'time_remaining' => '1 day left'
            ],
            [
                'id' => 3,
                'product_id' => 3,
                'name' => 'MacBook Pro',
                'original_price' => 1299.99,
                'deal_price' => 1199.99,
                'discount_percentage' => 8,
                'description' => 'Professional laptop at a special price',
                'image' => 'macbook-pro.jpg',
                'time_remaining' => '3 days left'
            ],
            [
                'id' => 4,
                'product_id' => 4,
                'name' => 'Sony WH-1000XM4',
                'original_price' => 349.99,
                'deal_price' => 299.99,
                'discount_percentage' => 14,
                'description' => 'Premium noise-cancelling headphones with special discount',
                'image' => 'sony-wh1000xm4.jpg',
                'time_remaining' => '4 days left'
            ]
        ];
    }

    try {
        $stmt = $conn->prepare("
            SELECT d.*, p.name, p.image, p.price as original_price
            FROM deals d
            JOIN products p ON d.product_id = p.id
            WHERE d.end_date > NOW()
            ORDER BY d.discount_percentage DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return [];
    }
}
?> 