<?php
// Sprawdzenie czy koszyk istnieje w sesji
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "StronaWWW";

// Nawiązanie połączenia z bazą danych
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie czy połączenie zostało nawiązane poprawnie
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}
// Dodawanie produktu do koszyka
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Pobranie informacji o produkcie z bazy danych
    $sql = "SELECT * FROM products WHERE id = '$product_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        // Dodanie produktu do koszyka
        $item = array(
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'photo' => $product['photo'],
            'quantity' => $quantity
        );

        // Sprawdzenie czy użytkownik jest zalogowany i ma ustawione user_id w sesji
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $item['user_id'] = $user_id; // Dodanie user_id do przedmiotu w koszyku

            // Dodanie przedmiotu do tabeli cart w bazie danych
            $sql = "INSERT INTO cart (product_id, user_id, quantity) VALUES ('$product_id', '$user_id', '$quantity')";
            $result = $conn->query($sql);

            if ($result === false) {
                die("Błąd: " . $conn->error);
            }
        }

        array_push($_SESSION['cart'], $item);
        $successMessage = "Produkt został dodany do koszyka.";
    } else {
        $errorMessage = "Produkt o podanym identyfikatorze nie istnieje.";
    }
}


/// Usuwanie produktu z koszyka
if (isset($_GET['remove_from_cart'])) {
    $index = $_GET['remove_from_cart'];

    if (isset($_SESSION['cart'][$index])) {
        $product_id = $_SESSION['cart'][$index]['id'];
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Zresetuj klucze indeksów w tablicy koszyka

        // Usunięcie przedmiotu z tabeli cart w bazie danych
        $sql = "DELETE FROM cart WHERE product_id='$product_id' AND user_id='{$_SESSION['user_id']}'";
        $conn->query($sql);

        $successMessage = "Produkt został usunięty z koszyka.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Koszyk</title>
    <link rel="stylesheet" href="../produkty/styl_produkty2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="../script.js"></script>
</head>
<body>
<div class="container">
    <h2>Koszyk</h2>
    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <table class="cart-table container">
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Cena</th>
                <th>Zdjęcie</th>
                <th>Ilość</th>
                <th>Akcje</th>
            </tr>
            <?php

            // Pobranie przedmiotów z tabeli cart dla danego użytkownika
                $user = $_SESSION['user_id'];
                $sql = "SELECT * FROM cart INNER JOIN products ON cart.product_id = products.id WHERE cart.user_id = '$user'";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['price']; ?> zł</td>
                        <td class="photo"><img src="../picture/<?php echo $row['photo']; ?>"></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><a href="cart.php?remove_from_cart=<?php echo $row['product_id']; ?>"
                            class="delete-button">Usuń</a></td>
                    </tr>
            
            <?php
            }?>
        </table>
    <?php else: ?>
        <p>Koszyk jest pusty.</p>
    <?php endif; ?>


    <div class="popup-message">
    <?php if (isset($successMessage)): ?>
        <div class="success-message"><?php echo $successMessage; ?></div>
    <?php elseif (isset($errorMessage)): ?>
        <div class="error-message"><?php echo $errorMessage; ?></div>
    <?php endif; ?>
</div>

<!-- Dodany przycisk powrotu do sklep.php -->
<div class="return-button-container">
    <a href="../sklep.php" class="return-button">Powrót do sklepu</a>
</div>

</body>
</html>
