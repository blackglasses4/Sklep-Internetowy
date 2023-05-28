<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Final project presenting an online store">
    <title></title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="script.js"></script>
</head>

<body>
    <header>
        <img id="logo" src="picture/logo.png">
        <nav>
            <div class="nav-div">
                <ul>
                    <li><a href="./index.php">menu</a></li>
                    <li><a href="#kupony">kupony</a></li>
                    <li><a href="#kontakt">kontakt</a></li>
                </ul>
            </div>
            <div class="nav-div">
                <h1 class="company-name">Nazwa Firmy</h1>
            </div>
            <div class="nav-div">
                <ul class="res">
                    <li><a href="./logowanie.php" class="active">logowanie</a></li>
                    <span style="color:white">/</span>
                    <li><a href="./rejestracja.php">rejestracja</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
    <div class="container_2">
            <section>
                <div class="content">
                    <h1>logowanie</h1>
                </div>
                <div class="content-form">
                    <form action="includes/signup.inc.php" method="post">
                        <input type="email" placeholder="Podaj email" name="email">
                        <input type="password" placeholder="Podaj hasło" name="pass">
                        <button class="button-signup" type="submit" name="submit-login">Zaloguj się</button>
                    </form>
                </div>
            </section>
        </div>
    </main>
</body>
</html>