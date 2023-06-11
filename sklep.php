<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trending Products</title>
  <link rel="stylesheet" href="styles-sklep.css">
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
      <a href="./logout.php?logout=<?php echo $_SESSION["username"]; ?>" onclick="return confirm('Jesteś pewien, że chcesz się wylogować?');" class="delete-btn"><i class="ri-user-unfollow-fill"></i></a>
      <a href="#"><i class='bx bxs-cart'></i></a>

      <div class="bx bx-menu" id="menu-icon"></div>
    </div>
  </header class="sticky">
  <main>

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

        // Wyświetlanie produktów
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='row'>";
            echo "<img src='" . $row['photo'] . "' alt='" . $row['name'] . "' style='width: 50%; height: 50%;'>";
            echo "<h3>" . $row['name'] . "</h3>";
            echo "<p class='price'>" . $row['price'] . "</p>";
            echo "<button>Dodaj do koszyka</button>";
            echo "</div>";
          }
        } else {
          echo "No products found.";
        }

        // Zamknięcie połączenia z bazą danych
        mysqli_close($conn);
        ?>
      </div>
    </section>

   
    <section class="contact" aria-labelledby="kontakt">
        <div class="contact-info">
          <div class="first-info">
            <h1 id="kontakt">Nazwa Firmy</h1>
            
            <div class="social-icon">
              <a href="#"><i class='bx bxl-facebook'></i></a>
              <a href="#"><i class='bx bxl-instagram' ></i></a>
              <a href="#"><i class='bx bxl-youtube' ></i></a>
            </div>

            <div class="second-info">
              <h4>Contact us</h4>
              <p>Privacy</p>
            </div>
          </div>
        </div>
      </section>

      <div class="end-text">
        <p>©Copyright 2023 by nobody. All rights reversed.</p>
      </div>
  </main>
</body>
</html>
