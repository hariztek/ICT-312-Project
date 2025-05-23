<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us | ZapCart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/navigation.php'; ?>

<main class="about-page">
    <!-- Hero Section -->
    <section class="about-hero">
        <div class="hero-content">
            <h1>About ZapCart</h1>
            <p>Your Trusted Electronics Partner</p>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section">
        <div class="section-container">
            <h2>Our Mission</h2>
            <p>At ZapCart, we're dedicated to providing high-quality electronics and exceptional customer service. Our goal is to make technology accessible to everyone while ensuring a seamless shopping experience.</p>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <h2>Our Core Values</h2>
        <div class="values-grid">
            <div class="value-card">
                <i class="fas fa-star"></i>
                <h3>Quality</h3>
                <p>We carefully select and verify every product to ensure the highest quality standards.</p>
            </div>
            <div class="value-card">
                <i class="fas fa-handshake"></i>
                <h3>Trust</h3>
                <p>Building lasting relationships with our customers through transparency and reliability.</p>
            </div>
            <div class="value-card">
                <i class="fas fa-bolt"></i>
                <h3>Innovation</h3>
                <p>Staying ahead of the curve with the latest technology and trends.</p>
            </div>
            <div class="value-card">
                <i class="fas fa-heart"></i>
                <h3>Customer First</h3>
                <p>Your satisfaction is our top priority, and we're here to help you every step of the way.</p>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <h2>Our Team</h2>
        <div class="team-grid">
            <div class="team-member">
                <div class="member-image">
                    <img src="images/team/ceo.jpg" alt="CEO" loading="lazy">
                </div>
                <h3>John Smith</h3>
                <p>CEO & Founder</p>
            </div>
            <div class="team-member">
                <div class="member-image">
                    <img src="images/team/cto.jpg" alt="CTO" loading="lazy">
                </div>
                <h3>Sarah Johnson</h3>
                <p>Chief Technology Officer</p>
            </div>
            <div class="team-member">
                <div class="member-image">
                    <img src="images/team/operations.jpg" alt="Operations Director" loading="lazy">
                </div>
                <h3>Michael Chen</h3>
                <p>Operations Director</p>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-grid">
            <div class="stat-card">
                <i class="fas fa-users"></i>
                <h3>10,000+</h3>
                <p>Happy Customers</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-box"></i>
                <h3>5,000+</h3>
                <p>Products Delivered</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-star"></i>
                <h3>4.8/5</h3>
                <p>Customer Rating</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-globe"></i>
                <h3>50+</h3>
                <p>Cities Served</p>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
</body>
</html> 