<?php
session_start();

include_once './include/database.php';

$id = $_GET['updateid'];

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($_GET['updateid'])) {

        $idUsers = $_GET['updateid'];

        if (empty($username) || empty($email) || empty($password)) {
            header("Location: ../users.update.php?error=emptyfields"); //odsyła ponownie
            exit();
        } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../users.update.php?error=invalidUsername"); //odsyła ponownie
            exit();
        }
        else
        {
            $sql = "UPDATE `users` SET `idUsers` = $id, `username` = $username, `email` = $email,`pass` = $password WHERE `users`.`idUsers` = $idUsers ";

            $result = mysqli_query($servername, $sql);

            if (!$result) {
                header("Location: ../users.update.php?error=sqlerror"); //odsyła ponownie
                exit();
            } else {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPwd, $rola);
                mysqli_stmt_execute($stmt);
                header("Location: ../include/users.crud.php?updateid='.$idUsers.'");
                exit();
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pl" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Final project presenting an online store">
    <title></title>
    <link rel="stylesheet" href="styles-admin-signup.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/8f533e6340.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <h1>Zaaktualizuj dane użytkownika</h1>
    <div class="container">
        <form method="POST" class="form login">

            <?php  
                if(isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']. " !"; ?></p>
            <?php } ?>

            <div class="form-field">
                  <span class="schowany">Nazwa użytkownika</span></label>
                <input autocomplete="username" id="login-username" type="text" name="username" class="form-input"
                    placeholder="Nazwa użytkownika" required>
            </div>

            <div class="form-field">

                <span class="schowany">Podaj email</span></label>
                <input autocomplete="email" id="login-email" type="email" name="email" class="form-input"
                    placeholder="Email" required>
            </div>

            <div class="form-field">
                    </svg><span class="schowany">Hasło</span></label>
                <input id="login-password" type="password" name="password" class="form-input" placeholder="Hasło"
                    required>
            </div>

            <div class="form-field">
                    </svg><span class="schowany">Rola</span></label>
                <input id="login-password" type="password" name="password2" class="form-input"
                    placeholder="Rola">
            </div>

            <div class="form-field">
                <input type="submit" name="submit" value="Zaaktualizuj dane użytkownika">
            </div>
        </form>

        <p class="text-center"><a href="include/users.crud.php">Zobacz resztę użytkowników</a> <svg
                class="icon">
                <use xlink:href="#icon-arrow-right"></use>
            </svg></p>

    </div>

    <svg xmlns="http://www.w3.org/2000/svg" class="icons">
        <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
            <path
                d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
        </symbol>
    </svg>
</body>

</html>