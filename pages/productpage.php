<!DOCTYPE html>
<html lang="en">

<head>
    <?php $productName = isset($_GET["name"])
        ? htmlspecialchars($_GET["name"])
        : "Default Product"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../styles/styles.css" type="text/css">
    <link rel="icon" href="../assets/images/logos/png/sunny_logos_white.png" type="image/png">
    <title>Sunny Socks</title>
</head>

<body>
    <?php
    $product_id = $_GET["product_id"];

    $products = [
        1 => [
            "name" => "Classic Uni Color",
            "price" => "€6,75",
            "reduced" => "€9,45",
            "description" =>
            "Versatile and comfortable, these solid-color socks are perfect for any outfit, combining simplicity with everyday style.",
            "image" =>
            "../assets/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_green.jpg",
        ],
        2 => [
            "name" => "Classic Uni Color",
            "price" => "€6,75",
            "reduced" => "€9,45",
            "description" =>
            "Versatile and comfortable, these solid-color socks are perfect for any outfit, combining simplicity with everyday style.",
            "image" =>
            "../assets/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_blue.jpg",
        ],
        3 => [
            "name" => "Classic Uni Color",
            "price" => "€6,75",
            "reduced" => "€9,45",
            "description" =>
            "Versatile and comfortable, these solid-color socks are perfect for any outfit, combining simplicity with everyday style.",
            "image" =>
            "../assets/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_pink.jpg",
        ],
        4 => [
            "name" => "Classic Uni Color",
            "price" => "€6,75",
            "reduced" => "€9,45",
            "description" =>
            "Versatile and comfortable, these solid-color socks are perfect for any outfit, combining simplicity with everyday style.",
            "image" =>
            "../assets/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_red.jpg",
        ],
        5 => [
            "name" => "Classic Uni Color",
            "price" => "€6,75",
            "reduced" => "€9,45",
            "description" =>
            "Versatile and comfortable, these solid-color socks are perfect for any outfit, combining simplicity with everyday style.",
            "image" =>
            "../assets/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_yellow.jpg",
        ],
    ];

    if (array_key_exists($product_id, $products)) {
        $product = $products[$product_id];
    } else {
        echo "<div class='error'><h1>Oops! Looks like one of our socks slipped away!</h1>
        <p>Don’t worry, we’re on it. The page you’re looking for is missing, but you can hop back to our homepage and find your perfect pair!</p></div>";
        exit();
    }
    ?>
    <div class="container">
        <div class="productimg">
            <img src="<?php echo $product["image"]; ?>" alt="<?php echo $product["name"]; ?>" />
        </div>
        <div class="productdesc">
            <h1><?php echo $product["name"]; ?></h1>
            <p><?php echo $product["description"]; ?></p>
            <p><?php echo $product["price"]; ?> <s><?php echo $product["reduced"]; ?></s></p>
        </div>
    </div>
</body>

</html>