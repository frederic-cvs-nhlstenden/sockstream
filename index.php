<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sunny Socks</title>
  <link rel="stylesheet" href="./assets/css/normalize.css" />
  <link rel="stylesheet" href="./styles/styles.css" />
  <link
    rel="shortcut icon"
    href="./assets/images/logos/png/sunny_logos-01.png"
    type="image/x-icon" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body id="main-page">

  <?php
  echo require_once 'components/header.php';
  ?>

  <main>
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
        src="./assets/images/sunny_misc_photos/sustainablesocks.png"
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

    <section id="best-sellers">
      <h2 class="heading">OUR BEST SELLERS</h2>

      <div class="carousel-wrapper">
        <button id="products-prevBtn" class="btns">
          <i class="fa-solid fa-angles-left"></i>
        </button>
        <div class="carousel-background">
          <div class="carousel" id="carousel-products">
            <a href="#" class="carousel-item">
              <img
                src="./assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_stripes_blue.png"
                alt="Blue sock"
                loading="lazy" />
              <div class="product-label">
                <p class="product-name">Classic Stripes</p>
                <b>€6,75 <span class="discount">€11.50</span></b>
              </div>
            </a>

            <a href="#" class="carousel-item">
              <img
                src="./assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_stripes_green.png"
                alt="Green sock"
                loading="lazy" />
              <div class="product-label">
                <p class="product-name">Classic Stripes</p>
                <b>€6,75 <span class="discount">€11.50</span></b>
              </div>
            </a>

            <a href="#" class="carousel-item">
              <img
                src="./assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_stripes_pink.png"
                alt="Pink sock"
                loading="lazy" />
              <div class="product-label">
                <p class="product-name">Classic Stripes</p>
                <b>€6,75 <span class="discount">€11.50</span></b>
              </div>
            </a>

            <a href="#" class="carousel-item">
              <img
                src="./assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_stripes_yellow.png"
                alt="Yellow sock"
                loading="lazy" />
              <div class="product-label">
                <p class="product-name">Classic Stripes</p>
                <b>€6,75 <span class="discount">€11.50</span></b>
              </div>
            </a>

            <a href="#" class="carousel-item">
              <img
                src="./assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_stripes_red.png"
                alt="Red sock"
                loading="lazy" />
              <div class="product-label">
                <p class="product-name">Classic Stripes</p>
                <b>€6,75 <span class="discount">€11.50</span></b>
              </div>
            </a>

            <a href="#" class="carousel-item">
              <img
                src="./assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_uni_blue.png"
                alt="Blue sock"
                loading="lazy" />
              <div class="product-label">
                <p class="product-name">Classic Stripes</p>
                <b>€6,75 <span class="discount">€11.50</span></b>
              </div>
            </a>

            <a href="#" class="carousel-item">
              <img
                src="./assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_uni_green.png"
                alt="Green sock"
                loading="lazy" />
              <div class="product-label">
                <p class="product-name">Classic Stripes</p>
                <b>€6,75 <span class="discount">€11.50</span></b>
              </div>
            </a>

            <a href="#" class="carousel-item">
              <img
                src="./assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_uni_pink.png"
                alt="Pink sock"
                loading="lazy" />
              <div class="product-label">
                <p class="product-name">Classic Stripes</p>
                <b>€6,75 <span class="discount">€11.50</span></b>
              </div>
            </a>
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
              decoding="asynchronous" />
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
                  src="./assets/images/team/jack.png"
                  alt="profile"
                  class="profile" />
                <h4 class="user-name">Daniel T.</h4>
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
                  src="./assets/images/team/jack.png"
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
                their wardrobelll
              </p>
              <div class="user">
                <img
                  src="./assets/images/team/jack.png"
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
                their wardrobelll
              </p>
              <div class="user">
                <img
                  src="./assets/images/team/jack.png"
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

  <script src="./js/index.js"></script>
</body>

</html>