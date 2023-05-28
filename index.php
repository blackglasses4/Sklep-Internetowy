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
                    <li><a href="./index.php" class="active">menu</a></li>
                    <li><a href="#kupony">kupony</a></li>
                    <li><a href="#kontakt">kontakt</a></li>
                </ul>
            </div>
            <div class="nav-div">
                <h1 class="company-name">Nazwa Firmy</h1>
            </div>
            <div class="nav-div">
                <ul>
                    <li><a href="./logowanie.php">logowanie</a></li>
                    <span style="color:white">/</span>
                    <li><a href="./rejestracja.php">rejestracja</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
            <div class="slider">
                <div class="slides">

                    <input type="radio" name="radio-btn" id="radio1" checked>
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">

                    <div class="slide first">
                        <!-- <h1>Naleśniki z polewą</h1> -->
                        <img src="picture/1.jpg" alt="ostre danie">
                    </div>
                    <div class="slide two">
                        <!-- <h1>Pizza</h1> -->
                        <img src="picture/2.jpg" alt="trzy napoje">
                    </div>
                    <div class="slide three">
                        <!-- <h1>Mini burger</h1> -->
                        <img src="picture/3.jpg" alt="pizza">
                    </div>
                    <div class="slide four">
                        <!-- <h1>Brokuły polewane oliwą</h1> -->
                        <img src="picture/4.jpg" alt="Kawa ze śmietaną">
                    </div>
                    
                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                    </div>

                    <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
                </div>
            </div>
        <div class="main">
            <section role="region" aria-labelledby="kupony">
                <h2 id="kupony">kupony</h2>
            </section>
            <section role="region" aria-labelledby="kontakt">
                <h2 id="kontakt">kontakt</h2>
            </section>
        </div>
    </main>
</body>

</html>