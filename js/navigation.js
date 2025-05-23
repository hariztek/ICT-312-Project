document.addEventListener('DOMContentLoaded', function() {
    console.log('Navigation script loaded');
    const hamburger = document.getElementById('hamburger');
    const nav = document.getElementById('mobile-nav');
    const overlay = document.getElementById('navOverlay');
    const body = document.body;

    console.log('Elements found:', { hamburger, nav, overlay });

    // Toggle mobile menu
    function toggleMenu() {
        console.log('Toggle menu called');
        nav.classList.toggle('active');
        overlay.classList.toggle('active');
        body.style.overflow = nav.classList.contains('active') ? 'hidden' : '';
    }

    // Event listeners
    hamburger.addEventListener('click', (e) => {
        console.log('Hamburger clicked');
        toggleMenu();
    });
    overlay.addEventListener('click', (e) => {
        console.log('Overlay clicked');
        toggleMenu();
    });

    // Close menu when clicking a link
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            if (nav.classList.contains('active')) {
                toggleMenu();
            }
        });
    });

    // Close menu on window resize if open
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768 && nav.classList.contains('active')) {
            toggleMenu();
        }
    });
}); 