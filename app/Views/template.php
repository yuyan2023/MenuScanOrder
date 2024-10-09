<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Luis cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container">
              <a class="navbar-brand" href="#"><i class="bi bi-award-fill"></i>Luis cafe</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav nav-pills ms-auto">
    <li class="nav-item">
        <a class="nav-link <?= service('router')->getMatchedRoute()[0] == '/' ? 'active' : ''; ?>" href="<?= base_url(); ?>">Home</a>
    </li>
   <li class="nav-item">
                <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'menu' ? 'active' : ''; ?>" href="<?= base_url("menu"); ?>">Menu</a>
            </li>
    <li class="nav-item">
        <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'feedback' ? 'active' : ''; ?>" href="<?= base_url("feedback"); ?>">Feedback</a>
    </li>
    
    <?php if (session()->get('isLoggedIn')): ?>
        <li class="nav-item">
            <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'orders' ? 'active' : ''; ?>" href="<?= base_url("admin/orders"); ?>">Orders</a>
        </li>
        <?php if (session()->get('isAdmin')): ?>
            <li class="nav-item">
                <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'qr' ? 'active' : ''; ?>" href="<?= base_url("admin/qr"); ?>">QR</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'admin' ? 'active' : ''; ?>" href="<?= base_url("admin"); ?>">Admin Panel</a>
            </li>
           
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("logout"); ?>">Logout</a>
        </li>
    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'login' ? 'active' : ''; ?>" href="<?= base_url("login"); ?>">Login</a>
        </li>
    <?php endif; ?>
</ul>
              </div>
          </div>
      </nav>
  </header>

  <main>
    <?= $this->renderSection('content') ?>
  </main>

  <footer class="bg-dark text-light py-4">
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <p>&copy; <?= date('Y') ?> Menuscanorder. All rights reserved.</p>
              </div>
              <div class="col-md-6 text-md-end">
                  <a href="#" class="text-light me-3">Privacy Policy</a>
                  <a href="#" class="text-light">Terms of Service</a>
              </div>
          </div>
      </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
