<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">V-Mart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php
        if (session::isset("session_token")) {
          if (usersession::authorize(session::get("session_token"))) {
            $usr = usersession::getUsername($_SESSION['session_token']);
            if ($usr) {
              echo '<label for="name"> Hi, ' . $usr . '</label>';
            } else {
              session::unset();
              session::destroy();
              session::start();
              echo '<a class="nav-link" href="login.php">Login</a>';
              echo '<a class="nav-link" href="signup.php">Sign-up</a>';
            }
          } else {
            session::unset();
            session::destroy();
            session::start();
            echo '<a class="nav-link" href="login.php">Login</a>';
            echo '<a class="nav-link" href="signup.php">Sign-up</a>';
          }
        } else {
          echo '<a class="nav-link" href="login.php">Login</a>';
          echo '<a class="nav-link" href="signup.php">Sign-up</a>';
        }
        ?>
      </div>
    </div>
  </div>
</nav>

<!--Bg Image-->
<section id="bg-image">
  <div class="background-image">
    <h1>V-Mart</h1>
    <h2> Your Essentials, Delivered with Care and Savings!</h2>

    <p>At V-Mart, we bring you the freshest grocery essentials, dry fruits, and quality spices at unbeatable
      wholesale prices. Whether it’s daily needs or bulk orders, we ensure affordability without compromising on quality.
      Experience convenience, savings, and trust with our reliable delivery services, tailored to simplify your life.</p>
  </div>
</section>

<!--Footer-->
<section id="footer" class="footer-background">
  <div class="container">
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 mt-5 border-top">
      <div class="col mb-3">
        <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>
        <p class="text-body-secondary">© V-Mart</p>
      </div>

      <div class="col mb-3">

      </div>

      <div class="col mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div>

      <div class="col mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div>

      <div class="col mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div>
    </footer>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>