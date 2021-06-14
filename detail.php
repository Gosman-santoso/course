<?php
require "connect.php";
include_once('component/navbar.php');


$title = $_GET["id"];
$query = "SELECT * from course WHERE id=$title";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);

$adminId = $row["admin_id"];
$queryAdmin = "SELECT * FROM admin WHERE admin_id='$adminId' ";
$resultAdmin = mysqli_query($connect, $queryAdmin);
$rowAdmin = mysqli_fetch_array($resultAdmin);

if (!isset($_SESSION["login"]) && $row['status'] == 1) {
  header("Location: authentication.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('component/head.php'); ?>
  <title>Detail</title>

</head>

<body>

  <div class="detail-section">
    <div class="detail row" style="margin-top: 7em">
      <div class="col-12 col-md-8 col-lg-8">
        <div class="d-flex align-items-center" style="margin-bottom: 1rem">
          <img src="public/img/photo/<?= $rowAdmin["photo"] ?>" alt="photo" width="25" height="25" style="margin-right: 0.5rem">
          <p class="text-capitalize"><?= $rowAdmin["username"] ?></p>
          <p style="color: lightgray; font-size: 0.8rem; margin-left: 0.3rem; color: #4c4c4c;"> | <?= $row["post_date"] ?></p>
        </div>
        <h1 style="margin-bottom: 1rem">Ini detail <?= $title ?></h1>
        <div class="img-container d-flex align-items-center" style="max-width: 100%; margin-bottom: 3em; border-radius: 10px; overflow: hidden;">
          <img src="public/img/thumbnail/<?= $row["cover"] ?>" alt="thumbnail" style="width: 100%;">
        </div>

        <?php if (!empty($message)) { ?>
          <p><?php echo $message ?></p>
        <?php } ?>

        <div class="content" style="margin-bottom: 3em;">

          <h4>Description</h4>
          <p style="line-height: 26px; word-spacing: 3px; font-size: 16px"><?= $row["description"]; ?></p>
        </div>

      </div>
      <div class="col-12 col-md-4 col-md-4">
        <div class="row">
          <h5>Ads</h5>
        </div>
      </div>
    </div>
  </div>

  <!-- script -->
  <?php include_once('component/script.php'); ?>

</body>

</html>
<?php include_once('component/footer.php'); ?>