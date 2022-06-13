<?php
session_start();
session_destroy();
if(!isset($_GET['redirect'])) {
    header( 'Location: index.php' );
} else {
    $l = $_GET['redirect'];
    header( "Location: $l" );
}
?>