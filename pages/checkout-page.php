<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="../assets/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../styles/styles.css" type="text/css">
    <link rel="stylesheet" href="../styles/components.css" type="text/css">
    <link rel="icon" href="../assets/images/logos/png/sunny_logos_white.png" type="image/png">
</head>

<body>
    <?php include '../components/header.php'; ?>

    <div class="checkout-container">
        <form action="process_order.php" method="post" class="checkout-form">
            <h2>Contact Information</h2>
            <div class="form-row">
                <div class="form-group full-width">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" required>
                </div>
            </div>

            <h2>Shipping Information</h2>
            <div class="form-row">
                <div class="form-group half-width">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" name="first-name" placeholder="First Name" required>
                </div>
                <div class="form-group half-width">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" name="last-name" placeholder="Last Name" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group full-width">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="Street address, apartment, suite, etc." required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group half-width">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" placeholder="City" required>
                </div>
                <div class="form-group half-width">
                    <label for="postal-code">Postal Code</label>
                    <input type="text" id="postal-code" name="postal-code" placeholder="Postal Code" required>
                </div>
            </div>

            <h2>Payment Information</h2>
            <div class="form-row">
                <div class="form-group full-width">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" name="card-number" placeholder="Card Number" required minlength="8" maxlength="19">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group half-width">
                    <label for="expiry">Expiry Date</label>
                    <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required minlength="4" maxlength="4">
                </div>
                <div class="form-group half-width">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="CVV" required minlength="3" maxlength="3">
                </div>
            </div>

            <!-- Payment buttons -->

            <h4 class="CO-img-pay">Mode of Payment:</h4>

            <div class="form-row">
                <div class="CO-payment-options full-width">

                    <label>
                        <input type="radio" name="option1" value="applepay" required>
                        <img src="../assets/icons/png/applepay-badge.png" alt="applepay" class="CO-img-radio">
                    </label>

                    <label>
                        <input type="radio" name="option1" value="ideal" required>
                        <img src="../assets/icons/png/ideal-badge.png" alt="ideal" class="CO-img-radio">
                    </label>

                    <label>
                        <input type="radio" name="option1" value="mastercard" required>
                        <img src="../assets/icons/png/mastercard-badge.png" alt="mastercard" class="CO-img-radio">
                    </label>

                    <label>
                        <input type="radio" name="option1" value="paypal" required>
                        <img src="../assets/icons/png/paypal-badge.png" alt="paypal" class="CO-img-radio">
                    </label>

                    <label>
                        <input type="radio" name="option1" value="visa" required>
                        <img src="../assets/icons/png/visa-badge.png" alt="visa" class="CO-img-radio">
                    </label>

                    <label>
                        <input type="radio" name="option1" value="googleplay" required>
                        <img src="../assets/icons/png/googlepay-badge.png" alt="googlepay" class="CO-img-radio">
                    </label>

                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="checkout-btn">Complete Purchase</button>
            </div>
        </form>
        <div class="CO-order-summary">
            <div class="CO-summary">

                <h2><b>Order Summary</b></h2>
                <p><b>Subtotal</b> <span id="cart-subtotal">€0.00</span></p>
                <p><b>Delivery</b> <span id="cart-delivery">€2.50</span></p>

                <hr>

                <p class="CO-total"><b>Total</b> <span id="cart-total">€0.00</span></p>

                <div class="promo-code">

                    <input type="text" id="promo-code" placeholder="Add promo code">
                    <button type="button" onclick="applyPromo()">Apply</button>

                </div>

            </div>
            <div class="cart-container">

                <h2>Your Cart</h2>

                <ul id="checkout-items">
                    <!-- Cart items will be dynamically inserted here -->
                </ul>
            </div>

        </div>

    </div>
    <?php include '../components/footer.php'; ?>
    <?php include '../components/chatbot.php'; ?>
    <script src="../js/checkout-page.js"></script>
    <script src="../js/components.js"></script>
</body>

</html>