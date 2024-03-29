<?php
session_start();

if(isset($_POST['submit-signup']))
{
    require_once 'database.php';

    $username =$_POST['username'];
    $email =$_POST['email'];
    $email2 =$_POST['email2'];
    $password =$_POST['password'];
    $password2 =$_POST['password2'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $servername->query($sql);

    if(empty($username) || empty($email) || empty($email2) || empty($password) || empty($password2)) {
        header("Location: ../signup.php?error=emptyfields"); //odsyła ponownie
        exit();
    }
    else if(filter_var($email, FILTER_VALIDATE_EMAIL || $email2, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidOneOfEmail"); //odsyła ponownie
        exit();
    }
    else if($password != $password2) {
        header("Location: ../signup.php?error=differentpasswords"); //odsyła ponownie
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        header("Location: ../signup.php?error=invalidUsername"); //odsyła ponownie
        exit();
    }
    else if($result->num_rows > 0)
    {
        header("Location: ../signup.php?error=SuchUsernameAlreadyExists"); //odsyła ponownie
        exit();
    }
    else {
        $sql = "INSERT INTO users (username, email, pass) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($servername);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../signup.php?error=sqlerror"); //odsyła ponownie
            exit();
        }
        else
        {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
            mysqli_stmt_execute($stmt);
            header("Location: ../login.php?signup=Success");
            exit();
        }
    }
}
?>