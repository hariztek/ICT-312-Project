document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const authModal = document.getElementById('authModal');
    const signInTab = document.getElementById('signInTab');
    const signUpTab = document.getElementById('signUpTab');
    const signInForm = document.getElementById('signInForm');
    const signUpForm = document.getElementById('signUpForm');
    const closeModal = document.querySelector('.close-modal');
    const authButton = document.getElementById('authButton');
    const navIcons = document.getElementById('navIcons');
    const logoutButton = document.getElementById('logoutButton');
    const mobileLogoutButton = document.getElementById('mobileLogoutButton');
    const mobileNavIcons = document.getElementById('mobileNavIcons');

    // Show modal
    authButton.addEventListener('click', () => {
        authModal.style.display = 'block';
    });

    // Close modal
    closeModal.addEventListener('click', () => {
        authModal.style.display = 'none';
    });

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === authModal) {
            authModal.style.display = 'none';
        }
    });

    // Tab switching
    signInTab.addEventListener('click', () => {
        signInTab.classList.add('active');
        signUpTab.classList.remove('active');
        signInForm.classList.add('active');
        signUpForm.classList.remove('active');
    });

    signUpTab.addEventListener('click', () => {
        signUpTab.classList.add('active');
        signInTab.classList.remove('active');
        signUpForm.classList.add('active');
        signInForm.classList.remove('active');
    });

    // Form submissions
    signInForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const email = signInForm.querySelector('input[name="email"]').value;
        const password = signInForm.querySelector('input[name="password"]').value;

        try {
            // Mock API call - replace with actual API endpoint
            const response = await mockSignIn(email, password);
            if (response.success) {
                handleSuccessfulAuth(response.user);
            } else {
                showError(signInForm, response.message);
            }
        } catch (error) {
            showError(signInForm, 'An error occurred. Please try again.');
        }
    });

    signUpForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const name = signUpForm.querySelector('input[name="name"]').value;
        const email = signUpForm.querySelector('input[name="email"]').value;
        const password = signUpForm.querySelector('input[name="password"]').value;

        try {
            // Mock API call - replace with actual API endpoint
            const response = await mockSignUp(name, email, password);
            if (response.success) {
                handleSuccessfulAuth(response.user);
            } else {
                showError(signUpForm, response.message);
            }
        } catch (error) {
            showError(signUpForm, 'An error occurred. Please try again.');
        }
    });

    // Logout functionality
    async function handleLogout() {
        try {
            const response = await fetch('logout.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            });

            const data = await response.json();
            if (data.success) {
                // Clear localStorage
                localStorage.removeItem('user');
                
                // Update UI
                authButton.style.display = 'block';
                navIcons.style.display = 'none';
                if (mobileNavIcons) {
                    mobileNavIcons.style.display = 'none';
                }
                
                // Redirect to home page
                window.location.href = 'index.php';
            }
        } catch (error) {
            console.error('Logout failed:', error);
        }
    }

    // Add logout event listeners
    if (logoutButton) {
        logoutButton.addEventListener('click', (e) => {
            e.preventDefault();
            handleLogout();
        });
    }

    if (mobileLogoutButton) {
        mobileLogoutButton.addEventListener('click', (e) => {
            e.preventDefault();
            handleLogout();
        });
    }

    // Helper functions
    function showError(form, message) {
        let errorDiv = form.querySelector('.auth-error');
        if (!errorDiv) {
            errorDiv = document.createElement('div');
            errorDiv.className = 'auth-error';
            form.appendChild(errorDiv);
        }
        errorDiv.textContent = message;
    }

    function handleSuccessfulAuth(user) {
        // Store user data in localStorage
        localStorage.setItem('user', JSON.stringify(user));
        
        // Update UI
        authButton.style.display = 'none';
        navIcons.style.display = 'flex';
        if (mobileNavIcons) {
            mobileNavIcons.style.display = 'flex';
        }
        
        // Close modal
        authModal.style.display = 'none';
    }

    // Mock API functions
    async function mockSignIn(email, password) {
        // Simulate API delay
        await new Promise(resolve => setTimeout(resolve, 1000));

        // Mock validation
        if (email === 'test@example.com' && password === 'password') {
            return {
                success: true,
                user: {
                    id: 1,
                    name: 'Test User',
                    email: email
                }
            };
        }
        return {
            success: false,
            message: 'Invalid email or password'
        };
    }

    async function mockSignUp(name, email, password) {
        // Simulate API delay
        await new Promise(resolve => setTimeout(resolve, 1000));

        // Mock validation
        if (email && password && name) {
            return {
                success: true,
                user: {
                    id: 1,
                    name: name,
                    email: email
                }
            };
        }
        return {
            success: false,
            message: 'Please fill in all fields'
        };
    }

    // Check for existing session
    function checkAuthStatus() {
        const user = JSON.parse(localStorage.getItem('user'));
        if (user) {
            authButton.style.display = 'none';
            navIcons.style.display = 'flex';
            if (mobileNavIcons) {
                mobileNavIcons.style.display = 'flex';
            }
        } else {
            authButton.style.display = 'block';
            navIcons.style.display = 'none';
            if (mobileNavIcons) {
                mobileNavIcons.style.display = 'none';
            }
        }
    }

    // Initial auth status check
    checkAuthStatus();
}); 