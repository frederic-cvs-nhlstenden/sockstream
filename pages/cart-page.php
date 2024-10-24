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

    <div class="cart-main-container">

        <!-- Left Part -->

        <div class="cart-container">

            <!-- Green Sock -->
            <div class="uni-green-product cart-product-item">

                <img src="../assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_uni_green.png"
                    alt="Uni_Green_Sock" class="uni-green-img">

                <div class="cart-product-details">
                    <h4><b>Classic Uni Color</b></h4>
                    <p><b>Size:</b> 37-40</p>
                    <p><b>Color:</b> Green</p>
                    <h3><b>€6.75</b></h3>
                </div>

                <div class="up-num-input">
                    <button class="minus" onclick="decreaseg()">-</button>
                    <input type="number" id="quantity1" value="1" min="0">
                    <button class="plus" onclick="increaseg()">+</button>
                </div>

                <div class="cart-product-action">
                    <button class="delete-button">🗑️</button>
                </div>

            </div>

            <!-- Yellow Sock -->
            <div class="uni-yellow-product cart-product-item">

                <img src="../assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_uni_yellow.png"
                    alt="Uni-yellow-sock" class="uni-yellow-img">

                <div class="cart-product-details">
                    <h4><b>Classic Uni Color</b></h4>
                    <p><b>Size:</b> 37-40</p>
                    <p><b>Color:</b> Yellow</p>
                    <h3><b>€6.75</b></h3>
                </div>

                <div class="up-num-input">
                    <button class="minus" onclick="decreasey()">-</button>
                    <input type="number" id="quantity2" value="1" min="0">
                    <button class="plus" onclick="increasey()">+</button>
                </div>

                <div class="cart-product-action">
                    <button class="delete-button">🗑️</button>
                </div>

            </div>

            <!-- Pink Sock -->
            <div class="uni-pink-product cart-product-item">

                <img src="../assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_uni_pink.png"
                    alt="Uni-pink-sock" class="uni-pink-img">

                <div class="cart-product-details">
                    <h4><b>Classic Uni Color</b></h4>
                    <p><b>Size:</b> 37-40</p>
                    <p><b>Color:</b> Pink</p>
                    <h3><b>€6.75</b></h3>
                </div>

                <div class="up-num-input">
                    <button class="minus" onclick="decreasep()">-</button>
                    <input type="number" id="quantity3" value="1" min="0">
                    <button class="plus" onclick="increasep()">+</button>
                </div>

                <div class="cart-product-action">
                    <button class="delete-button">🗑️</button>
                </div>

            </div>

        </div>

        <!-- Right Part -->

        <div class="right-cart">
            <div class="cart-order-summary">

                <h2><b>Order Summary</b></h2>

                <div class="cart-sum-details">

                    <p>Subtotal <span id="cart-subtotal">€20.25</span></p>
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
    <? include '../components/chatbot.php';?>
    <script src="../js/cart-page.js"></script>

</body>
<script src="../js/components.js"></script>
</html>