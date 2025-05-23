<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us | ZapCart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/navigation.php'; ?>

<main>
    <!-- Contact Hero Section -->
    <div class="contact-hero-container">
        <section class="contact-hero">
            <div class="hero-content">
                <h1>Contact Us</h1>
                <p>We're here to help and answer any questions you might have</p>
            </div>
        </section>
    </div>

    <!-- Contact Info Cards -->
    <section class="contact-cards-section">
        <div class="contact-cards">
            <div class="contact-card">
                <div class="icon-circle"><i class="fas fa-phone"></i></div>
                <h3>Phone</h3>
                <p class="contact-detail">+1 (555) 123-4567</p>
                <p class="contact-note">Mon-Fri: 9:00 AM - 6:00 PM</p>
            </div>
            <div class="contact-card">
                <div class="icon-circle"><i class="fas fa-envelope"></i></div>
                <h3>Email</h3>
                <p class="contact-detail">support@zapcart.com</p>
                <p class="contact-note">We'll respond within 24 hours</p>
            </div>
            <div class="contact-card">
                <div class="icon-circle"><i class="fas fa-map-marker-alt"></i></div>
                <h3>Address</h3>
                <p class="contact-detail">123 Tech Street</p>
                <p class="contact-note">Silicon Valley, CA 94025</p>
            </div>
        </div>
    </section>

    <!-- Contact Form Card -->
    <section class="contact-form-section">
        <div class="contact-form-card">
            <h2>Send us a Message</h2>
            <form class="contact-form" action="process_contact.php" method="POST">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-cards">
            <div class="faq-card">
                <div class="faq-icon"><i class="fas fa-clock"></i></div>
                <div>
                    <div class="faq-q">What are your business hours?</div>
                    <div class="faq-a">Our customer service team is available Monday through Friday, 9:00 AM to 6:00 PM PST.</div>
                </div>
            </div>
            <div class="faq-card">
                <div class="faq-icon"><i class="fas fa-box"></i></div>
                <div>
                    <div class="faq-q">How can I track my order?</div>
                    <div class="faq-a">You can track your order by logging into your account and visiting the "My Orders" section.</div>
                </div>
            </div>
            <div class="faq-card">
                <div class="faq-icon"><i class="fas fa-undo"></i></div>
                <div>
                    <div class="faq-q">What is your return policy?</div>
                    <div class="faq-a">We offer a 30-day return policy for most items. Please visit our Returns page for more details.</div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
</body>
</html> 