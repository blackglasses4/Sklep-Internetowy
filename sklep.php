<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trending Products</title>
    <link rel="stylesheet" href="styles-sklep2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
            href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&family=Poppins:ital,wght@1,500&display=swap"
            rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link src="script.js"></link>
</head>

<body>
<header>
    <h1 class="company-name">ŁachmanSport</h1>

    <ul class="menu">
        <li><a href="./index.php" class="active">menu</a></li>
        <li><a href="./sklep.php">sklep</a></li>
        <li><a href="#kontakt">kontakt</a></li>
    </ul>

    <div class="login-icon">
        <a href="./logout.php?logout=<?php echo $_SESSION["username"]; ?>"
           onclick="return confirm('Jesteś pewien, że chcesz się wylogować?');" class="delete-btn"><i
                    class="ri-user-unfollow-fill"></i></a>
        <a href="./cart/cart.php"><i class='bx bxs-cart' id="cart-icon"></i></a>


        <?php
        if (isset($_SESSION['id_role']) && $_SESSION['id_role'] != 1) {
            echo '<a href="./admin/include/users.crud.php"><i class="bx bx-menu" id="menu-icon"></i></a>';
        }
        ?>
    </div>
</header>

<main>
    <section class="trending-section" id="products">
        <h2>Trending Products</h2>

        <div class="trending-products">
            <?php
            // Połączenie z bazą danych
            $conn = mysqli_connect("localhost", "root", "", "StronaWWW");

            // Sprawdzenie połączenia
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Pobranie danych z bazy
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);

            if ($result->num_rows > 0) :
                while ($row = $result->fetch_assoc()) :
                    ?>
                    <div class="product">
                        <h3><?php echo $row['name']; ?></h3>
                        <p>Cena: <?php echo $row['price']; ?> zł</p>
                        <img src="../picture/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>">
                        <!-- Dodany przycisk "Dodaj do koszyka" -->
                        <form method="post" action="./cart/cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                            <input type="number" name="quantity" class="add_to_number" value="1" min="1">
                            <input type="submit" name="add_to_cart" class="add_to_cart" value="Dodaj do koszyka">
                        </form>
                    </div>
                <?php
                endwhile;
            endif;

            // Zamknięcie połączenia z bazą danych
            mysqli_close($conn);
            ?>
        </div>
    </section>

    <section class="contact" aria-labelledby="kontakt">
        <div class="contact-info">
            <div class="first-info">
                <h1 id="kontakt">ŁachmanSport</h1>

                <div class="social-icon">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-youtube'></i></a>
                </div>

                <div class="second-info">
                    <h4>Contact us</h4>
                    <p>Privacy</p>
                </div>
            </div>
        </div>
    </section>

    <div class="end-text">
        <p>© 2023 by nobody. All rights reversed.</p>
    </div>
</main>

<script>
    document.getElementById("cart-icon").addEventListener("click", function () {
        window.location.href = "./cart/cart.php";
    });

    const addToCartForms = document.querySelectorAll("form[name='add_to_cart']");
    addToCartForms.forEach(form => {
        form.addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent form submission
            const product = this.parentNode;
            const productName = product.querySelector("h3").textContent;

            // Wyswietl komunikat o dodaniu produktu
            alert(`Produkt "${productName}" został dodany do koszyka`);

            // Opcjonalnie: Wyślij dane formularza do pliku "cart.php" za pomocą żądania AJAX

            // Opcjonalnie: Przeładuj stronę lub wykonaj inne działania po dodaniu produktu
        });
    });
</script>
</body>

</html>
