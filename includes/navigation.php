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
            <div class="nav-icons" id="navIcons" style="display: none;">
                <a href="cart.php" aria-label="Cart"><i class="fas fa-shopping-cart"></i></a>
                <div class="user-dropdown">
                    <a href="#" class="user-icon" aria-label="User Account"><i class="fas fa-user"></i></a>
                    <div class="dropdown-menu">
                        <a href="account.php"><i class="fas fa-cog"></i> Account Settings</a>
                        <a href="#" id="logoutButton"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                    </div>
                </div>
            </div>
            <button id="authButton" class="auth-button">Sign In / Sign Up</button>
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
        <div class="nav-icons" id="mobileNavIcons" style="display: none;">
            <a href="cart.php" aria-label="Cart"><i class="fas fa-shopping-cart"></i></a>
            <div class="user-dropdown">
                <a href="#" class="user-icon" aria-label="User Account"><i class="fas fa-user"></i></a>
                <div class="dropdown-menu">
                    <a href="account.php"><i class="fas fa-cog"></i> Account Settings</a>
                    <a href="#" id="mobileLogoutButton"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                </div>
            </div>
        </div>
        <button id="mobileAuthButton" class="auth-button">Sign In / Sign Up</button>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="nav-overlay" id="navOverlay"></div>

    <!-- Authentication Modal -->
    <div id="authModal" class="auth-modal">
        <div class="auth-modal-content">
            <span class="close-modal">&times;</span>
            <div class="auth-tabs">
                <button class="auth-tab active" id="signInTab">Sign In</button>
                <button class="auth-tab" id="signUpTab">Sign Up</button>
            </div>
            
            <form id="signInForm" class="auth-form active">
                <div class="form-group">
                    <label for="signInEmail">Email</label>
                    <input type="email" id="signInEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="signInPassword">Password</label>
                    <input type="password" id="signInPassword" name="password" required>
                </div>
                <button type="submit" class="auth-submit">Sign In</button>
            </form>

            <form id="signUpForm" class="auth-form">
                <div class="form-group">
                    <label for="signUpName">Name</label>
                    <input type="text" id="signUpName" name="name" required>
                </div>
                <div class="form-group">
                    <label for="signUpEmail">Email</label>
                    <input type="email" id="signUpEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="signUpPassword">Password</label>
                    <input type="password" id="signUpPassword" name="password" required>
                </div>
                <button type="submit" class="auth-submit">Sign Up</button>
            </form>
        </div>
    </div>
</header>

<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- Include Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Include auth styles -->
<link rel="stylesheet" href="css/auth.css">
<!-- Include auth scripts -->
<script src="js/auth.js"></script>
