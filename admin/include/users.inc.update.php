<?php
session_start();

include_once './database.php';

$id = $_GET['updateid'];

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rola = $_POST['rola'];

    if (isset($_GET['updateid'])) {

        $idUsers = $_GET['updateid'];

        if (empty($username) || empty($email) || empty($password)) {
            header("Location: ../users.add.php?error=emptyfields"); //odsyła ponownie
            exit();
        } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../users.add.php?error=invalidUsername"); //odsyła ponownie
            exit();
        }
        else
        {
            $sql = "UPDATE `users` SET `idUsers` = $id, `username` = $username, `email` = $email,`pass` = $password, `rola` = $rola WHERE `users`.`idUsers` = $idUsers ";

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