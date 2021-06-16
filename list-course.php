<?php
require "component/auth.php";
require "connect.php";

$idAdmin = $_SESSION['admin_id'];

// mengambil data kursus bagi admin yang sudah mempunyai akun kursus

$query = "SELECT * FROM course WHERE admin_id = '$idAdmin' ORDER BY `course`.`course_id` ASC";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "component/head.php" ?>
  <title>List Course</title>
  <style>
    table {
      border-collapse: collapse;
    }

    th {
      padding: 1em 2em;
      background: #25bb8d;
      border: 1px solid black;
    }

    td {
      padding: 0.5em 1em;
      border: 1px solid gray;
    }

    img {
      border: none;
    }
  </style>
</head>

<body>
  <div class="d-flex">
    <?php include_once('component/dashboard/sidebar.php'); ?>
    <div class="dashboard-layout">
      <h1>List Course</h1>

      <p style="margin: 20px 0;"><a href="add-course.php">Add new course</a></p>

      <!-- <div class="d-flex align-items-center flex-column">
          <img src="public/img/empty.jpg" alt="404" style="max-width: 20em; margin: auto;">
          <p style="font-style: italic; text-align: center; margin-top: -2em">You dont have any course</p>
        </div> -->

      <table>
        <th>No</th>
        <th>Cover</th>
        <th>Course Id</th>
        <th>Admin Id</th>
        <th>Title</th>
        <th>Link Video</th>
        <th>Post Date</th>
        <th colspan="2">Action</th>

        <!-- menampilkan data kursus -->
        <?php $index = 1;
        while ($row = mysqli_fetch_array($result)) : ?>
          <tr style="border-bottom: 1px solid gray;">
            <td><?= $index; ?></td>
            <td class="d-flex justify-content-center align-items-center" style="border: 0;"><img src="public/img/thumbnail/<?= $row['cover'] ?>" alt="" width="50" height="50"></td>
            <td><?= $row['course_id'] ?></td>
            <td><?= $row['admin_id'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['link_video'] ?></td>
            <td><?= $row['post_date'] ?></td>

            <td class="cursor-pointer"><a href="edit-course.php?id=<?= $row['id'] ?>"><img src="public/img/icons8_Edit_30px.png" alt=""></a></td>
            <td class="cursor-pointer"><a href="delete.php?file=list-course&table=course&id=<?= $row['id'] ?>"><img src="public/img/icons8_delete_bin_30px.png" alt=""></a></td>
          </tr>
        <?php $index++;
        endwhile; ?>
      </table>
    </div>
  </div>
  <?php include_once('component/script.php') ?>
</body>

</html>