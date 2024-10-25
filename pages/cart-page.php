<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="../assets/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../styles/styles.css" type="text/css">
    <link rel="stylesheet" href="../styles/components.css" type="text/css">
    <link rel="icon" href="../assets/images/logos/png/sunny_logos_white.png" type="image/png">
</head>

<body>
    <? require '../components/header.php'; ?>
    <div class="cart-main-container">

        <!-- Left Part -->

        <div class="cart-container">
            <<ul id="checkout-items">
                <!-- Checkout items will be displayed here -->

            </ul>
        </div>
        <!-- Right Part -->

        <div class="right-cart">
            <div class="cart-order-summary">

                <h2><b>Order Summary</b></h2>

                <div class="cart-sum-details">

                    <p>Subtotal <span id="cart-subtotal" >€</span></p>
                    <p>Delivery <span id="cart-delivery">€2.50</span></p>

                    <hr>

                    <p class="cart-total">Total <span id="cart-total">€22.75</span></p>

                </div>

                <div class="cart-checkout">

                    <button id="checkout-btn">Proceed to Checkout</button>

                </div>

                <div class="payment-options">

                    <p>We accept:</p>

                    <label>

                        <img src="../assets/icons/png/applepay-badge.png" alt="applepay" id="ap1">
                    </label>

                    <label>

                        <img src="../assets/icons/png/ideal-badge.png" alt="ideal" id="id1">
                    </label>

                    <label>

                        <img src="../assets/icons/png/mastercard-badge.png" alt="mastercard" id="mc1">
                    </label>

                    <label>

                        <img src="../assets/icons/png/paypal-badge.png" alt="paypal" id="pp1">
                    </label>

                    <label>

                        <img src="../assets/icons/png/visa-badge.png" alt="visa" id="v1">
                    </label>

                    <label>

                        <img src="../assets/icons/png/googlepay-badge.png" alt="googlepay" id="gp1">
                    </label>


                </div>
            </div>

            <div class="powered-by">

                <p>Powered by</p>
                <img src="../assets/icons/png/stripe_icon.png" alt="Stripe">

            </div>
        </div>


    </div>


    
    <? require '../components/footer.php'; ?>
    <? include '../components/chatbot.php'; ?>
</body>
<script src="../js/cart-page.js"></script>
<script src="../js/components.js"></script>

</html>