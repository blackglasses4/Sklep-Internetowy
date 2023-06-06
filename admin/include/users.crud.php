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
    <div class="container">
        <button class="btn btn-primary my-5"><a class="text-light" href="../user.signup.php">Dodaj użytkownika</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nazwa użytkownika</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    require_once('database.php');

                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($servername, $sql);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $idUsers = $row['idUsers'];
                        $username = $row['username'];
                        $email = $row['email']; 

                        echo '<tr>
                        <th scope="row">'.$idUsers.'</th>
                        <td>'.$username.'</td>
                        <td>'.$email.'</td>
                            </tr>';
                    }
                ?>

                <!-- <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr> -->
            </tbody>
        </table>
    </div>
</body>

</html>