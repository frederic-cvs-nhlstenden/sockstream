<?php
$cartItems = [
    ['name' => 'Product 1', 'quantity' => 1, 'image' => '../assets/images/product1.jpg'],
    ['name' => 'Product 2', 'quantity' => 2, 'image' => '../assets/images/product2.jpg']
];


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
                    <?php foreach ($cartItems as $item): ?>
                        <li>
                            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="cart-item-image">
                            <?php echo htmlspecialchars($item['name']); ?> - Quantity: <?php echo htmlspecialchars($item['quantity']); ?>
                        </li>
                    <?php endforeach; ?>
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