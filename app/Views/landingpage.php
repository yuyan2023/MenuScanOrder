<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5 bg-light">
  <div class="container text-center">
    <div class="row">
      <div class="col-lg-6">
       
        <figure class="mt-5">
  <blockquote class="blockquote">
    <h1><em>Welcome to Luis Cafe</em></h1>
  </blockquote>
  <figcaption class="blockquote-footer">
    the best cafe in <cite title="Source Title">Brisbane</cite>
  </figcaption>
</figure>
        <p class="lead mt-5">Click to order!</p>
        <a href="<?= base_url("menu"); ?>" class="btn btn-primary btn-lg mb-3 mb-lg-0">Menu</a>
      </div>
      <div class="col-lg-6">
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?= base_url('images/pic3.jpg'); ?>" alt="buiness">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('images/pic1.jpg'); ?>" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('images/hamburger.jpg'); ?>" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  /* Custom styles to change the color of carousel controls */
  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    filter: invert(100%); /* Invert the color of the icons to dark */
  }

.carousel-item img {
    width: 100%; /* Ensures the image takes full width of the carousel */
}
.card {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.card:hover {
    transform: scale(1.03); /* Slightly enlarges the card */
    box-shadow: 0 8px 16px rgba(0,0,0,0.2); /* Adds shadow around the card */
}

</style>

      </section>

      <section class="py-5">
          <div class="container">
              <h2 class="text-center mb-4">Hot foods</h2>
              <div class="row">
                  <div class="col-lg-4 mb-4">
                      <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">steak</h4>
                              <p class="card-text">100% Australia beef</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 mb-4">
                      <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">hamburger</h4>
                              <p class="card-text">with fresh vegetables and fried chicken</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 mb-4">
                      <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">Long black</h4>
                              <p class="card-text">Authentic american style</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Brownies</h4>
                            <p class="card-text">the best brownie in town</p>
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </section>
 
<?= $this->endSection() ?>