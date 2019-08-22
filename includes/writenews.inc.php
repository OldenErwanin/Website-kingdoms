<?php
session_start();
if (isset($_POST['writenews-submit'])) {
  require 'database.inc.php';

  $title = $_POST['nWrite-Title'];
  $category = $_POST['nWrite-Category'];
  $text = $_POST['editor-Writenews'];
  $f = $_POST['nWrite-Featured'];
  $featured = '0';
  $featuredDate = '0000-00-00';
  if ($f == true) {
    $featured = '1';
    $featuredDate = strtotime($_POST['nWrite-FeaturedDate']);
  }
  $newformat = date('Y-m-d',$featuredDate);

  $author = $_SESSION['uName'];

  $date = date("Y-m-d");

    $sql = "INSERT INTO news (nTitle, nAuthor, nDate, nText, nCategory, nFeatured, nFeaturedDate) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?nwriteerror=sqlerror&error=".$stmt->error);
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "sssssss", $title, $author, $date, $text, $category, $featured, $newformat);
      mysqli_stmt_execute($stmt);
      header("Location: ../index.php?nwrite=success");
      exit();
    }
}
else {
  header("Location: ../index.php");
  exit();
}
