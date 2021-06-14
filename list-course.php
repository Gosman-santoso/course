<?php
require "component/auth.php";
require "connect.php";

$query = "SELECT * FROM course ORDER BY `course`.`course_id` ASC";
$result = mysqli_query($connect, $query);

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

      <!-- tulis disini -->
      <table>
        <th>No</th>
        <th>Cover</th>
        <th>Course Id</th>
        <th>Admin Id</th>
        <th>Title</th>
        <th>Link Video</th>
        <th>Post Date</th>
        <th colspan="2">Action</th>

        <?php $index = 1;
        while ($row = mysqli_fetch_array($result)) : ?>
          <tr>
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