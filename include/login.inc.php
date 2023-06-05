<?php 
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {

    include_once('database.php');

    function validate($data) {
        $data = trim($data); //usuwa z początku i końca tekstu białe, puste znaki. 
        $data = stripcslashes($data); //usuwa \ z ciągu znaków.
        $data = htmlspecialchars($data); //zamienia znaki specjalne <>'"& na bezpieczne odpowiedniki.
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if(empty($email)) 
    {
        header("Location: ../logowanie.php?error=emptyEmail"); //odsyła ponownie
        exit();
    }
    else if(empty($password))
    {
        header("Location: ../logowanie.php?error=emptyPassword"); //odsyła ponownie
        exit();
    }
    else
    {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM users WHERE email='$email' AND pass='$hashedPwd'";
        $stmt = mysqli_stmt_init($servername);
        $result = mysqli_stmt_prepare($stmt, $sql);

        // if(mysqli_num_rows()) 
        // {
        //     echo "Hello";
        // }
    }

}
else
{
    header("Location: index.php");
    exit();
}
?>