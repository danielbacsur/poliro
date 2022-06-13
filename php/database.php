<?php
session_start();
$db = mysqli_connect("localhost","poliro","12345678","poliro");
if ($db -> connect_errno) {
  echo "Failed to connect to MySQL: " . $db -> connect_error;
  exit();
}
echo 'a';

function selectfrom($db, $sql, $key, $arr) {
  $varname = $key.'_qry';
  echo $varname;
  $alma = mysqli_query($db, $sql);
  echo 'alma';
  $$varname = mysqli_query($db, $sql);
  echo 'korte';
  $paragraph_row = mysqli_fetch_array($paragraph_qry);
  $paragraph_title = $paragraph_row['title'];
  $paragraph_section = $paragraph_row["section"];
  $paragraph_subsection = $paragraph_row["subsection"];
  $paragraph_text =  $paragraph_row["text"];
}
?>