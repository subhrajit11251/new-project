// JavaScript to handle redirection and any other client-side interactions

// Redirect to login page after successful registration
function redirectToLogin() {
    // Redirect to the login page after a successful registration
    window.location.href = "../login/login.php"; // Adjust the path as needed
}

// Add a function to handle form submission (if required)
document.addEventListener('DOMContentLoaded', function() {
    // If you want to automatically redirect after registration, you can call the redirectToLogin function
    // For example, after the user successfully submits the registration form, call:
    // redirectToLogin();

    // Optionally, you can handle form validation or other logic before submission

    // Example: Prevent form submission if a field is empty
    const form = document.querySelector('form'); // Select your form
    if (form) {
        form.addEventListener('submit', function(event) {
            const username = document.getElementById('username').value; // Get input value (example)
            const password = document.getElementById('password').value; // Get password field value

            if (!username || !password) {
                alert('Please fill in all the fields.');
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });
    }
});

// Example: Redirection after successful login
// If you want to handle login redirect, you can call this function
function redirectToDashboard(userRole) {
    if (userRole === 'admin') {
        window.location.href = "../admin_dashboard.php"; // Adjust path for admin dashboard
    } else {
        window.location.href = "../user_dashboard.php"; // Adjust path for user dashboard
    }
}

// Hero slider functionality
document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll('.hero img');
    let currentSlide = 0;

    if (slides.length > 0) {
        console.log("Slides detected:", slides.length);

        function showNextSlide() {
            slides[currentSlide].classList.remove('active'); // Hide the current slide
            currentSlide = (currentSlide + 1) % slides.length; // Move to the next slide
            slides[currentSlide].classList.add('active'); // Show the next slide
        }

        setInterval(showNextSlide, 5000); // Change slide every 5 seconds
    } else {
        console.error("No slides found! Check your .hero img elements.");
    }
});

