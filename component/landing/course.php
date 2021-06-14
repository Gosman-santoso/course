<?php
include "connect.php";

// pilih kursus database dengan status 1
// status 1 artinya user harus login terlebih dahulu
// status 0 tidak perlu login
// urut berdasarkan tanggal yang paling baru
// limit data sampai 6

$query = "SELECT * FROM `course` WHERE status = 1 ORDER BY `course`.`post_date` DESC LIMIT 0,6";

$data = mysqli_query($connect, $query) or die(mysqli_error($connect));

?>

<div class="course-section">
  <div class="course">
    <h1 class="lengthLg1">See our course - <p style="color: #25bb8d; display: inline-block; font-size: 22px">Need login</p>
    </h1>
    <p class="lengthMd1 text-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem nulla cum voluptate optio assumenda voluptatum libero voluptatem nemo sit cupiditate.</p>

    <div class="row">

      <!-- menampilkan kursus yang mengharuskan login -->
      <?php while ($row = mysqli_fetch_array($data)) : ?>
        <div class="col-6 col-md-4 col-lg-4 card">
          <div class="card-image">
            <img src="public/img/thumbnail/<?= $row["cover"] ?>" alt="cover">
          </div>
          <p class="tag text-capitalize cursor-pointer"><a href="categories.php?name=<?= $row['course_id'] ?>" class="text-decoration-none"><?= $row['course_id'] ?></a></p>
          <h5 class="lengthMd1 text-capitalize text-overflow dot-2 title"><a href="detail.php?title=<?= strtolower($row["title"]); ?>&id=<?= $row["id"] ?>" class="text-decoration-none cursor-pointer" style="color: rgb(24, 24, 24);"><?= $row["title"] ?></a></h5>
          <p class="lengthSm3 text-capitalize status">Online class</p>
          <div class="seperate d-flex justify-content-between align-items-center">
            <div class="rating d-flex">
              <?php for ($i = 1; $i <= 5; $i++) : ?>
                <i class="fas fa-star"></i>
              <?php endfor; ?>
            </div>
            <a href="detail.php?title=<?= strtolower($row["title"]); ?>&id=<?= $row["id"] ?>">
              <i class="fas fa-chevron-circle-right"></i>
            </a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <!-- <a href="viewall.php" class="text-decoration-none">
      <div class="d-flex flex-column align-items-center">
        <p style="text-align: center; color: #25bb8d;">View All</p>
        <i class="fas fa-chevron-down" style="text-align: center; color: #25bb8d; font-size: 30px;"></i>
      </div>
    </a> -->
  </div>
</div>