<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
} else if (isset($_SESSION["login"])) {
  if ($_SESSION["status"] !== "admin") {
    header("Location: index.php");
    exit;
  }
}
