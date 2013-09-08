<?php
if(isset($_POST['name']) && $_POST['name'] != "") {
  session_start();
  $_SESSION['name'] = $_POST['name'];
  header("Location: index.php?");
} else {
  session_destroy();
  header("Location: index.php?");
}
?>
