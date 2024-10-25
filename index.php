<?php

$faqs = [
  "return" => "You can return any item within 30 days of purchase.",
  "contact" => "You can reach our customer service team by emailing You can reach our customer service team by emailing support@sunnysocks.com or through our live chat feature on the website. We are available from 9 AM to 5 PM CET, Monday to Friday.",
  "problems" => "If you experience any issues with your order, contact our customer support team immediately. We'll do our best to resolve the issue as quickly as possible.",
  "shipping" => "Yes, We ship worldwide! Shipping times and costs will vary depending on your location. International orders may also be subject to customs duties and taxes, which are the responsibility of the customer.",
  "long" => "Shipping times depends on your location. Orders within Europe typically take 3-5 business days, while international orders can take up to 14 business days. You can track your orders via the confirmation email we send once your order has shipped.",
  "payment" => "We accept a wide range of payment options, including IDeal, Visa, Mastercard, PayPal, and Apple Pay. All transactions are securely processed to protect your information."
];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userInput'])) {
  $userInput = $_POST['userInput'];
  $response = searchFAQs($userInput, $faqs);
  echo json_encode(['response' => $response]);
  exit;
}


function searchFAQs($input, $faqs)
{
  $input = strtolower($input);
  foreach ($faqs as $keyword => $answer) {
    if (stripos($input, $keyword) !== false) {
      return $answer;
    }
  }
  return "I'm sorry, I don't have an answer for that.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    file_put_contents('subscribers.txt', $email . PHP_EOL, FILE_APPEND); // Placehoder for where to store the user emails
    //echo "<p>Thank you for subscribing!</p>";
  } else {
    //echo "<p>Invalid email address.</p>";
  }
}
?>
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

  <header>
    <div class="header-left">
      <p class="header-left-border"><a href="./pages/store_page.php">All Socks</p></a>
      <a href="./pages/store_page.php?storeType=seasonal">
        <p>Seasonal</p>
      </a>
    </div>


    <div class="header-logo">
      <a href="./index.php"><img src="./assets/images/logos/png/sunny_logos-01.png"></a>
    </div>

    <div class="header-right">
      <a href="./pages/aboutus.php">About Us</a>
      <a href="./pages/faq.php" div="header-right-border">FAQs</a>
    </div>

    <div class="icons-header">
      <a href="./pages/login.php"><img src="./assets/icons/png/profile.png" class="profile-header"></a>
      <img src="./assets/icons/png/cart.png" class="cart-header" id="cart-button">
    </div>
  </header>

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

  <div id="chatbot" class="chatbot">
    <div class="chat-header">
      <h2>Support</h2>
      <button id="close-btn">X</button>
    </div>
    <div class="chat-body">
      <div id="base-question">
        <p>Have you checked our support? We're happy to help with further issues.</p>
        <p>You can access to the <a href="./pages/faq.php">FAQs</a> page by clicking on the link.</p>
      </div>
      <div id="base-question">
        <p>To use the chatbot you just have to ask a question regarding our page.</p>
        <p>For example: "How long will it take for the package to arrive at its destination?"</p>
        <p>Try it!!</p>
      </div>
    </div>
    <div class="chat-footer">
      <div>
        <input type="text" placeholder="Type here..." id="user-input">
        <button id="send-btn">></button>
      </div>
    </div>
  </div>
  <img class="chat-icon" src="./assets/icons/svg/icon-chatbot.svg" id="chat-icon" alt="Chat Icon" />

  <div id="newsletter-popup" class="popup">
    <div class="popup-content">
      <div><img src="./assets/images/sunny_socks_photos/seasonal/halloween_socks.png" alt="sustainablesocks"></div>
      <div>
        <div class="newsletter-close-btn"><span>&times;</span></div>
        <div id="discount">
          <h2>EXTRA 10% OFF ON OUR</h2>
          <h2 id="hallowen">HALLOWEEN SALE</h2>
        </div>
        <div>
          <h2>FOR</h2>
          <img id="logohalloween" src="./assets/images/logos/png/sunny_logos_white.png" alt="sunny">
          <h2>CUSTOMERS</h2>
        </div>
        <div class="newsform">
          <form id="newsletter-form" method="POST" action="./index.php">
            <input type="email" name="email" placeholder="Enter your email address" required>
            <button class="newsbutton" type="submit">=></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div>
      <div class="footer-top-text">

        <div class="farleft-text-footer">
          <img src="./assets/icons/png/ssl-secure.png" class="ssl-secured-footer">
          <p>Address:</p>
          <p>Sunny Street, Emmen</p>
          <p>Contact Us:</p>
          <p>06 12 34 56 78</p>
          <p>info@sunnysocksn.nl</p>
        </div>

        <div class="footer-right-center">
          <p class="right">Contact Us</p>
          <p class="right">Sunny's Values</p>
          <p class="right">Join Our Community</p>
          <p class="right">Socks of the Month</p>
        </div>

        <div class="footer-right">
          <p>Gift Cards</p>
          <p>Wholesale Inquiries</p>
          <p>FAQs</p>
          <p>Careers</p>
        </div>

      </div>

      <div class="footer-socials">
        <a href="https://www.facebook.com/">
          <img src="./assets/images/socials/facebook-logo.png">
        </a>

        <a href="https://instagram.com/">
          <img src="./assets/images/socials/instagram-logo.png">
        </a>

        <a href="https://x.com">
          <img src="./assets/images/socials/x-logo.png">
        </a>

        <a href="https://www.linkedin.com/">
          <img src="./assets/images/socials/linkedin-logo.png">
        </a>

        <a href="https://www.youtube.com/">
          <img src="./assets/images/socials/youtube-logo.png">
        </a>
      </div>


      <hr class="hr-footer">

      <div class="footer-copyrights">
        <div>© 2024 Sunny Socks. All rights reserved.</div>
        <div>Privacy Policy &nbsp;&nbsp;&nbsp; Terms of Service &nbsp;&nbsp;&nbsp; Shipping & Return Policy</div>
      </div>

    </div>
  </footer>
  <script src="./js/index.js"></script>
  <script src="./js/components.js"></script>
  <script src="./js/headerandfooter.js"></script>
</body>

</html>