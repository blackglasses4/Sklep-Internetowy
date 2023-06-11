<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>
<h1>Witaj Administratorze!</h1>
<a class="btn btn-primary" href="../../index.php">Strona główna</a><br><!-- Dodany przycisk "Strona główna" -->
<br><button class="btn btn-primary"><a class="text-light" href="../users.add.php">Dodaj użytkownika</a></button><br>
<br><button class="btn btn-primary"><a class="text-light" href="../../produkty/dodawanieiusuwanie.php">Zarządzaj produktami</a></button>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nazwa użytkownika</th>
            <th scope="col">Email</th>
            <th scope="col">Rola</th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once('database.php');

        $sql = "SELECT * FROM users";
        $result = mysqli_query($servername, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $idUsers = $row['idUsers'];
            $username = $row['username'];
            $email = $row['email'];
            $rola = $row['id_role'];

            echo '<tr>
                        <th scope="row">' . $idUsers . '</th>
                        <td>' . $username . '</td>
                        <td>' . $email . '</td>
                        <td>' . $rola . '</td>
                            </tr>
                        <td>
                            <button class="btn btn-primary"><a class="text-light" href="../users.update.php?updateid=' . $idUsers . '">Zaaktualizuj</a></button>
                            <button class="btn btn-danger"><a class="text-light" href="../users.delete.php?deleteid=' . $idUsers . '">Usuń</a></button>
                        </td>';
        }
        ?>
        </tbody>
    </table>
</div>
</body>

</html>