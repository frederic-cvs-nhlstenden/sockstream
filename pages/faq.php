<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../styles/styles.css" type="text/css">
    <link rel="stylesheet" href="../styles/components.css" type="text/css">
</head>

<body>
    <? require '../components/header.php'; ?>
    <div id="faq">
        <div class="general-information">
            <h2> General Information</h2>
            <div>
                <h4>1. What is Sunny Socks?</h4>
                <p>Sunny Socks is a vibrant and colorful sock brand offering a wide range of unique designs to add personality to your wardrobe. We pride ourselves on providing high-quality, comfortable socks that make a statement.</p>
                <h4>2. Where are Sunny Socks products made?</h4>
                <p>Our socks are designed and manufactured with care in Emmen, NL, using the finest materials for comfort and durability.</p>
                <h4>3. Are your products sustainable?</h4>
                <p>Yes! We are committed to sustainability. Our materials are responsibly sourced, and we continually work to reduce our environmental impact. Check our sustainability page for more details on how we’re making a difference.</p>
            </div>

        </div>
        <div class="orders-shipping">

            <h2> Orders & Shipping </h2>
            <div>
                <h4>1. How can I place an order?</h4>
                <p>Placing an order is easy! Simply browse our collection, select your desired size and design, and click ‘Add to Cart.’ Once you’re ready to check out, follow the on-screen instructions to complete your purchase.</p>
                <h4>2. What payment methods do you accept?</h4>
                <p>We accept a wide range of payment options, including iDeal, Visa, Mastercard, PayPal, and Apple Pay. All transactions are securely processed to protect your information.</p>
                <h4>3. Do you ship internationally?</h4>
                <p>Yes, we ship worldwide! Shipping times and costs will vary depending on your location. International orders may also be subject to customs duties and taxes, which are the responsibility of the customer.</p>
                <h4>4. How long does shipping take?</h4>
                <p>Shipping times depend on your location. Orders within Europe typically take 3-5 business days, while international orders can take up to 14 business days. You can track your order via the confirmation email we send once your order has shipped.</p>
            </div>

        </div>
        <div class="customer-support">

            <h2 class="faq-subtitle"> Customer Support </h2>
            <div>
                <h4>1. How can I contact customer service?</h4>
                <p>You can reach our customer service team by emailing support@sunnysocks.com or through our live chat feature on the website. We are available from 9 AM to 5 PM CET, Monday to Friday.</p>
                <h4>2. Do you have a live chat option?</h4>
                <p>Yes! Our chatbot is available 24/7 for quick answers, and you can also reach a live agent during business hours.</p>
                <h4>3. What should I do if I have a problem with my order?</h4>
                <p>If you experience any issues with your order, contact our customer support team immediately. We’ll do our best to resolve the issue as quickly as possible.</p>
            </div>

        </div>
    </div>

    <? require '../components/footer.php'; ?>
    <? include '../components/chatbot.php'; ?>
</body>
<script src="../js/components.js"></script>

</html>