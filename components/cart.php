<?php

$cartItems = '';


if (isset($_GET['product_id']) && isset($_GET['color']) && isset($_GET['selectedSize']) && isset($_GET['quantity'])) {
    
    $product_id = $_GET['product_id'];
    $quantity = $_GET['quantity'];
    $selectedSize = $_GET['selectedSize'];
    $color = isset($_GET['color']) ? $_GET['color'] : 'default';

    
    $cartItems = [
        'name' => $product_id,
        'quantity' => $quantity,
        'color' => $color,
        'image' => "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_{$color}.webp"
    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../assets/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../styles/components.css" type="text/css">
</head>

<body>

    <div id="cart-overlay" class="cart-overlay">
        <div class="cart-overlay-content">
            <div class="cart-overlay-header">
                <h2>Your Cart</h2>
                <span class="cart-close-button" id="cart-close-button">&times;</span>
            </div>
            <div class="cart-body">
                <ul id="cart-items">
                    <? if (!empty($cartItems)): ?>
                        <? foreach ($cartItems as $item): ?>
                            <li>
                                <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="cart-item-image">
                                <?php echo htmlspecialchars($item['name']); ?> - Quantity: <?php echo htmlspecialchars($item['quantity']); ?> 
                            </li>
                        <? endforeach; ?>
                    <? else: ?>
                        <li id="cart-empty">Your cart is empty.</li>
                    <? endif; ?>
                </ul>
            </div>
            <div class="cart-footer">
                <button id="checkout-button">View Cart</button>
            </div>
        </div>
    </div>

</body>
<script src="../js/components.js"></script>

</html>