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
    $username = $_POST['username'];

    if(empty($email)) 
    {
        header("Location: ../logowanie.php?error=Empty Email"); //odsyła ponownie
        exit();
    }
    else if(empty($password))
    {
        header("Location: ../logowanie.php?error=Empty Password"); //odsyła ponownie
        exit();
    }
    else
    {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE email=?";

        $stmt = mysqli_stmt_init($servername);
        $prepare = mysqli_stmt_prepare($stmt, $sql);

        if(!$prepare)
        {
            header("Location: ../logowanie.php?error=Sql Error"); //odsyła ponownie
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result))
            {
                $hashedPwd = $row['pass']; // Przetwarzanie pojedynczego wiersza wynikowego

                if(password_verify($password, $hashedPwd))
                {
                    setcookie("username", $username);
                    header("Location: ../index.php?login=Success#sklep");
                    exit();
                }
                else
                {
                    header("Location: ../logowanie.php?error=Wrong Password");
                    exit();
                }
            }
            else
            {
                header("Location: ../logowanie.php?error=No User");
                exit();
            }
        }
    }

}
else
{
    header("Location: index.php");
    exit();
}
?>