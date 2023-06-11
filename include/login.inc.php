<?php 
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {

    include_once('database.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)) 
    {
        header("Location: ../login.php?error=Empty Email"); //odsyła ponownie
        exit();
    }
    else if(empty($password))
    {
        header("Location: ../login.php?error=Empty Password"); //odsyła ponownie
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
            header("Location: ../login.php?error=Sql Error"); //odsyła ponownie
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
                    $_SESSION["email"] = $_POST['email'];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["id_role"] = $row["id_role"];

                    if(isset($_SESSION["email"]))
                    {
                        if($_SESSION["id_role"] == 1)
                        {
                            header("Location: ../index.php?login=You are login ".$_SESSION["username"]."#sklep");
                            exit();
                        }
                        else if($_SESSION["id_role"] == 2)
                        {
                            header("Location: ../produkty/dodawanieiusuwanie.php?login=You are login " .$_SESSION["username"]);
                            exit(); //link do zarządzania produktami
                        }
                        else if($_SESSION["id_role"] == 3)
                        {
                            header("Location: ../admin/include/users.crud.php?login=You are login " .$_SESSION["username"]);
                            exit();
                        }
                    }
                }
                else
                {
                    header("Location: ../login.php?error=Wrong Password");
                    exit();
                }
            }
            else
            {
                header("Location: ../login.php?error=No User");
                exit();
            }
        }
    }

}
?>