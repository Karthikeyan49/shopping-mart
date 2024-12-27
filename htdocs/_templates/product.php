<nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">V-Mart</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" href="#">Add members</a>
              <a class="nav-link" href="#">Cart</a>
              <a class="nav-link" href="#">Log out</a>
            </div>
          </div>
        </div>
      </nav>


    <div class="row row-cols-md-6 row-cols-sm-2">
    <?php
        $prod=new product();
        if($prod->data){
            foreach ($prod->data as $dt){
                echo <<<EOD
                    <div class="col">
                    <div class="card h-100">
                    EOD;
                echo '<img src="./assets/product/'.$dt['name'].'.jpg" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">'.$dt['name'].'</h5>';
                echo '<h6 class="price">₹'.$dt['price'].'/'.$dt['weight'].'g</h6>';       
                echo '<button type="button" class="btn btn-dark">Add to cart</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
      <section id="footer" class="footer-background">
        <div class="container">
          <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 mt-5 border-top">
            <div class="col mb-3">
              <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
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