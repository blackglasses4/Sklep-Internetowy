<?php 
session_start();

    require_once "./include/database.php";

    if(isset($_GET['deleteid']))
    {
        $idUsers = $_GET['deleteid'];
        $sql = "DELETE FROM `users` WHERE `users`.`idUsers` = $idUsers ";
        $result = mysqli_query($servername, $sql);

        if($result)
        {
            echo "Usunięto użytkownika o id: $idUsers ";
            header("Location: ./include/users.crud.php?SuccessDeleteId=$idUsers"); //odsyła ponownie
            exit(); //odsyła ponownie
        }
        else
        {
            header("Location: ../users.delete.php?errordelete"); //odsyła ponownie
            exit();
        }
    }
?>