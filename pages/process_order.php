<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Order</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="../assets/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../styles/styles.css" type="text/css">
    <link rel="icon" href="../assets/images/logos/png/sunny_logos_white.png" type="image/png">
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Collect form data
        $email = $_POST['email'];
        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $postalCode = $_POST['postal-code'];
        $cardNumber = $_POST['card-number'];
        $expiry = $_POST['expiry'];
        $cvv = $_POST['cvv'];

        // Simulate storing form data
        echo "<h1>Thank you for your purchase, $firstName $lastName!</h1>";
        echo "<p>We've received your order and will ship it to $address, $city, $postalCode.</p>";
    }
    ?>

</body>

</html>