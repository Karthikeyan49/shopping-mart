<?php
if (session::isset("session_token")) {
    if (usersession::authorize(session::get("session_token"))) {
?>
        <script>
            window.location = "./"
        </script>

        <?php
    } else {
?>

<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand">V-Mart</a>
    </div>
</nav>

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="login-box">
        <h3>Sign Up</h3>
        <form id="registration-form" method="post" action="login.php">

            <label for="name">Name</label>
            <input name="username" type="text" id="name" placeholder="Enter your name" required>
            <br>

            <label for="phone">Phone Number</label>
            <input name="phone" type="tel" id="phone" placeholder="Enter your phone number" required>
            <br>

            <label for="email">Email address</label>
            <input name="email" type="email" id="email" placeholder="Enter your email" required>
            <br>

            <label for="password">Password</label>
            <input name="pass" type="password" id="password" placeholder="Enter your password" required>
            <input type="checkbox" onclick="togglePassword('password')"> Show Password
            <br><br>

            <label for="confirm-password">Confirm Password</label>
            <input name="conpass" type="password" id="confirm-password" placeholder="Re-enter your password" required>
            <input type="checkbox" onclick="togglePassword('confirm-password')"> Show Password
            <br><br>

            <button type="submit">Create Account</button>
            <p id="error-message" class="error-message">Passwords do not match!</p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
<?php

    }
}
?>