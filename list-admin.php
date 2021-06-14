<?php
require 'connect.php';
require "component/auth.php";
require "component/function.php";

$idadm = $_SESSION['id'];
$idAdmin = $_SESSION['admin_id'];

$query = "SELECT * FROM admin where id = $idadm ";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
$row = mysqli_fetch_array($result);

$queryCourse = "SELECT * FROM course WHERE admin_id = '$idAdmin' ORDER BY `course`.`course_id` ASC";
$result = mysqli_query($connect, $queryCourse) or die(mysqli_error($connect));

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $gmail = $_POST['gmail'];
  $gender = $_POST['gender'];
  $fotoLama = $_POST['fotoLama'];

  if ($_FILES['photo']['error'] === 4) {
    $foto = $fotoLama;
  } else {
    $foto = uploadUserAdmin($_FILES);
  }

  $query = "UPDATE admin SET username='$username', gmail='$gmail', gender='$gender', photo='$foto' where id='$idadm'";
  mysqli_query($connect, $query) or die(mysqli_error($query));
  echo "<script>alert('Berhasil edit data!');</script>";
  header("Refresh:0; url=list-admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "component/head.php" ?>
  <title>Profile Admin</title>
  <style>
    .form-hidden {
      display: none;
    }

    .form-hidden.active {
      display: block;
    }

    .card {
      height: 26em;
      -webkit-box-shadow: 0px 5px 15px -1px #e0e0e0;
      box-shadow: 0px 5px 15px -1px #e0e0e0;
      padding: 1.5rem;
      -webkit-transform: scale(0.85);
      transform: scale(0.85);
      position: relative;
    }

    .card h5 {
      line-height: 30px;
      word-spacing: 2px;
      -webkit-transition: 0.2s;
      transition: 0.2s;
    }

    .card h5:hover {
      background: #e0ffbd;
    }

    .card .status {
      color: #25bb8d;
      font-size: 0.9rem;
      -ms-flex-item-align: end;
      align-self: flex-end;
    }

    .card .card-image {
      width: 100%;
      height: 50%;
      overflow: hidden;
    }

    .card .card-image img {
      border-radius: 5px;
      width: 100%;
    }

    .card .seperate {
      width: 87%;
      margin: auto;
      margin-top: 1em;
      border-top: 2px solid #25bb8d;
      position: absolute;
      bottom: 2rem;
      right: 0;
      left: 0;
      padding-top: 10px;
    }

    .card .seperate .rating {
      width: 40%;
    }

    .card .seperate .rating i {
      font-size: 20px;
      color: orange;
      margin: 0 3px;
    }

    .card .seperate .fa-chevron-circle-right {
      font-size: 30px;
      color: #25bb8d;
    }
  </style>
</head>

<body>
  <div class="d-flex">
    <?php include_once('component/dashboard/sidebar.php'); ?>
    <div class="dashboard-layout">
      <h1>Profile Admin</h1>

      <!-- tulis disini -->
      <div class="w-100" style="border: 2px solid #25bb8d; margin-top: 2em; padding: 1em; border-radius: 5px; position: relative;">
        <div class="row" style="width: 70%; margin: auto;">
          <div class="col-6">
            <img src="public/img/photo/<?= $row['photo'] ?>" alt="profile" width="200">
          </div>
          <div class="col-6">
            <h2 style="margin-bottom: 1em;" class="text-capitalize"><?= $row['username'] ?></h2>
            <p>Admin Id</p>
            <p style="margin-bottom: 1em;"><b><?= $row['admin_id'] ?></b></p>
            <p>Gmail</p>
            <p style="margin-bottom: 1em;"><b><?= $row['username'] ?></b></p>
            <p>Gender</p>
            <p style="margin-bottom: 1em;"><b><?= $row['gender'] == 1 ? 'Male' : 'Female' ?></b></p>
          </div>
        </div>
      </div>
      <img id="editProfileAdmin" src="public/img/icons8_Edit_30px.png" alt="" style="position: absolute; top: 1em; right: 1em; cursor: pointer">

      <div class="w-100 form-hidden" style="border: 2px solid #25bb8d; margin-top: 2em; padding: 1em; border-radius: 5px; position: relative;">

        <form action="" method="post" enctype="multipart/form-data" class="row" style="width: 70%; margin: auto;">
          <div class="col-6">
            <img src="public/img/photo/<?= $row['photo'] ?>" alt="profile" width="200">
            <input type="file" name="photo">
            <input type="hidden" name="fotoLama" value="<?= $row['photo'] ?>"></td>
          </div>
          <div class="col-6">
            <p>Username</p>
            <input type="text" name="username" id="username" value="<?= $row['username'] ?>">
            <p>Gmail</p>
            <input type="gmail" name="gmail" id="gmail" value="<?= $row['gmail'] ?>">
            <p>Gender</p>
            <select name="gender" class="cursor-pointer" id="gender">
              <option value="1" <?= $row['gender'] == 1 ? 'selected' : null ?>>Male</option>
              <option value="0" <?= $row['gender'] == 0 ? 'selected' : null ?>>Female</option>
            </select>
            <button style="border: none; background: #25bb8d; padding: 0.5em 1em; color: white; margin-top: 1em; border-radius: 3px; transition: 0.2s;" name="submit" class="cursor-pointer">Submit</button>
          </div>
        </form>
      </div>

      <div style="margin-top: 2em">
        <h3>Your Course</h3>
        <div class="row">
          <?php
          if (!$rowCourse = mysqli_fetch_array($result) || count($rowCourse) < 1) {
          ?>
            <img src="public/img/empty.jpg" alt="404" style="max-width: 20em; margin: auto;">
            <p style="font-style: italic; text-align: center; margin-top: -2em">You dont have any course</p>
            <?php } else {
            while ($rowCourse = mysqli_fetch_array($result)) : ?>
              <div class="col-6 col-md-4 col-lg-4 card">
                <div class="card-image">
                  <img src="public/img/thumbnail/<?= $rowCourse["cover"] ?>" alt="cover">
                </div>
                <p class="tag text-capitalize cursor-pointer"><a href="categories.php?name=<?= $rowCourse['course_id'] ?>" class="text-decoration-none"><?= $rowCourse['course_id'] ?></a></p>
                <h5 class="lengthMd1 text-capitalize text-overflow dot-2 title"><a href="detail.php?title=<?= strtolower($rowCourse["title"]); ?>&id=<?= $rowCourse["id"] ?>" class="text-decoration-none cursor-pointer" style="color: rgb(24, 24, 24);"><?= $rowCourse["title"] ?></a></h5>
                <p class="lengthSm3 text-capitalize status">Online class</p>
                <div class="seperate d-flex justify-content-between align-items-center">
                  <div class="rating d-flex">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                      <i class="fas fa-star"></i>
                    <?php endfor; ?>
                  </div>
                  <a href="detail.php?title=<?= strtolower($rowCourse["title"]); ?>&id=<?= $rowCourse["id"] ?>">
                    <i class="fas fa-chevron-circle-right"></i>
                  </a>
                </div>
              </div>
          <?php endwhile;
          } ?>
        </div>
      </div>

    </div>
  </div>
  <?php include_once('component/script.php') ?>
  <script>
    var edit = $("#editProfileAdmin");
    var formHidden = $(".form-hidden");

    edit.click(function() {
      formHidden.toggleClass("active");
    });
  </script>
</body>

</html>