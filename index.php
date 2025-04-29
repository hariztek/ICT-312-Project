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
<header>
    <div class="container header-content">
        <h1 class="logo">ZapCart</h1>
        <div class="hamburger" id="hamburger"><i class="fas fa-bars"></i></div>
        <nav id="mobile-nav">
            <ul class="nav-links">
                <li>Home</li>
                <li>Products</li>
                <li>Deals</li>
                <li>About</li>
                <li>Contact</li>
                <li class="mobile-icons">
                    <span><i class="fas fa-search"></i></span>
                    <span><i class="fas fa-user"></i></span>
                    <span><i class="fas fa-shopping-cart"></i></span>
                </li>
            </ul>
        </nav>
    </div>
</header>

<main>
<section class="hero">
    <h2>Explore Our Products</h2>
    <div class="main-banner">Main Banner</div>
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
        <?php
        $products = [
            ["iPhone 13", "$799"],
            ["Samsung Galaxy S21", "$649"],
            ["MacBook Pro", "$1299"],
            ["Sony WH-1000XM4", "$349"],
            ["Google Pixel 6", "$579"],
            ["Amazon Echo Dot", "$49"],
            ["Fitbit Charge 5", "$179"],
            ["Nintendo Switch", "$299"]
        ];
        foreach ($products as $product) {
            echo "<div class='product-card'>
                    <div class='product-img'></div>
                    <div class='product-info'>
                        <p>{$product[0]}</p>
                        <span>{$product[1]}</span>
                    </div>
                  </div>";
        }
        ?>
    </div>
    <div class="pagination">1 2 3 4 5 <i class="fas fa-angle-right"></i></div>
</section>

<section class="promo">
    <h2>Don't Miss Out!</h2>
    <div class="promo-banner">Big Sale Banner</div>
</section>

<section class="testimonials">
    <h3>What Our Customers Say</h3>
    <div class="testimonial-tags">
        <span><i class="far fa-smile"></i> HappyCustomer</span>
        <span><i class="fas fa-bullseye"></i> SatisfiedClient</span>
        <span><i class="fas fa-handshake"></i> TrustedBuyer</span>
        <span><i class="fas fa-mobile-alt"></i> LoyalUser</span>
        <span><i class="fas fa-life-ring"></i> FrequentShopper</span>
        <span><i class="fas fa-redo"></i> RepeatCustomer</span>
        <span><i class="fas fa-star"></i> ValuedMember</span>
        <span><i class="fas fa-user"></i> JohnDoe</span>
    </div>
</section>

<section class="newsletter">
    <h3>Stay Updated</h3>
    <input type="email" placeholder="Enter your email">
    <button>Subscribe</button>
    <div class="socials">
        <i class="fas fa-broadcast-tower"></i>
        <i class="fas fa-camera"></i>
        <i class="fas fa-snowflake"></i>
    </div>
</section>
</main>

<footer>
    <div class="footer-grid">
        <div>© ZapCart</div>
        <div>Links</div>
        <div>Contact</div>
        <div><button>Sign Up</button></div>
    </div>
</footer>

<script src="js/script.js"></script>
</body>
</html>
