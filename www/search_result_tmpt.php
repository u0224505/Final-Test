<?php
  header("Content-Type:text/html; charset=utf-8");
  session_start();
  $_SESSION['SEARCH'] = trim($_POST['search']);
  $_SESSION['CURRENT_COURSE'] = trim($_POST['current_course']);
  echo 1;
?>