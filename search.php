<?php
require "connect.php";
include_once('component/navbar.php');

$title = $_GET["search"];
$query = "SELECT * from course WHERE title LIKE '%$title%' ";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('component/head.php'); ?>
  <title>Search - <?= $title ?></title>
</head>

<body>

  <div class="course-section" style="margin-top: 7em">
    <div class="course">
      <h2 class="lengthLg1 text-capitalize">Keyword : <?= $title ?> </h2>

      <div class="row">
        <?php
        if (!$row = mysqli_fetch_array($result)) {
        ?>
          <img src="public/img/404.jpg" alt="404" style="max-width: 40em; margin: auto;">
          <?php
        } else {
          while ($row = mysqli_fetch_array($result)) : ?>
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
        <?php endwhile;
        } ?>

      </div>
    </div>
  </div>

  <!-- script -->
  <?php include_once('component/script.php'); ?>
</body>

</html>
<?php include_once('component/footer.php'); ?>