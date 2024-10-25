<?php
session_start();

$valid_email = 'alexivanov@gmail.com';
$valid_password = 'sunnySocksAreTheBest';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if ($email === $valid_email && $password === $valid_password) {
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $email;
  } else {
    $error_message = "Invalid email or password.";
  }
}

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sunny Socks</title>
    <link rel="stylesheet" href="../assets/css/normalize.css" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <link
      rel="shortcut icon"
      href="../assets/images/logos/png/sunny_logos-01.png"
      type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  </head>

  <body id="profile">

    <?php
    echo require_once '../components/header.php';
    ?>

    <section class="profile-page">
      <div class="container">
        <div class="profile-header-form">
          <h2 class="page-title">User Profile</h2>

          <form action="../js/logout.php" method="POST" class="logout-form">
            <button type="submit" class="btn logout-btn">
              <i class="fa-solid fa-right-from-bracket"></i>
            </button>
          </form>
        </div>

        <div class="profile-image-section">
          <img
            src="../assets/icons/png/default-avatar.jpg"
            alt="Profile"
            class="profile-image"
            id="profile-img" />
          <button class="btn upload-btn">Upload Image</button>
          <input
            type="file"
            id="image-upload"
            style="display: none"
            accept="image/*" />
        </div>

        <div class="profile-section">
          <div class="user-details">
            <h3 class="section-title">Personal Details</h3>
            <form action="#" method="post">
              <div class="input-group">
                <label for="first-name">First Name</label>
                <input
                  type="text"
                  id="first-name"
                  name="first_name"
                  value="Alex"
                  required />
              </div>
              <div class="input-group">
                <label for="last-name">Last Name</label>
                <input
                  type="text"
                  id="last-name"
                  name="last_name"
                  value="Ivanov"
                  required />
              </div>
              <div class="input-group">
                <label for="email">Email</label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  value="alex.ivanov@example.com"
                  required />
              </div>
              <div class="input-group">
                <label for="phone">Phone</label>
                <input
                  type="tel"
                  id="phone"
                  name="phone"
                  value="+123456789"
                  required />
              </div>
              <div class="input-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>

              <button type="submit" class="btn">Update Profile</button>
            </form>
          </div>

          <div class="shipping-details">
            <h3 class="section-title">Shipping Details</h3>
            <form action="/update-shipping" method="post">
              <div class="input-group">
                <label for="address">Shipping Address</label>
                <input
                  type="text"
                  id="address"
                  name="address"
                  value="123 Stationsstraat St."
                  required />
              </div>
              <div class="input-group">
                <label for="city">City</label>
                <input
                  type="text"
                  id="city"
                  name="city"
                  value="Emmen"
                  required />
              </div>
              <div class="input-group">
                <label for="postal-code">Postal Code</label>
                <input
                  type="text"
                  id="postal-code"
                  name="postal_code"
                  value="12345"
                  required />
              </div>
              <div class="input-group">
                <label for="country">Country</label>
                <input
                  type="text"
                  id="country"
                  name="country"
                  value="Netherlands"
                  required />
              </div>

              <button type="submit" class="btn">Update Shipping</button>
            </form>
          </div>

          <div class="payment-methods">
            <h3 class="section-title">Payment Methods</h3>
            <form action="/update-payment" method="post">
              <div class="input-group">
                <label for="card-number">Credit Card Number</label>
                <input
                  type="text"
                  id="card-number"
                  name="card_number"
                  placeholder="**** **** **** 1234"
                  required />
              </div>
              <div class="input-group">
                <label for="expiry-date">Expiry Date</label>
                <input
                  type="text"
                  id="expiry-date"
                  name="expiry_date"
                  placeholder="MM/YY"
                  required />
              </div>
              <div class="input-group">
                <label for="cvv">CVV</label>
                <input
                  type="text"
                  id="cvv"
                  name="cvv"
                  placeholder="123"
                  required />
              </div>
              <button type="submit" class="btn">Update Payment</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <script src="../js/profile.js"></script>
  </body>

  </html>

<?php
} else {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In</title>
    <link rel="stylesheet" href="../assets/css/normalize.css" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="stylesheet" href="../styles/components.css" type="text/css">
  </head>

  <body id="login-page">
    <?php
    echo require_once '../components/header.php';
    ?>
    <main id="login-elements">
      <div class="container">
        <div class="login-form">
          <h2 class="login">Log in</h2>
          <form action="login.php" method="POST">
            <div class="email">
              <label for="email">Email address</label>
              <input type="email" id="email" name="email" required />
            </div>

            <div class="password">
              <label for="password">Password</label>
              <div class="password-container">
                <input type="password" id="password" name="password" required />
                <span class="toggle-password" id="toggle-password">Show</span>
              </div>
              <?php
              if (!empty($error_message)) {
                echo '<p class="error">' . $error_message . '</p>';
              }
              ?>
            </div>


            <button type="submit" class="login-button">Log in</button>
          </form>
          <a href="#" class="forgot-password">Can't log in?</a>
        </div>

        <div class="or">
          <div class="separator"></div>
          <p>OR</p>
          <div class="separator"></div>
        </div>

        <div class="social-login">
          <div>
            <a class="social-button google"><img
                class="social-icon"
                src="../assets/icons/svg/google-icon-logo-svgrepo-com.svg"
                alt="google icon" />
              <p>Continue with Google</p>
            </a>
            <a class="social-button facebook">
              <img
                class="social-icon"
                src="../assets/icons/svg/facebook-3-logo-svgrepo-com.svg"
                alt="facebook icon" />
              <p>Continue with Facebook</p>
            </a>
            <a class="social-button email"><img
                class="social-icon"
                src="../assets/icons/svg/mail-svgrepo-com.svg"
                alt="mail icon" />
              <p>Sign up with email</p>
            </a>
          </div>
        </div>
      </div>
    </main>
    <div class="privacy">
      <p>
        Secure Login with reCAPTCHA subject to Google <a href="#">Terms</a> &
        <a href="#">Privacy</a>
      </p>
    </div>
    <script src="../js/login.js"></script>
  </body>

  </html>

<?php
}
?>