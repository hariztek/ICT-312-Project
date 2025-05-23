<?php
// Database connection configuration for MAMP
define('DB_HOST', 'localhost');
define('DB_USER', 'root');     // MAMP default username
define('DB_PASS', 'root');     // MAMP default password
define('DB_NAME', 'zapcart_db');

// Initialize $conn as null
$conn = null;

// Create database connection
try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Function to get all categories
function getCategories($conn) {
    try {
        $stmt = $conn->prepare("SELECT category_id as id, name, icon FROM categories ORDER BY name");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return [];
    }
}

// Function to get products by category
function getProductsByCategory($conn, $categoryId) {
    try {
        $stmt = $conn->prepare("
            SELECT 
                product_id as id,
                name,
                price,
                description,
                photo as image
            FROM products 
            WHERE category_id = :categoryId
            ORDER BY name
        ");
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return [];
    }
}

// Function to get single product details
function getProductDetails($conn, $productId) {
    try {
        $stmt = $conn->prepare("
            SELECT 
                p.product_id as id,
                p.name,
                p.price,
                p.description,
                p.photo as image,
                p.stock_quantity,
                c.name as category_name
            FROM products p
            JOIN categories c ON p.category_id = c.category_id
            WHERE p.product_id = :productId
        ");
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return null;
    }
}

// Function to get all deals (products with stock quantity > 0)
function getDeals($conn) {
    try {
        $stmt = $conn->prepare("
            SELECT 
                d.deal_id,
                d.product_id,
                p.name,
                p.photo AS image,
                p.description,
                p.price AS original_price,
                d.deal_price,
                d.discount_percentage,
                d.end_date,
                TIMESTAMPDIFF(SECOND, NOW(), d.end_date) AS seconds_remaining
            FROM deals d
            JOIN products p ON d.product_id = p.product_id
            WHERE d.end_date > NOW()
            ORDER BY d.discount_percentage DESC
            LIMIT 4
        ");
        $stmt->execute();
        $deals = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Calculate time_remaining in a human-readable format
        foreach ($deals as &$deal) {
            $seconds = $deal['seconds_remaining'];
            if ($seconds <= 0) {
                $deal['time_remaining'] = 'Ended';
            } else {
                $days = floor($seconds / 86400);
                $hours = floor(($seconds % 86400) / 3600);
                $minutes = floor(($seconds % 3600) / 60);
                $deal['time_remaining'] = "{$days}d {$hours}h {$minutes}m";
            }
        }
        return $deals;
    } catch(PDOException $e) {
        return [];
    }
}
?> 