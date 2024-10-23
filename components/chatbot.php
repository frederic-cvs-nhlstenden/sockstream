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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
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
    <img class="chat-icon" src="./assets/icons/svg/icon-chatbot.svg" id="chat-icon" alt="Chat Icon" />

    
</body>
<script src="../js/components.js"></script>

</html>