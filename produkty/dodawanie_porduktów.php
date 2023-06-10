<?php
// Połączenie z bazą danych
global $id_role;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stronaWWW";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

// Pobieranie danych użytkownika
if ($id_role == 2  || $id_role == 2 ) {
    $sql = "SELECT * FROM users WHERE id = '$id_role'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}


// Dodawanie produktu
if ($id_role == 2 || $id_role == 3) { // Tylko moderator i administrator mają uprawnienia do dodawania produktów
    if (isset($_POST['add_product'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];

        $sql = "INSERT INTO products (nazwa, cena) VALUES ('$product_name', '$product_price')";
        if ($conn->query($sql) === true) {
            echo "Produkt został dodany.";
        } else {
            echo "Błąd podczas dodawania produktu: " . $conn->error;
        }
    }
}

// Usuwanie produktu
if ($id_role == 2 || $id_role == 3) { // Tylko moderator i administrator mają uprawnienia do dodawania produktów
    if (isset($_POST['delete_product'])) {
        $product_id = $_POST['product_id'];

        $sql = "DELETE FROM produkty WHERE id = '$product_id'";
        if ($conn->query($sql) === true) {
            echo "Produkt został usunięty.";
        } else {
            echo "Błąd podczas usuwania produktu: " . $conn->error;
        }
    }
}

// Pobieranie listy produktów
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>