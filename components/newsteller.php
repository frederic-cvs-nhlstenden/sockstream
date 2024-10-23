<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newsteller</title>
    <link rel="stylesheet" href="../assets/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../styles/components.css" type="text/css">
</head>

<body>
    <div id="newsletter-popup" class="popup">
        <div class="popup-content">
            <div><img src="./assets/images/sunny_misc_photos/sustainablesocks.png" alt="sustainablesocks"></div>
            <div>
                <div class="newsletter-close-btn"><span>&times;</span></div>
                <div id="discount">
                    <h2>EXTRA 10% OFF ON OUR</h2>
                    <h2 id="hallowen">HALLOWEEN SALE</h2>
                </div>
                <div>
                    <h2>FOR</h2>
                    <img id="logohalloween" src="./assets/images/logos/png/sunny_logos_white.png" alt="sunny">
                    <h2>CUSTOMERS</h2>
                </div>

                <form id="newsletter-form" method="POST" action="../index.php">
                    <input type="email" name="email" placeholder="Enter your email address" required>
                    <button type="submit">></button>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="../js/components.js"></script>

</html>