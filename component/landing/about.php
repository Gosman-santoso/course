<?php
$datas = [
  [
    "Learn with experts",
    "With exper instructor to make sure course really well",
    "fa-flask"
  ],
  [
    "Learn anything",
    "Whether you want to develop as a professional or new hobby",
    "fa-book-reader"
  ],
  [
    "Flexible learning",
    "You will grants acces to your course anytime",
    "fa-hourglass-half"
  ],
  [
    "Update course",
    "We are always updated with trends
      learning",
    "fa-history"
  ]
]
?>

<div class="about-section" id="about">
  <div class="about row">
    <div class="col-12 col-md-6 col-lg-6 d-flex flex-column">
      <h1 class="lengthLg1">
        Find out more about us co-learning Experiance
      </h1>
      <p class="lengthMd1 text-description">We believe everyone should have the opportunity to create progress through technolgy and develop the skills.</p>
      <div class="box-image d-flex align-items-center justify-content-center">
        <img src="public/img/close-up-student-reading-book.jpg" alt="">
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
      <div class="row">
        <?php foreach ($datas as $data) : ?>
          <div class="col-12 col-md-6 col-lg-6 d-flex flex-column justify-content-between card">
            <i class="fas <?= $data[2] ?> card-logo align-self-start"></i>
            <p class="lengthMd1 font-bold"><?= $data[0] ?></p>
            <p style="font-size: 0.8rem;"><?= $data[1] ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>