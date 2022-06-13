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
  ${$key.'_qry'} = mysqli_query($db, $sql);
  ${$key.'_arr'} = mysqli_fetch_array(${$key.'_qry'});
  for($i = 0; $i < count($arr); $i++) {
    global ${$key.'_'.$arr[$i]}; 
    ${$key.'_'.$arr[$i]} = ${$key.'_arr'}[$arr[$i]];
  }
}
?>