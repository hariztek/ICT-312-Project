<?php
// Navigation bar component
?>
<header>
    <div class="container header-content">
        <h1 class="logo"><a href="index.php">ZapCart</a></h1>
        
        <!-- Desktop Navigation -->
        <nav class="desktop-nav">
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="deals.php">Deals</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="nav-icons">
                <a href="search.php" aria-label="Search"><i class="fas fa-search"></i></a>
                <a href="account.php" aria-label="Account"><i class="fas fa-user"></i></a>
                <a href="cart.php" aria-label="Cart"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </nav>

        <!-- Mobile Menu Button -->
        <button class="hamburger" id="hamburger" aria-label="Toggle Menu">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Navigation -->
    <nav class="mobile-nav" id="mobile-nav">
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="deals.php">Deals</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="nav-icons">
            <a href="search.php" aria-label="Search"><i class="fas fa-search"></i></a>
            <a href="account.php" aria-label="Account"><i class="fas fa-user"></i></a>
            <a href="cart.php" aria-label="Cart"><i class="fas fa-shopping-cart"></i></a>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="nav-overlay" id="navOverlay"></div>
</header>
