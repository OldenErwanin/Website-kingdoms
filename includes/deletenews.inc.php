<?php
if(!empty($_POST["nDelete-submit"])){
	require 'database.inc.php';

  $sql = ' DELETE FROM news WHERE nID = '.$_POST["nDelete-submit"];

  if (mysqli_query($conn, $sql)) {
    header("Location: ../index.php?ndelete=success");
    exit();
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
   mysqli_close($conn);
}
else {
  header("Location: ../index.php");
  exit();
}
