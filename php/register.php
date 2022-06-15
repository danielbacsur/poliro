<?php
$account_name = $_POST['name'];
$account_email = $_POST['email'];
$account_username = $_POST['username'];
$account_password = hash('sha256', $_POST['password']);

$get_email = "SELECT * FROM accounts WHERE email='$account_email'";
$run_email = mysqli_query($db,$get_email);
$check_email = mysqli_num_rows($run_email);

if($check_email == 1){
    echo "<script>alert('Ez az email cím már regisztrálva lett. Próbálj másikat.')</script>";
    exit();
}

$insert_customer = "INSERT INTO accounts (`name`, `username`, `email`, `password`) VALUES ('$account_name', '$account_username', '$account_email','$account_password')";
$run_customer = mysqli_query($db,$insert_customer);
$_SESSION['account_id'] = mysqli_insert_id($db);

if(!isset($_GET['redirect'])) {
    header( 'Location: index.php' );
} else {
    $l = $_GET['redirect'];
    header( "Location: $l" );
}
?>