<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formularz zamówienia">
    <title></title>
    <link rel="stylesheet" href="styles-login3.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/8f533e6340.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form action="include/zamówienie.inc.php" method="POST" class="form login">

            <div class="form-field">
                <label for="order-firstname"><svg class="icon">
                        <use xlink:href="#icon-user"></use>
                    </svg><span class="schowany">Imię</span></label>
                <input id="order-firstname" type="text" name="firstname" class="form-input" placeholder="Imię" required>
            </div>

            <div class="form-field">
                <label for="order-lastname"><svg class="icon">
                        <use xlink:href="#icon-user"></use>
                    </svg><span class="schowany">Nazwisko</span></label>
                <input id="order-lastname" type="text" name="lastname" class="form-input" placeholder="Nazwisko" required>
            </div>

            <div class="form-field">
                <label for="order-email">
                <span class="ikona"><i class="fa-solid fa-envelope icon"></i></span>
                <span class="schowany">Email</span></label>
                <input id="order-email" type="email" name="email" class="form-input" placeholder="Email" required>
            </div>

            <div class="form-field">
                <label for="order-phone">
                <span class="ikona"><i class="fa-solid fa-envelope icon"></i></span>
                <span class="schowany">Telefon</span></label>
                <input id="order-phone" type="text" name="phone" class="form-input" placeholder="Telefon" required>
            </div>

            <div class="form-field">
                <label for="order-adres"><svg class="icon">
                        <use xlink:href="#icon-user"></use>
                    </svg><span class="schowany">Adres</span></label>
                <input id="order-adres" type="text" name="adres" class="form-input" placeholder="Adres" required>
            </div>

            <div class="form-field">
                <input type="submit" name="submit-order" value="Zamów">
            </div>

            <p class="text-center"><a href="./index.php">Powrót do strony głownej</a> <svg
                class="icon">
                <use xlink:href="#icon-arrow-right"></use>
            </svg></p>

        </form>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" class="icons">
        <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
            <path
                d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
        </symbol>
        <symbol id="icon-lock" viewBox="0 0 1792 1792">
            <path
                d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
        </symbol>
        <symbol id="icon-user" viewBox="0 0 1792 1792">
            <path
                d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
        </symbol>
    </svg>

</body>

</html>
