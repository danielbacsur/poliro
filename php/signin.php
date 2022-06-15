<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
    <?php include("head.php"); ?>
    <body>
        <h1>Bejelentkezés</h1>
        <table style="width:100%">
            <tr>
                <td>
                    <form action="register.php" method="post">
                        <b>Regisztráció</b><br/>
                        Neved: <input type="text" name="name"/><br/>
                        Email Cimed: <input type="text" name="email"/><br/>
                        username: <input type="text" name="username"/><br/>
                        Jelszavad: <input type="password" name="password"/><br/>
                        <input type="submit" value="Regisztráció"/>
                    </form>
                </td>
                <td>
                    <form action="login.php" method="post">
                        <b>Bejelentkezés</b><br/>
                        Email Cimed: <input type="text" name="email"/><br/>
                        Jelszavad: <input type="password" name="password"/><br/>
                        <input type="submit" value="Bejelentkezés"/>
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>