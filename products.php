<?php
require_once 'includes/db_connect.php';

// Get category ID from URL parameter
$categoryId = isset($_GET['category']) ? (int)$_GET['category'] : null;

// Get all categories
$categories = getCategories($conn);

// Get products for selected category
$products = $categoryId ? getProductsByCategory($conn, $categoryId) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products | ZapCart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/products.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/navigation.php'; ?>

<!-- Products Banner -->
<div class="products-banner">
    <div class="banner-content">
        <div class="hero-content">
            <h1>Our Products</h1>
            <p>Discover our wide range of high-quality products</p>
        </div>
    </div>
</div>

<main class="products-page">
    <!-- Categories Section -->
    <section class="categories-section">
        <h2>Browse Categories</h2>
        <div class="categories-grid">
            <?php foreach ($categories as $category): ?>
                <a href="?category=<?php echo $category['id']; ?>"
                   class="category-card <?php echo $categoryId == $category['id'] ? 'active' : ''; ?>" tabindex="0">
                    <i class="fas <?php echo $category['icon']; ?>" aria-hidden="true"></i>
                    <span><?php echo htmlspecialchars($category['name']); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section">
        <?php if ($categoryId): ?>
            <div class="section-header">
                <h2><?php echo htmlspecialchars($categories[$categoryId - 1]['name']); ?></h2>
                <div class="products-count">
                    <?php echo count($products); ?> Products
                </div>
            </div>
            <div class="products-grid">
                <?php foreach ($products as $product): ?>
                    <a href="product.php?id=<?php echo $product['id']; ?>" class="product-card">
                        <div class="product-image">
                            <img src="images/products/<?php echo htmlspecialchars($product['image']); ?>"
                                 alt="<?php echo htmlspecialchars($product['name']); ?>"
                                 loading="lazy">
                        </div>
                        <div class="product-info">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
                            <p class="description"><?php echo htmlspecialchars($product['description']); ?></p>
                            <div class="product-actions">
                                <button class="view-details" tabindex="0">
                                    View Details <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-category-selected">
                <i class="fas fa-th-large"></i>
                <h2>Select a Category</h2>
                <p>Please select a category from the list above to view products.</p>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

<script>
// Prevent reloading if clicking the already active category
const categoryLinks = document.querySelectorAll('.category-card');
categoryLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        if (link.classList.contains('active')) {
            e.preventDefault();
        }
    });
});
</script>
</body>
</html> 