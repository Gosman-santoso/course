<?php
$titles = [
  [
    "dashboard",
    "dashboard.php",
    "fa-home"
  ],
  [
    "user",
    "list-user.php",
    "fa-users"
  ],
  [
    "list course",
    "list-course.php",
    "fa-clipboard-list"
  ],
  [
    "admin",
    "list-admin.php",
    "fa-headset"
  ],
  [
    "logout",
    "logout.php",
    "fa-sign-out-alt"
  ]
];
?>

<div class="sidebar-section">
  <div class="sidebar d-flex flex-column">
    <div class="logo-container d-flex">
      <h1 class="col-6 col-md-4 col-lg-4 navbar-title d-flex align-items-center lengthMd3" style="color: white;"><span class="color-primary">Nama</span> Course</h1>
    </div>
    <div class="list-container d-flex justify-content-between flex-column">
      <?php foreach ($titles as $title) : ?>
        <a href="<?= $title[1] ?>" class="text-decoration-none">
          <div class="list d-flex align-items-center">
            <i class="fas <?= $title[2] ?>"></i>
            <p class="lengthMd1 text-capitalize"><?= $title[0] ?></p>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>