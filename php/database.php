<?php
session_start();
$db = mysqli_connect("localhost","poliro","12345678","poliro");
if ($db -> connect_errno) {
  echo "Failed to connect to MySQL: " . $db -> connect_error;
  exit();
}
?>