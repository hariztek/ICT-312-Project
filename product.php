<?php
require_once 'includes/db_connect.php';

// Get product ID from URL parameter
$productId = isset($_GET['id']) ? (int)$_GET['id'] : null;

if (!$productId) {
    // Redirect to products page if no product ID is provided
    header('Location: products.php');
    exit;
}

// Get product details
$product = getProductDetails($conn, $productId);

if (!$product) {
    // Redirect to products page if product not found
    header('Location: products.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product['name']); ?> | ZapCart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/product-detail.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/navigation.php'; ?>

<main class="product-detail-page">
    <div class="product-container">
        <!-- Product Image Section -->
        <div class="product-image-section">
            <img src="images/products/<?php echo htmlspecialchars($product['image']); ?>" 
                 alt="<?php echo htmlspecialchars($product['name']); ?>"
                 class="main-product-image">
        </div>

        <!-- Product Info Section -->
        <div class="product-info-section">
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
            
            <div class="product-description">
                <h2>Description</h2>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
            </div>

            <!-- Specifications Section -->
            <div class="product-specifications">
                <h2>Specifications</h2>
                <table>
                    <?php foreach ($product['specifications'] as $key => $value): ?>
                        <tr>
                            <th><?php echo htmlspecialchars($key); ?></th>
                            <td><?php echo htmlspecialchars($value); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <!-- Add to Cart Section -->
            <div class="add-to-cart-section">
                <div class="quantity-selector">
                    <button class="quantity-btn minus">-</button>
                    <input type="number" value="1" min="1" max="10" id="quantity">
                    <button class="quantity-btn plus">+</button>
                </div>
                <button class="add-to-cart-btn">
                    <i class="fas fa-shopping-cart"></i>
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>

<script>
// Quantity selector functionality
document.querySelectorAll('.quantity-btn').forEach(button => {
    button.addEventListener('click', () => {
        const input = document.getElementById('quantity');
        const currentValue = parseInt(input.value);
        
        if (button.classList.contains('minus')) {
            input.value = Math.max(1, currentValue - 1);
        } else {
            input.value = Math.min(10, currentValue + 1);
        }
    });
});

// Add to cart functionality
document.querySelector('.add-to-cart-btn').addEventListener('click', () => {
    const quantity = document.getElementById('quantity').value;
    // Add to cart logic will be implemented later
    alert('Product added to cart!');
});
</script>
</body>
</html> 