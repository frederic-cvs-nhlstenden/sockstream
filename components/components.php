<?php

$faqs = [
    "return" => "You can return any item within 30 days of purchase.",
    "contact" => "You can reach our customer service team by emailing You can reach our customer service team by emailing support@sunnysocks.com or through our live chat feature on the website. We are available from 9 AM to 5 PM CET, Monday to Friday.",
    "problems" => "If you experience any issues with your order, contact our customer support team immediately. We'll do our best to resolve the issue as quickly as possible.",
    "shipping" => "Yes, We ship worldwide! Shipping times and costs will vary depending on your location. International orders may also be subject to customs duties and taxes, which are the responsibility of the customer.",
    "long" => "Shipping times depends on your location. Orders within Europe typically take 3-5 business days, while international orders can take up to 14 business days. You can track your orders via the confirmation email we send once your order has shipped.",
    "payment" => "We accept a wide range of payment options, including IDeal, Visa, Mastercard, PayPal, and Apple Pay. All transactions are securely processed to protect your information."
];

$cartItems = [
    ['name' => 'Product 1', 'quantity' => 1],
    ['name' => 'Product 2', 'quantity' => 2]
];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userInput'])) {
    $userInput = $_POST['userInput'];
    $response = searchFAQs($userInput, $faqs);
    echo json_encode(['response' => $response]);
    exit;
}


function searchFAQs($input, $faqs) {
    $input = strtolower($input); 
    foreach ($faqs as $keyword => $answer) {
        if (stripos($input, $keyword) !== false) {
            return $answer; 
        }
    }
    return "I'm sorry, I don't have an answer for that."; 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Components</title>
    <link rel="stylesheet" href="../assets/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../styles/components.css" type="text/css">
</head>

<body>
    <div id="chatbot" class="chatbot">
        <div class="chat-header">
            <h2>Support</h2>
            <button id="close-btn">X</button>                
        </div>
        <div class="chat-body">
            <div id="base-question">
                <p>Have you checked our support? We're happy to help with further issues.</p>
            </div>
        </div>
        <div class="chat-footer">
            <div>
                <input type="text" placeholder="Type here..." id="user-input">
                <button id="send-btn">></button>
            </div>
        </div>
    </div>
    <img src="../assets/icons/svg/icon-chatbot.svg" id="chat-icon" alt="Chat Icon" />
    <script src="../js/chatbot.js"></script>

    <button id="cart-button">View Cart</button>

    <div id="cart-overlay" class="cart-overlay">
        <div class="cart-overlay-content">
            <div class="cart-header">
                <h2>Your Cart</h2>
                <span class="cart-close-button" id="cart-close-button">&times;</span>
            </div>
            <div class="cart-body">
                <ul id="cart-items">
                    <?php foreach ($cartItems as $item): ?>
                        <li><?php echo htmlspecialchars($item['name']); ?> - Quantity: <?php echo htmlspecialchars($item['quantity']); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>            
            <div class="cart-footer">
                <button id="checkout-button">View Cart</button>
            </div>
        </div>
    </div>

</body>

</html>