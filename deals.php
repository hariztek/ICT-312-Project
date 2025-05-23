<?php
require_once 'includes/db_connect.php';

// Get all deals
$deals = getDeals($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Special Deals | ZapCart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/deals.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/navigation.php'; ?>

<main class="deals-page">
    <!-- Deals Banner Section -->
    <section class="deals-banner">
        <div class="banner-content">
            <h1>Special Deals & Offers</h1>
            <p>Limited time offers on our best products</p>
        </div>
    </section>

    <!-- Featured Deals Section -->
    <section class="featured-deals">
        <h2>Featured Deals</h2>
        <div class="deals-grid">
            <?php foreach ($deals as $deal): ?>
                <div class="deal-card">
                    <div class="discount-badge">
                        <?php echo $deal['discount_percentage']; ?>% OFF
                    </div>
                    <div class="deal-image">
                        <img src="images/products/<?php echo htmlspecialchars($deal['image']); ?>" 
                             alt="<?php echo htmlspecialchars($deal['name']); ?>"
                             loading="lazy">
                    </div>
                    <div class="deal-info">
                        <h3><?php echo htmlspecialchars($deal['name']); ?></h3>
                        <div class="price-container">
                            <span class="original-price">$<?php echo number_format($deal['original_price'], 2); ?></span>
                            <span class="deal-price">$<?php echo number_format($deal['deal_price'], 2); ?></span>
                        </div>
                        <p class="deal-description"><?php echo htmlspecialchars($deal['description']); ?></p>
                        <div class="deal-timer">
                            <i class="fas fa-clock"></i>
                            Ends in: <?php echo $deal['time_remaining']; ?>
                        </div>
                        <div class="deal-actions">
                            <a href="product.php?id=<?php echo $deal['product_id']; ?>" class="view-details">
                                View Details <i class="fas fa-arrow-right"></i>
                            </a>
                            <button class="add-to-cart-btn">
                                <i class="fas fa-shopping-cart"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Deal Categories Section -->
    <section class="deal-categories">
        <h2>Deal Categories</h2>
        <div class="categories-grid">
            <a href="#electronics" class="category-card">
                <i class="fas fa-laptop"></i>
                <span>Electronics</span>
            </a>
            <a href="#fashion" class="category-card">
                <i class="fas fa-tshirt"></i>
                <span>Fashion</span>
            </a>
            <a href="#home" class="category-card">
                <i class="fas fa-home"></i>
                <span>Home & Living</span>
            </a>
            <a href="#beauty" class="category-card">
                <i class="fas fa-spa"></i>
                <span>Beauty</span>
            </a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

<script>
// Add to cart functionality
document.querySelectorAll('.add-to-cart-btn').forEach(button => {
    button.addEventListener('click', () => {
        // Add to cart logic will be implemented later
        alert('Product added to cart!');
    });
});

// Smooth scroll for category links
document.querySelectorAll('.category-card').forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const targetId = link.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
    });
});
</script>
</body>
</html> 