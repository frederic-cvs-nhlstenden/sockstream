<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sunny Socks</title>
  <link rel="stylesheet" href="./assets/css/normalize.css" type="text/css" />
  <link rel="stylesheet" href="./styles/styles.css" type="text/css" />
  <link rel="stylesheet" href="./styles/components.css" type="text/css" />
  <link
    rel="shortcut icon"
    href="./assets/images/logos/png/sunny_logos-01.png"
    type="image/x-icon" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
  <?php include_once 'components/header.php';?>

  <main id="main-page">
    <section id="hero-section">
      <div class="hero-background">
        <div class="hero-container">
          <h1>Sunny.</h1>
          <p class="description">Welcome to the Bright Side of Socks!</p>
          <a href="./pages/store_page.php" class="hero-button">Get Your Socks!</a>
        </div>
      </div>
      <img
        class="hero-image"
        src="./assets/images/sunny_illustrations/png/hero-image.png"
        alt="Sunny Socks store banner" />
    </section>

    <section id="features">
      <ul>
        <li>
          <div class="feature-item">
            <img
              src="./assets/icons/svg/landing-shipping.svg"
              alt="Shipping" />
            <p>Free Shipping Over 25€</p>
          </div>
        </li>
        <li>
          <div class="feature-item">
            <img
              src="./assets/icons/svg/landing-eco.svg"
              alt="Eco-Friendly" />
            <p>100% Eco-Friendly</p>
          </div>
        </li>
        <li>
          <div class="feature-item">
            <img
              src="./assets/icons/svg/landing-location.svg"
              alt="Made in Emmen" />
            <p>Made in Emmen</p>
          </div>
        </li>
        <li>
          <div class="feature-item">
            <img
              src="./assets/icons/svg/landing-award.svg"
              alt="Award Winning Designs" />
            <p>Award Winning Designs</p>
          </div>
        </li>
      </ul>
    </section>

    <?php
    require_once './js/best-sellers.php';
    ?>

    <section id="best-sellers">
      <h2 class="heading">OUR BEST SELLERS</h2>

      <div class="carousel-wrapper">
        <button id="products-prevBtn" class="btns">
          <i class="fa-solid fa-angles-left"></i>
        </button>
        <div class="carousel-background">
          <div class="carousel" id="carousel-products">
            <?php foreach ($bestSellers as $product): ?>
              <a href="pages/productpage.php?product_id=<?php echo urlencode($product['product_id']); ?>" class="carousel-item">
                <img src="<?php echo htmlspecialchars($product['image']); ?>"
                  alt="<?php echo htmlspecialchars($product['alt']); ?>"
                  loading="lazy" />
                <div class="product-label">
                  <p class="product-name"><?php echo htmlspecialchars($product['name']); ?></p>
                  <b>€<?php echo number_format($product['price'], 2); ?>
                    <span class="discount">€<?php echo number_format($product['original_price'], 2); ?></span>
                  </b>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
        <button id="products-nextBtn" class="btns">
          <i class="fa-solid fa-angles-right"></i>
        </button>
      </div>
    </section>

    <section id="color-wheel">
      <div id="color-wheel-background">
        <h4 class="color-choice-title">Choose Your Color</h4>
        <div class="color-content">
          <div id="circle"></div>
          <div id="svg-container">
            <svg id="pie1"></svg>
            <img
              src="./assets/images/sunny_socks_photos/catalogus/Sunny_socks_blue.webp"
              class="inner-image"
              alt="Center"
              />
            <a href="#" class="buy-button">Buy</a>
          </div>
        </div>
      </div>
    </section>

    <section id="main-reviews">
      <h2 class="heading">SEE WHAT OUR CUSTOMERS SAY</h2>

      <div class="carousel-wrapper">
        <button id="reviews-prevBtn" class="btns">
          <i class="fa-solid fa-angles-left"></i>
        </button>
        <div class="carousel-background">
          <div class="carousel" id="carousel-reviews">
            <div class="carousel-review">
              <p>
                "I've never had so much fun with socks! The colours are so
                vibrant, and the patterns are a feast for the eyes. Plus,
                they're ridiculously comfortable! I love knowing that each
                pair is made with care and creativity - Sunny Socks brings
                sunshine to my feet every day!"
              </p>
              <div class="user">
                <img
                  src="./assets/images/team/jack.png"
                  alt="profile"
                  class="profile" />
                <div class="main-stars">
                  <h4 class="user-name">Emily B.</h4>
                  <div class="star-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-review">
              <p>
                "Sunny Socks has completely transformed my sock drawer! From
                the moment I slipped on my first pair, I knew I'd found
                something special. The quality is top-notch, and the playful
                designs always make me smile. I can't wait to buy more!"
              </p>
              <div class="user">
                <img
                  src="./assets/images/team/bob.png"
                  alt="profile"
                  class="profile" />
                <div class="main-stars">
                  <h4 class="user-name">Daniel T.</h4>
                  <div class="star-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-review">
              <p>
                "I get compliments on my socks all the time now! Whether I'm
                in the office or lounging at home, my Sunny Socks always stand
                out. They're soft, snug, and the designs are so unique. A
                must-have for anyone who wants to bring a bit of fun into
                their wardrobe.
              </p>
              <div class="user">
                <img
                  src="./assets/images/team/femke.png"
                  alt="profile"
                  class="profile" />
                <div class="main-stars">
                  <h4 class="user-name">Sophie M.</h4>
                  <div class="star-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-review">
              <p>
                "I get compliments on my socks all the time now! Whether I'm
                in the office or lounging at home, my Sunny Socks always stand
                out. They're soft, snug, and the designs are so unique. A
                must-have for anyone who wants to bring a bit of fun into
                their wardrobelll
              </p>
              <div class="user">
                <img
                  src="./assets/images/team/pieter.png"
                  alt="profile"
                  class="profile" />
                <h4 class="user-name">Daniel T.</h4>
              </div>
            </div>
          </div>
        </div>
        <button id="reviews-nextBtn" class="btns">
          <i class="fa-solid fa-angles-right"></i>
        </button>
      </div>
    </section>

    <section id="socks-inquiry">
      <h2 class="heading">CREATE YOUR OWN STYLE</h2>
      <div class="form-wrapper">
        <img
          src="./assets/images/sunny_misc_photos/sustainablesocks.png"
          alt="Sunny Socks" />
        <div class="form-container">
          <div class="form-headers">
            <h3>Create Your Dream Socks</h3>
            <h3>Inquire today!</h3>
          </div>
          <form action="#" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" name="name" id="name" required />
            <label for="email">Your Email:</label>
            <input type="email" name="email" id="email" required />
            <label for="message">Tell us about your dream socks!</label>
            <textarea
              name="message"
              id="message"
              cols="30"
              rows="5"
              required></textarea>

            <button type="submit">Submit</button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <div id="newsletter-popup" class="popup">
    <div class="popup-content">
      <div>
        <img src="./assets/images/sunny_socks_photos/seasonal/halloween_socks.png" alt="Sustainable Socks">
      </div>
      <div id="popup-main-content">
        <div class="newsletter-close-btn"><span>&times;</span></div>
        <div class="popup-info">
          <div id="discount">
            <h2>EXTRA 10% OFF ON OUR</h2>
            <h2 id="hallowen">HALLOWEEN SALE</h2>
          </div>
          <div class="popup-center-content">
            <h2>FOR</h2>
            <h2 id="popup-title">Sunny.</h2>
            <h2>CUSTOMERS</h2>
          </div>
          <div class="newsform">
            <form id="newsletter-form" method="POST" action="./index.php">
              <label for="email">Sign up</label>
              <div class="email_button">
                <input type="email" name="email" placeholder="Enter your email address" required>
                <button class="newsbutton" type="submit"><i class="fa-solid fa-arrow-right"></i></button>
              </div>
            </form>
          </div>
          <p>Already a customer? <a href="./pages/login.php">Log in</a></p>
        </div>
      </div>
    </div>
  </div>
  <?php include_once 'components/chatbot.php';?>
  <?php include_once 'components/footer.php';?>
  <script src="./js/index.js"></script>
</body>

</html>