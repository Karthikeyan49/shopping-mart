// Select the form and input fields
const form = document.getElementById('registration-form');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirm-password');
const errorMessage = document.getElementById('error-message');

// Add a submit event listener to the form
form.addEventListener('submit', function(event) {
    // Check if passwords match
    if (password.value !== confirmPassword.value) {
        event.preventDefault(); // Prevent form submission
        errorMessage.style.display = 'block'; // Show error message
    } else {
        errorMessage.style.display = 'none'; // Hide error message
    }
});

  function togglePassword(fieldId) {
    var field = document.getElementById(fieldId);
    if (field.type === "password") {
        field.type = "text";
    } else {
        field.type = "password";
    }
}
