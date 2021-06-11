<?php
require "connect.php";
require "component/auth.php";
require "component/function.php";

if (isset($_POST["submit"])) {
  ckeditor($_POST, $_FILES);
}

$query = "SELECT course_id FROM course";
$result = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "component/head.php" ?>
  <script src="public/javascript/ckeditor/ckeditor.js"></script>
  <title>Dashboard</title>
</head>

<body style="background: #161b29">
  <div class="d-flex" style="max-height: 99.9vh; overflow: hidden">
    <?php include_once('component/dashboard/sidebar.php'); ?>
    <div class="dashboard-layout">
      <h1>Course Menu</h1>

      <!-- tulis disini -->
      <form action="" method="post" enctype="multipart/form-data" style="margin-bottom: 7em;">
        <div class="row" style="width: 70%; margin-top: 2em; margin-bottom: 1em;">
          <div class="col-6" style="margin-bottom: 1em">
            <label for="course_id">Course Id</label>
            <select name="course_id" id="">
              <?php while ($row = mysqli_fetch_array($result)) : ?>
                <option value="<?= $row["course_id"] ?>"><?= $row["course_id"] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="col-6" style="margin-bottom: 1em">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value='<?php echo date('Y-m-d'); ?>'>
          </div>
          <div class="col-6 d-flex flex-column" style="margin-bottom: 1em">
            <label for="link_video">Link Video <small>(tidak wajib)</small> </label>
            <input type="text" name="link_video" id="link_video" style="width: auto">
          </div>
          <div class="col-6 d-flex flex-column" style="margin-bottom: 1em">
            <label for="cover">Cover</label>
            <input type="file" name="cover" id="cover" style="width: auto" required>
          </div>
          <div class="col-12" style="margin-bottom: 1em">
            <label for="title">Title</label>
            <input autocomplete="off" type="text" name="title" id="title" required>
          </div>
        </div>
        <label for="editor">Content</label>
        <textarea name="editor" id="editor"></textarea>
        <button type="submit" name="submit" class="btn-submit">Submit</button>
      </form>

    </div>
  </div>
  <?php include_once('component/script.php') ?>
  <script>
    /**
     * Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
     * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
     */

    /* exported initSample */

    if (CKEDITOR.env.ie && CKEDITOR.env.version < 9)
      CKEDITOR.tools.enableHtml5Elements(document);

    // The trick to keep the editor in the sample quite small
    // unless user specified own height.
    CKEDITOR.config.height = 150;
    CKEDITOR.config.width = "auto";

    var initSample = (function() {
      var wysiwygareaAvailable = isWysiwygareaAvailable(),
        isBBCodeBuiltIn = !!CKEDITOR.plugins.get("bbcode");

      return function() {
        var editorElement = CKEDITOR.document.getById("editor1");

        // :(((
        if (isBBCodeBuiltIn) {
          editorElement.setHtml(
            "Hello world!\n\n" +
            "I'm an instance of [url=https://ckeditor.com]CKEditor[/url]."
          );
        }

        // Depending on the wysiwygarea plugin availability initialize classic or inline editor.
        if (wysiwygareaAvailable) {
          CKEDITOR.replace("editor");
        } else {
          editorElement.setAttribute("contenteditable", "true");
          CKEDITOR.inline("editor");

          // TODO we can consider displaying some info box that
          // without wysiwygarea the classic editor may not work.
        }
      };

      function isWysiwygareaAvailable() {
        // If in development mode, then the wysiwygarea must be available.
        // Split REV into two strings so builder does not replace it :D.
        if (CKEDITOR.revision == "%RE" + "V%") {
          return true;
        }

        return !!CKEDITOR.plugins.get("wysiwygarea");
      }
    })();
    initSample();
  </script>
</body>

</html>