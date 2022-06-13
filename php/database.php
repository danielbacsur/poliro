<?php
session_start();
$db = mysqli_connect("localhost","poliro","12345678","poliro");
if ($db -> connect_errno) {
  echo "Failed to connect to MySQL: " . $db -> connect_error;
  exit();
}
echo 'a';

function selectfrom($sql, $key, $arr) {
  global $db;
  $alma = mysqli_query($db, $sql);
  ${$key.'_qry'} = mysqli_query($db, $sql);
  ${$key.'_qry'} = mysqli_fetch_array($paragraph_qry);
  for($i = 0; $i < count($arr); $i++) {
    echo $arr[$i];
  }
  ${$key.'_qry'} = $paragraph_row['title'];
  ${$key.'_qry'} = $paragraph_row["section"];
  ${$key.'_qry'} = $paragraph_row["subsection"];
  ${$key.'_qry'} =  $paragraph_row["text"];
}
?>