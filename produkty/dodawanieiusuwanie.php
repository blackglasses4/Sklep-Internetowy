<?php
global $PATH_PREFIX;
require_once "../config.php";

// Połączenie z bazą danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "StronaWWW";

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

// Ustawienie domyślnej strefy czasowej
date_default_timezone_set('Europe/Warsaw');

// Zdefiniowanie folderu dla przesyłanych zdjęć
$uploadDir = $PATH_PREFIX.'picture/';

// Komunikat o sukcesie
$successMessage = "";

// Dodawanie produktu
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Przesłanie zdjęcia do folderu i pobranie jego nazwy
    $photo = $_FILES['photo']['name'];
    $targetFilePath = $uploadDir . basename($photo);
    move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath);

    // Dodanie produktu do bazy danych
    // Dodanie produktu do bazy danych
    $sql = "INSERT INTO products (name, price, photo_id, photo) VALUES ('$name', '$price', 1, '$photo')";

    if ($conn->query($sql) === true) {
        $successMessage = "Produkt został dodany pomyślnie.";
        header("Location: dodawanieiusuwanie.php"); // Przekierowanie na tę samą stronę po dodaniu produktu
        exit(); // Zakończ działanie skryptu po przekierowaniu
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
}


// Usuwanie produktu
if (isset($_GET['delete_product'])) {
    $id = $_GET['delete_product'];

    // Pobranie nazwy zdjęcia przypisanego do produktu
    $sql = "SELECT photo FROM products WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $photo = $row['photo'];

        // Usunięcie zdjęcia z folderu
        $photoPath = $uploadDir . $photo;
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
    }

    // Usunięcie produktu z bazy danych
    $sql = "DELETE FROM products WHERE id='$id'";

    if ($conn->query($sql) === true) {
        $successMessage = "Produkt został usunięty pomyślnie.";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
}

// Pobranie listy produktów z bazy danych
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dodawanie i usuwanie produktów</title>
    <link rel="stylesheet" href="styl_produkty.css">
    <script src="../script.js"></script>
</head>
<body>
<div class="container">
    <h2>Dodawanie produktu</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-field">
            <div class="label-container">
                <label for="name">Nazwa:</label>
            </div>
            <input type="text" id="name" name="name" class="input-field" required>
        </div>
        <div class="form-field">
            <div class="label-container">
                <label for="price">Cena:</label>
            </div>
            <input type="number" id="price" name="price" step="0.01" class="input-field" required>
        </div>
        <div class="button-container">
            <input type="file" id="photo" name="photo" accept="image/*" class="hidden-input" onchange="displayFileName( )" required>
            <label for="photo" class="add-photo-button">Dodaj zdjęcie</label>
            <span id="file-name"></span>
        </div>
        <div>
            <input type="submit" class="add-button-product" name="add_product" value="Dodaj produkt" >
        </div>
    </form>
</div>

<div class="popup-message">
    <?php if ($successMessage): ?>
        <div class="success-message"><?php echo $successMessage; ?></div>
    <?php endif; ?>
</div>

<table class="product-table container">
    <tr>
        <th>ID</th>
        <th>Nazwa</th>
        <th>Cena</th>
        <th>Zdjęcie</th>
        <th>Akcje</th>
    </tr>
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?> zł</td>
                <td class="photo"><img src="../picture/<?php echo $row['photo']; ?>"></td>
                <td><a href="dodawanieiusuwanie.php?delete_product=<?php echo $row['id']; ?>" class="delete-button">Usuń produkt</a></td>
            </tr>
        <?php endwhile; ?>
    <?php endif; ?>
</table>
</body>
</html>
<script>
    function displayFileName() {
        var fileInput = document.getElementById('photo');
        var fileNameSpan = document.getElementById('file-name');
        fileNameSpan.textContent = fileInput.files[0].name;
    }
</script>