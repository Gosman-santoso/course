<?php include_once "component/navbar.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once "component/head.php" ?>
  <title>Authenticated need</title>
  <style>
    .section {
      min-height: 90vh;
    }

    .section-inside {
      width: 90%;
      margin: auto;
    }

    .hero-img {
      max-width: 40em;
    }

    .section h1 {
      margin-bottom: 1em;
      font-size: 3rem;
      color: #f67d48;
    }

    .section p {
      font-size: 24px;
    }

    a {
      margin: 0 1rem;
      padding: 0.5rem 1rem;
    }

    .border-button {
      border: 1px solid #25bb8d;
      border-radius: 3px;
      transition: 0.2s;
    }

    .btn-login:hover {
      background: #25bb8d;
      color: white;
    }
  </style>
</head>

<body>
  <div class="section d-flex align-items-center">
    <div class="section-inside">
      <div class="row">
        <img src="public/img/warning.jpg" alt="hero-img" class="col-12 col-md-6 col-lg-6 hero-img">
        <div class="d-flex flex-column justify-content-center col-12 col-md-6 col-lg-6">
          <h1>Wops...</h1>
          <p style="margin-bottom: 5px;">Looks like you haven't logged in</p>
          <p>Click below to access content</p>
          <div class="d-flex" style="margin-top: 10px;">
            <a href="login.php" style="margin: 0;" class="color-primary text-decoration-none border-button btn-login">Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php include_once "component/footer.php" ?>