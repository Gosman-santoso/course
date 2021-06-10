<?php include "connect.php";
$query = "select * from course";
$data = mysqli_query($connect, $query);

if (!$data) {
  printf("Error", mysqli_error($connect));
  exit();
}
?>

<div class="course-section">
  <div class="course">
    <h1 class="lengthLg1">Our Popular Course</h1>
    <p class="lengthMd1 text-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus eveniet hic suscipit obcaecati praesentium natus!</p>

    <div class="row">
      <?php while ($row = mysqli_fetch_array($data)) : ?>
        <div class="col-6 col-md-4 col-lg-4 card">
          <div class="card-image">
            <img src="public/img/thumbnail/<?= $row["cover"] ?>" alt="cover">
          </div>
          <p class="tag">Education</p>
          <h5 class="lengthMd1 text-capitalize text-overflow dot-2 title"><?= $row["title"] ?></h5>
          <p class="lengthSm3 text-capitalize status">Online class</p>
          <div class="seperate d-flex justify-content-between align-items-center">
            <div class="rating d-flex">
              <?php for ($i = 1; $i <= 5; $i++) : ?>
                <i class="fas fa-star"></i>
              <?php endfor; ?>
            </div>
            <a href="">
              <i class="fas fa-chevron-circle-right"></i>
            </a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>