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
  <link rel="stylesheet" href="styles-menu2.css">
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
    <h1 class="company-name">Nazwa Firmy</h1>

    <ul class="menu">
      <li><a href="./index.php" class="active">menu</a></li>
      <li><a href="#sklep">sklep</a></li>
      <li><a href="#kontakt">kontakt</a></li>
    </ul>

    <div class="login-icon">
      <a href="./login.php"><i class="ri-user-fill"></i></a>
      <a href="./logout.php?logout=<?php echo $_SESSION["username"]; ?>" onclick="return confirm('Jesteś pewien, że chcesz się wylogować?');" class="delete-btn"><i class="ri-user-unfollow-fill"></i></a>
      <a href="#"><i class='bx bxs-cart'></i></a>

      <div class="bx bx-menu" id="menu-icon"></div>
    </div>
  </header class="sticky">
  <main>

      <section class="main-home">
        <div class="main-text">
          <h5>Winter Collection</h5>
          <h1>New Winter <br> Collection </h1>
          <p>There's Nothing like Trend</p>

          <a href="./login.php" class="main-shop">Shop Now <i class='bx bx-right-arrow-alt'></i></a>
        </div>

        <div class="down-arrow">
          <a href="#trending" class="down"><i class='bx bx-down-arrow-alt' ></i></a>
        </div>
      </section>
      
      <!-- trending-product-section -->
      <section id="sklep" class="trending-product" id="trending" aria-labelledby="sklep">
          <div class="center-text">
            
            <?php 
            if($_SESSION["username"])
            {
             ?> <h2>Welcome <span><?php echo $_SESSION["username"];?>!</span></h2> <?php
            }
            else
            {
              header("Location: ./login.php");
            }
            ?>

            <h2> Our Trending <span>Products</span></h2>
          </div>

          <div class="products">
            <div class="row">
              <img src="picture/2.jpg" alt="">
              <div class="product-text">
                <h5>Sale</h5>
              </div>
              <div class="heart-icon">
                <i class='bx bx-heart' ></i>
              </div>
              <div class="ratting">
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bxs-star-half' ></i>
              </div>

              <div class="price">
                <h4>Half Running Set</h4>
                <p>$99 - $129</p>
                <button>Dodaj do koszyka</button>
              </div>
            </div>
            <!-- ----- -->
            <div class="row">
              <img src="picture/5.jpg" alt="">
              <div class="product-text">
                <h5>New</h5>
              </div>
              <div class="heart-icon">
                <i class='bx bx-heart' ></i>
              </div>
              <div class="ratting">
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bxs-star-half' ></i>
              </div>

              <div class="price">
                <h4>Half Running Set</h4>
                <p>$99 - $129</p>
                <button>Dodaj do koszyka</button>
              </div>
            </div>
            <!-- ----- -->
            <div class="row">
              <img src="picture/4.jpg" alt="">

              <div class="heart-icon">
                <i class='bx bx-heart' ></i>
              </div>
              <div class="ratting">
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bxs-star-half' ></i>
              </div>

              <div class="price">
                <h4>Half Running Set</h4>
                <p>$99 - $129</p>
                <button>Dodaj do koszyka</button>
              </div>
            </div>
            <!-- ----- -->
            <div class="row">
              <img src="picture/1.jpg" alt="">
              <div class="product-text">
                <h5>Hot</h5>
              </div>
              <div class="heart-icon">
                <i class='bx bx-heart' ></i>
              </div>
              <div class="ratting">
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bxs-star-half' ></i>
              </div>

              <div class="price">
                <h4>Half Running Set</h4>
                <p>$99 - $129</p>
                <button>Dodaj do koszyka</button>
              </div>
            </div>
            <!-- ----- -->
            <div class="row">
              <img src="picture/2.jpg" alt="">

              <div class="heart-icon">
                <i class='bx bx-heart' ></i>
              </div>
              <div class="ratting">
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bxs-star-half' ></i>
              </div>

              <div class="price">
                <h4>Half Running Set</h4>
                <p>$99 - $129</p>
                <button>Dodaj do koszyka</button>
              </div>
            </div>
            <!-- ----- -->
            <div class="row">
              <img src="picture/5.jpg" alt="">
              <div class="product-text">
                <h5>Hot</h5>
              </div>
              <div class="heart-icon">
                <i class='bx bx-heart' ></i>
              </div>
              <div class="ratting">
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bxs-star-half' ></i>
              </div>

              <div class="price">
                <h4>Half Running Set</h4>
                <p>$99 - $129</p>
                <button>Dodaj do koszyka</button>
              </div>
            </div>
            <!-- ----- -->
            <div class="row">
              <img src="picture/4.jpg" alt="">
              <div class="product-text">
                <h5>Sale</h5>
              </div>
              <div class="heart-icon">
                <i class='bx bx-heart' ></i>
              </div>
              <div class="ratting">
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bxs-star-half' ></i>
              </div>

              <div class="price">
                <h4>Half Running Set</h4>
                <p>$99 - $129</p>
                <button>Dodaj do koszyka</button>
              </div>
            </div>
            <!-- ----- -->
            <div class="row">
              <img src="picture/1.jpg" alt="">
              <div class="product-text">
                <h5>Sale</h5>
              </div>
              <div class="heart-icon">
                <i class='bx bx-heart' ></i>
              </div>
              <div class="ratting">
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bx-star' ></i>
                <i class='bx bxs-star-half' ></i>
              </div>

              <div class="price">
                <h4>Half Running Set</h4>
                <p>$99 - $129</p>
                <button>Dodaj do koszyka</button>
              </div>
            </div>
            <!-- ----- -->
          </div>

      </section>

      <!-- contact-section -->

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