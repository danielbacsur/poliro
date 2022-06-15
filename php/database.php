<?php
session_start();
$db = mysqli_connect("localhost","poliro","12345678","poliro");
if ($db -> connect_errno) {
  echo "Failed to connect to MySQL: " . $db -> connect_error;
  exit();
}
if($root_filename == 'signin.php' && isset($_SESSION['account_id'])) {
  header( 'Location: ../pages/dashboard.php' );
}
else if(!isset($_SESSION['account_id'])) {
  header( 'Location: ../pages/signin.php' );
}

?>