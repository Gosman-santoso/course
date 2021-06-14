<?php
require "component/auth.php";
require "connect.php";
require "component/function.php";

$courseId = $_GET['id'];

$query = "SELECT * FROM course WHERE id=$courseId";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $linkVideo = $_POST['link_video'];
  $fotoLama = $_POST['fotoLama'];
  $status = $_POST['status'];

  if ($_FILES['cover']['error'] === 4) {
    $foto = $fotoLama;
  } else {
    $foto = upload($courseId, $_FILES);
  }

  $query = "update course set title='$title', link_video='$linkVideo', cover='$foto', status='$status' where id='$courseId'";
  mysqli_query($connect, $query);
  echo "<script>alert('Berhasil edit data!');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "component/head.php" ?>
  <title>Edit Course</title>
  <script src="public/javascript/ckeditor/ckeditor.js"></script>
</head>

<body>
  <div class="d-flex">
    <?php include_once('component/dashboard/sidebar.php'); ?>
    <div class="dashboard-layout">
      <h1>Edit Course</h1>

      <div>
        <form action="" method="post" style="width: 70%" enctype="multipart/form-data">

          <div class="col-6" style="margin-bottom: 1em">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?= $row['title'] ?>">
          </div>
          <div class="col-6 d-flex flex-column" style="margin-bottom: 1em">
            <label for="link_video">Link Video <small>(tidak wajib)</small> </label>
            <input type="text" name="link_video" id="link_video" style="width: auto" value="<?= $row['link_video'] ?>">
          </div>
          <div class="col-6" style="margin-bottom: 1em">
            <label for="title">Status</label>
            <select name="status" id="" class="cursor-pointer">
              <option value="0" <?= $row['status'] == 0 ? 'selected' : null ?>>Free</option>
              <option value="1" <?= $row['status'] == 1 ? 'selected' : null ?>>Login first</option>
            </select>
          </div>

          <p style="margin-top: 10px; margin-bottom: 5px;">Old photo : <?= $row["cover"] ?></p>
          <img src="public/img/thumbnail/<?= $row['cover'] ?>" alt="" height="80"> <br>

          <label for="cover">New Cover</label>
          <input type="file" name="cover" id="cover" style="width: auto">
          <input type="hidden" name="fotoLama" value="<?= $row['cover'] ?>"></td>

          <div class="col-6 d-flex flex-column" style="margin-bottom: 1em; margin-top: 1em;">
            <label for="content" style="margin-bottom: 0.5em">Old Content</label>
            <p style="line-height: 26px; word-spacing: 3px; font-size: 16px"><?= $row["description"] == "" ? "-empty" : $row["description"]; ?></p>
          </div>

          <button name="submit" class="btn-submit">Save</button>
        </form>
      </div>
    </div>
  </div>

  <?php include_once('component/script.php') ?>
</body>

</html>