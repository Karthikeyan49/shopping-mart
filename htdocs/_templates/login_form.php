<nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <a class="navbar-brand">V-Mart</a>
        </div>
      </nav>

      <div class="d-flex justify-content-center align-items-center min-vh-100"> <div class="login-box">
      <h3>Login</h3>
      <form method="post" action="login.php">
          <label for="email">Email address</label>
          <input name="email" type="email" id="email" placeholder="Enter email" required>
          <small>We'll never share your email with anyone else.</small>
          <br><br>
          <label for="password">Password</label>
          <input name="pass" type="password" id="password" placeholder="Enter your password" required>
          <input type="checkbox" onclick="togglePassword('password')"> Show Password
          <br><br>
          <a href="signup.php">New User ?</a>
          <br><br>
          <button type="submit">Login</button>
      </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="./js/script.js"></script>