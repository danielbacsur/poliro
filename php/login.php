<?php 
$account_email = $_POST['email'];
            $account_password = hash('sha256', $_POST['password']);

            $get_email = "SELECT * FROM accounts WHERE email='$account_email' AND password='$account_password'";
            $run_email = mysqli_query($db,$get_email);
            $check_email = mysqli_num_rows($run_email);
            $row_account = mysqli_fetch_array($run_email);
            if($check_email==0){
                echo "<script>alert('Hibás email cím vagy jelszó!')</script>";
                exit();
            }
            $_SESSION['account_id'] = $row_account['id'];
            if(!isset($_GET['redirect'])) {
                header( 'Location: ../pages/index.php' );
            } else {
                $l = $_GET['redirect'];
                header( "Location: $l" );
            }
            ?>