<?php
session_start();
$db = mysqli_connect("localhost","poliro","12345678","poliro");
if ($db -> connect_errno) {
  echo "Failed to connect to MySQL: " . $db -> connect_error;
  exit();
}
selectfrom("SELECT * FROM paragraphs WHERE id='$paragraph_id'", 'paragraph', [])
function selectfrom($sql, $key, $arr) {
  ${$key.'_qry'} = mysqli_query($db,$sql);
  $paragraph_row = mysqli_fetch_array($paragraph_qry);
  $paragraph_title = $paragraph_row['title'];
  $paragraph_section = $paragraph_row["section"];
  $paragraph_subsection = $paragraph_row["subsection"];
  $paragraph_text =  $paragraph_row["text"];
}
?>