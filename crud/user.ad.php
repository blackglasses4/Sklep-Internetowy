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
    <link rel="stylesheet" href="styles-login2.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/8f533e6340.js" crossorigin="anonymous"></script>
</head>

<body>
    <h1>Witaj Administratorze!</h1>
    <div class="container">
        <form action="include/user.inc.ad.php" method="POST" class="form login">

            <?php  
                if(isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']. " !"; ?></p>
            <?php } ?>

            <div class="form-field">
                  <span class="schowany">Nazwa użytkownika</span></label>
                <input autocomplete="username" id="login-username" type="text" name="username" class="form-input"
                    placeholder="Nazwa użytkownika" required>
            </div>

            <div class="form-field">

                <span class="schowany">Podaj email</span></label>
                <input autocomplete="email" id="login-email" type="email" name="email" class="form-input"
                    placeholder="Email" required>
            </div>

            <div class="form-field">
                <span class="schowany">Powtórz email</span></label>
                <input autocomplete="email" id="login-email" type="email" name="email2" class="form-input"
                    placeholder="Powtórz email" required>
            </div>
            <div class="form-field">
                    </svg><span class="schowany">Hasło</span></label>
                <input id="login-password" type="password" name="password" class="form-input" placeholder="Hasło"
                    required>
            </div>

            <div class="form-field">
                    </svg><span class="schowany">Powtórz hasło</span></label>
                <input id="login-password" type="password" name="password2" class="form-input"
                    placeholder="Powtórz hasło" required>
            </div>

            <div class="form-field">
                <input type="submit" name="submit-signup" value="Zarejestruj nowego użytkownika">
            </div>
        </form>

        <p class="text-center"><a href="./logowanie.php">Zobacz resztę użytkowników</a> <svg
                class="icon">
                <use xlink:href="#icon-arrow-right"></use>
            </svg></p>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" class="icons">
        <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
            <path
                d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
        </symbol>
    </svg>
</body>

</html>