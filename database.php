<?php
session_start();
$poliro = mysqli_connect("localhost","poliro","12345678","poliro");
if ($poliro -> connect_errno) {
  echo "Failed to connect to MySQL: " . $poliro -> connect_error;
  exit();
}
?>