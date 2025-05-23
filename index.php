<?php
require_once 'includes/db_connect.php';

// Fetch 8 random products from the database
try {
    $stmt = $conn->prepare("SELECT product_id, name, price, photo FROM products ORDER BY RAND() LIMIT 8");
    $stmt->execute();
    $topProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $topProducts = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ZapCart | Electronics</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FontAwesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/navigation.php'; ?>

<main>
<section class="hero">
    <div class="main-banner">
        <div class="main-banner-overlay"></div>
        <div class="main-banner-content">
            <h2>Welcome to ZapCart</h2>
            <p>Your One-Stop Shop for Electronics</p>
        </div>
    </div>
    <h2>Explore Our Products</h2>
</section>

<section class="categories">
    <div class="category"><i class="fas fa-mobile-alt"></i> Smartphones</div>
    <div class="category"><i class="fas fa-laptop"></i> Laptops</div>
    <div class="category"><i class="fas fa-headphones"></i> Accessories</div>
    <div class="category"><i class="fas fa-volume-up"></i> Audio</div>
    <div class="category"><i class="fas fa-watch-smart"></i> Wearables</div>
    <div class="category"><i class="fas fa-blender"></i> Home Appliances</div>
</section>

<section class="top-picks">
    <div class="section-header">
        <h3>Top Picks for You</h3>
        <a href="#">See All <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="product-grid">
        <?php foreach ($topProducts as $product): ?>
            <a href="product.php?id=<?php echo $product['product_id']; ?>" class="product-card">
                <div class='product-img'>
                    <img src="images/products/<?php echo htmlspecialchars($product['photo']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" loading="lazy">
                </div>
                <div class='product-info'>
                    <p><?php echo htmlspecialchars($product['name']); ?></p>
                    <span>$<?php echo number_format($product['price'], 2); ?></span>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<section class="promo">
    <h2>Don't Miss Out!</h2>
    <div class="promo-banner">Big Sale Banner</div>
</section>

<section class="testimonials">
    <h3>What Our Customers Say</h3>
    <div class="testimonial-grid">
        <div class="testimonial-card">
            <div class="customer-profile">
                <div class="profile-image">P</div>
                <div>
                    <h4>Peter Smith</h4>
                    <div class="customer-role">Customer</div>
                </div>
            </div>
            <p class="testimonial-text">Amazing products and fast delivery! Will definitely shop again.</p>
            <div class="rating">★★★★★</div>
        </div>
        <div class="testimonial-card">
            <div class="customer-profile">
                <div class="profile-image">S</div>
                <div>
                    <h4>Sarah Johnson</h4>
                    <div class="customer-role">Customer</div>
                </div>
            </div>
            <p class="testimonial-text">Best electronics store I've ever shopped at. Great prices!</p>
            <div class="rating">★★★★★</div>
        </div>
        <div class="testimonial-card">
            <div class="customer-profile">
                <div class="profile-image">M</div>
                <div>
                    <h4>Mike Brown</h4>
                    <div class="customer-role">Customer</div>
                </div>
            </div>
            <p class="testimonial-text">Excellent customer service and quality products.</p>
            <div class="rating">★★★★☆</div>
        </div>
        <div class="testimonial-card">
            <div class="customer-profile">
                <div class="profile-image">L</div>
                <div>
                    <h4>Lisa Davis</h4>
                    <div class="customer-role">Customer</div>
                </div>
            </div>
            <p class="testimonial-text">Quick shipping and everything works perfectly!</p>
            <div class="rating">★★★★★</div>
        </div>
    </div>
</section>

<section class="newsletter newsletter-site">
  <div class="newsletter-card">
    <h3>Subscribe to our Newsletter</h3>
    <p>Stay up to date with the latest deals and new arrivals. Enter your email below to subscribe to our newsletter.</p>
    <form class="newsletter-form">
      <input type="email" placeholder="Enter your email" required>
      <button type="submit">Subscribe</button>
    </form>
  </div>
</section>
</main>

<?php include 'includes/footer.php'; ?>
</body>
</html>
