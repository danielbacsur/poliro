<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Bejelentkezés</h1>
        <table style="width:100%">
            <tr>
                <td>
                    <form action="" method="post">
                        <b>Regisztráció</b><br/>
                        Neved: <input type="text" name="name"/><br/>
                        Email Cimed: <input type="text" name="email"/><br/>
                        username: <input type="text" name="username"/><br/>
                        Jelszavad: <input type="password" name="password"/><br/>
                        <input type="submit" name="signup" value="Regisztráció"/>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <b>Bejelentkezés</b><br/>
                        Email Cimed: <input type="text" name="email"/><br/>
                        Jelszavad: <input type="password" name="password"/><br/>
                        <input type="submit" name="login" value="Bejelentkezés"/>
                    </form>
                </td>
            </tr>
        </table>
        

        
        <?php
        if(isset($_POST['login'])){
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
                header( 'Location: ../pages/history.php' );
            } else {
                $l = $_GET['redirect'];
                header( "Location: $l" );
            }
        }
        if(isset($_POST['signup'])){                 
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
                header( 'Location: ../pages/history.php' );
            } else {
                $l = $_GET['redirect'];
                header( "Location: $l" );
            }
        } ?>
    </body>
</html>