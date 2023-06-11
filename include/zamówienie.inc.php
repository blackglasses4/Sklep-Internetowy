<?php
session_start();

if(isset($_POST['submit-order']))
{
    require_once 'database.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adres = $_POST['adres'];

    if(empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($adres)) {
        header("Location: ../zamówienie.php?error=emptyfields");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../zamówienie.php?error=invalidemail");
        exit();
    }
    else if(!preg_match("/^[0-9]{9}$/", $phone)) {
        header("Location: ../zamówienie.php?error=invalidphone");
        exit();
    }
    else {
        $sql = "INSERT INTO orders (firstname, lastname, email, phone, adres) VALUES (?,?,?,?,?)";
        $stmt = mysqli_stmt_init($servername);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../zamówienie.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email, $phone, $adres);
            mysqli_stmt_execute($stmt);
            header("Location: ../zamówienie.php?order=success");
            exit();
        }
    }
}
?>
