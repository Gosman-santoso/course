<?php
require "component/auth.php";
require "connect.php";

$query = "SELECT * FROM user";
$result = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "component/head.php" ?>
  <title>List User</title>
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
  </style>
</head>

<body>
  <div class="d-flex">
    <?php include_once('component/dashboard/sidebar.php'); ?>
    <div class="dashboard-layout">
      <h1>User Menu</h1>

      <!-- tulis disini -->
      <table>
        <th>No</th>
        <th>Photo</th>
        <th>Username</th>
        <th>Gmail</th>
        <th>Gender</th>
        <th>Telp</th>
        <th colspan="2">Action</th>

        <?php $index = 1;
        while ($row = mysqli_fetch_array($result)) : ?>
          <tr>
            <td><?= $index; ?></td>
            <td class="d-flex justify-content-center align-items-center"><img src="public/img/photo/<?= $row['photo'] ?>" alt="" width="50" height="50"></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['gmail'] ?></td>
            <td><?php echo $row['gender'] == 1 ? 'Male' : 'Female' ?></td>
            <td><?= $row['telp'] ?></td>
            <td class="cursor-pointer"><a href="edit-user.php?id=<?= $row['id'] ?>&name=<?= $row['username'] ?>"><img src="public/img/icons8_Edit_30px.png" alt=""></a></td>
            <td class="cursor-pointer"><a href="delete.php?file=list-user&table=user&id=<?= $row['id'] ?>"><img src="public/img/icons8_delete_bin_30px.png" alt=""></a></td>
          </tr>
        <?php $index++;
        endwhile; ?>
      </table>

    </div>
  </div>
  <?php include_once('component/script.php') ?>
</body>

</html>