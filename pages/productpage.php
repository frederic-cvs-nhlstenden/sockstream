<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../styles/styles.css" type="text/css">
    <link rel="stylesheet" href="../styles/components.css" type="text/css">
    <link rel="icon" href="../assets/images/logos/png/sunny_logos_white.png" type="image/png">

    <?php
    // Debug mode flag
    $debug_mode = true;
    $default_product_id = 1;

    // Check for product ID from GET or use default in debug mode
    if (isset($_GET["product_id"])) {
        $product_id = intval($_GET["product_id"]);
    } elseif ($debug_mode) {
        $product_id = $default_product_id;
    } else {
        $product_id = null;
    }

    // Check for the selected color
    if (isset($_GET["color"])) {
        $selected_color = $_GET["color"];
    } else {
        $selected_color = null;
    }

    $products = [
        1 => [
            "name" => "Classic Uni Color",
            "price" => "€6,75",
            "reduced" => "€11,25",
            "description" =>
            "Versatile and comfortable, these solid-color socks are perfect for any outfit, combining simplicity with everyday style.",
            "colors" => ["blue", "green", "pink", "red", "yellow"],
            "images" =>
            ["../assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_uni_green.png", "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_uni_green.webp"],
        ],
        2 => [
            "name" => "Classic Uni Color",
            "price" => "€6,75",
            "reduced" => "€11,25",
            "description" =>
            "Versatile and comfortable, these solid-color socks are perfect for any outfit, combining simplicity with everyday style.",
            "colors" => ["blue", "green", "pink", "red", "yellow"],
            "images" =>
            ["../assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_uni_blue.png", "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_uni_blue.webp"],
        ],
        3 => [
            "name" => "Classic Uni Color",
            "price" => "€6,75",
            "reduced" => "€11,25",
            "description" =>
            "Versatile and comfortable, these solid-color socks are perfect for any outfit, combining simplicity with everyday style.",
            "colors" => ["blue", "green", "pink", "red", "yellow"],
            "images" =>
            ["../assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_uni_pink.png", "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_uni_pink.webp"],
        ],
        4 => [
            "name" => "Classic Uni Color",
            "price" => "€6,75",
            "reduced" => "€11,25",
            "description" =>
            "Versatile and comfortable, these solid-color socks are perfect for any outfit, combining simplicity with everyday style.",
            "colors" => ["blue", "green", "pink", "red", "yellow"],
            "images" =>
            ["../assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_uni_red.png", "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_uni_red.webp"],
        ],
        5 => [
            "name" => "Classic Uni Color",
            "price" => "€6,75",
            "reduced" => "€11,25",
            "description" =>
            "Versatile and comfortable, these solid-color socks are perfect for any outfit, combining simplicity with everyday style.",
            "colors" => ["blue", "green", "pink", "red", "yellow"],
            "images" =>
            ["../assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_uni_yellow.png", "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_uni_yellow.webp"],
        ],
        6 => [
            "name" => "Classic Stripes",
            "price" => "€6,75",
            "reduced" => "€11,25",
            "description" =>
            "Versatile and comfortable, these socks combine bold stripes with soft, durable cotton for everyday comfort and style.",
            "colors" => ["blue", "green", "pink", "red", "yellow"],
            "images" =>
            ["../assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_stripes_green.png", "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_green.webp"],
        ],
        7 => [
            "name" => "Classic Stripes",
            "price" => "€6,75",
            "reduced" => "€11,25",
            "description" =>
            "Versatile and comfortable, these socks combine bold stripes with soft, durable cotton for everyday comfort and style.",
            "colors" => ["blue", "green", "pink", "red", "yellow"],
            "images" =>
            ["../assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_stripes_blue.png", "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_blue.webp"],
        ],
        8 => [
            "name" => "Classic Stripes",
            "price" => "€6,75",
            "reduced" => "€11,25",
            "description" =>
            "Versatile and comfortable, these socks combine bold stripes with soft, durable cotton for everyday comfort and style.",
            "colors" => ["blue", "green", "pink", "red", "yellow"],
            "images" =>
            ["../assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_stripes_pink.png", "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_pink_01.webp"],
        ],
        9 => [
            "name" => "Classic Stripes",
            "price" => "€6,75",
            "reduced" => "€11,25",
            "description" =>
            "Versatile and comfortable, these socks combine bold stripes with soft, durable cotton for everyday comfort and style.",
            "colors" => ["blue", "green", "pink", "red", "yellow"],
            "images" =>
            ["../assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_stripes_red.png", "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_red.webp"],
        ],
        10 => [
            "name" => "Classic Stripes",
            "price" => "€6,75",
            "reduced" => "€11,25",
            "description" =>
            "Versatile and comfortable, these socks combine bold stripes with soft, durable cotton for everyday comfort and style.",
            "colors" => ["blue", "green", "pink", "red", "yellow"],
            "images" =>
            ["../assets/images/sunny_socks_photos/packaging/png/catalogus_sokken_stripes_yellow.png", "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_yellow.webp"],
        ]
    ];

    // If a valid product ID is available, set the product and page title
    if (array_key_exists($product_id, $products)) {
        $product = $products[$product_id];
        $page_title = $product["name"] . " - Sunny Socks";
    } else {
        $page_title = "Sunny Socks - Product Not Found";
    }

    // Prices from the product array
    $price = floatval(str_replace(['€', ','], ['', '.'], $product['price']));
    $reduced = floatval(str_replace(['€', ','], ['', '.'], $product['reduced']));

    // Calculate the discount percentage
    if ($reduced > $price) {
        $discount = (($reduced - $price) / $reduced) * 100;
        $discountFormatted = number_format($discount, 0);
    } else {
        $discountFormatted = 0;
    }

    function getRandomProducts($products, $currentProductId, $count = 4)
    {
        // Create an array to store products with their original IDs, excluding the current product
        $filteredProducts = [];

        // Add each product to the array, except the currently loaded product
        foreach ($products as $productId => $product) {
            if ($productId !== $currentProductId) {
                $filteredProducts[] = [
                    'product_id' => $productId,
                    'product' => $product
                ];
            }
        }

        // Shuffle the filtered array
        shuffle($filteredProducts);

        // Return only the first $count products
        return array_slice($filteredProducts, 0, $count);
    }

    // Get the current product ID from the query string
    $currentProductId = isset($_GET['product_id']) ? intval($_GET['product_id']) : 1; // Default to 1 if not provided

    // Fetch 4 random products excluding the currently loaded product
    $randomProducts = getRandomProducts($products, $currentProductId, 4);
    ?>

    <title><?php echo $page_title; ?></title>
</head>

<body>
    <?php
    if (!isset($product)) {
        echo "<div class='error'><h1>Oops! Looks like one of our socks slipped away!</h1>
        <p>Don’t worry, we’re on it. The page you’re looking for is missing, but you can hop back to our homepage and find your perfect pair!</p></div>";
        exit();
    }
    include '../components/header.php';
    ?>
    <main id="productPage">
        <div id="mainProductView">
            <div class="productPreviewImages">
                <img src="<?php echo $product['images'][0]; ?>" alt="Preview Image 1">
                <img src="<?php echo $product['images'][1]; ?>" alt="Preview Image 2">
            </div>
            <div class="mainProductImage">
                <img src="<?php echo $product['images'][0]; ?>" alt="Main Product Image">
            </div>
            <div class="productInfo">
                <h2><?php echo $product['name']; ?></h2>
                <div class="mainProductPrices">
                    <div class="reducedPrice">
                        <p><?php echo $product['price']; ?></p>
                    </div>
                    <div class="originalPrice">
                        <p><?php echo $product['reduced']; ?></p>
                    </div>
                    <?php if ($discountFormatted > 0): ?>
                        <div class="discount-bubble">
                            <p>-<?php echo $discountFormatted; ?>%</p>
                        </div>
                    <?php endif; ?>
                </div>
                <p class="mainProductDescription"><?php echo $product['description']; ?></p>
                <hr class="productPageBreak">
                <div class="productColors">
                    <p>Choose Color</p>
                    <!--Logic is suboptimal. FIX WHEN MERGED -->
                    <div class="selectColors">
                        <div class="colorOption" data-product-id="1" data-color="green">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5" stroke="white" stroke-width="2" fill="none" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                                <circle cx="25" cy="25" r="20" fill="#51b2a2" />
                            </svg>
                        </div>
                        <div class="colorOption" data-product-id="2" data-color="blue">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5" stroke="white" stroke-width="2" fill="none" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                                <circle cx="25" cy="25" r="20" fill="#1e407a" />
                            </svg>
                        </div>
                        <div class="colorOption" data-product-id="3" data-color="pink">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5" stroke="white" stroke-width="2" fill="none" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                                <circle cx="25" cy="25" r="20" fill="#e990b9" />
                            </svg>
                        </div>
                        <div class="colorOption" data-product-id="4" data-color="red">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5" stroke="white" stroke-width="2" fill="none" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                                <circle cx="25" cy="25" r="20" fill="#f15b39" />
                            </svg>
                        </div>
                        <div class="colorOption" data-product-id="5" data-color="yellow">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M20 6L9 17l-5-5" stroke="white" stroke-width="2" fill="none" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                                <circle cx="25" cy="25" r="20" fill="#fecd3e" />
                            </svg>
                        </div>
                    </div>
                </div>
                <hr class="productPageBreak">
                <div class="productSizing">
                    <p>Choose Size</p>
                    <div class="productSizes">
                        <div class="sizeOption" data-size="37-40">37-40</div>
                        <div class="sizeOption" data-size="41-44">41-44</div>
                        <div class="sizeOption" data-size="45+">45+</div>
                    </div>
                </div>
                <hr class="productPageBreak">
                <div class="productAddToCart">
                    <div class="quantitySelector">
                        <button type="button" id="decreaseQty" class="quantityBtn">-</button>
                        <span id="quantityDisplay">1</span>
                        <button type="button" id="increaseQty" class="quantityBtn">+</button>
                    </div>
                    <button id="addToCartButton" class="addToCartBtn" disabled>Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="productPageRecommended">
            <h3>Customers like you also bought</h3>
            <div class="ppCarousel">
                <?php foreach ($randomProducts as $randomProduct): ?>
                    <?php
                    $productId = $randomProduct['product_id'];
                    $product = $randomProduct['product'];
                    ?>
                    <div class="ppCarouselItem">
                        <a href="productpage.php?product_id=<?php echo $productId; ?>">
                            <img src="<?php echo $product['images'][0]; ?>" alt="<?php echo $product['name']; ?>">
                            <h4><?php echo $product['name']; ?></h4>
                            <div class="ppCarouselItemPricing">
                                <p class="reducedPrice"><?php echo $product['price']; ?></p>
                                <p class="originalPrice"><?php echo $product['reduced']; ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="ppReviewSection">
            <div class="ppReviewTopInfo">
                <h3>All Reviews</h3>
                <div class="ppReviewButtons">
                    <div class="ppSortReviews">
                        <p>Latest</p>
                        <img src="../assets/icons/svg/sort-arrow.svg" alt="Sort Arrow Icon">
                    </div>
                    <div class="ppWriteReview">
                        <p>Write a Review</p>
                    </div>
                </div>
            </div>
            <div class="ppReviews">
                <div class="ppReviewItem ppReviewLeft">
                    <div class="ppReviewStars">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                    </div>
                    <h3>Anna K.</h3>
                    <p class="ppReviewDesc">"Sunny Socks are my new go-to for gifts! Everyone I’ve bought them for absolutely loves them. The mix of creativity and quality is hard to beat, and knowing they’re sustainably made makes them even better. These socks are more than just accessories – they’re little bursts of personality!"</p>
                    <p class="ppVerifiedReview">Verified Review</p>
                </div>
                <div class="ppReviewItem ppReviewRight">
                    <div class="ppReviewStars">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                    </div>
                    <h3>Tom H.</h3>
                    <p class="ppReviewDesc">"These socks are the epitome of feel-good fashion! From the moment I opened the package, I was hooked. The designs are so fun, and they’re incredibly soft. I love that they reflect the eco-friendly and artistic spirit of the brand. Highly recommended!"</p>
                    <p class="ppVerifiedReview">Verified Review</p>
                </div>
                <div class="ppReviewItem ppReviewLeft">
                    <div class="ppReviewStars">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                    </div>
                    <h3>Harry S.</h3>
                    <p class="ppReviewDesc">"My wardrobe just got a serious upgrade, thanks to Sunny Socks! I can’t get enough of their quirky, colourful patterns. Each pair feels like a little piece of wearable art, and they’ve become my new favourite accessory. The quality is unbeatable – I’ll definitely be back for more!"</p>
                    <p class="ppVerifiedReview">Verified Review</p>
                </div>
                <div class="ppReviewItem ppReviewRight">
                    <div class="ppReviewStars">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                        <img src="../assets/icons/svg/review-star.svg" alt="Review Star Icon">
                    </div>
                    <h3>Lucy W.</h3>
                    <p class="ppReviewDesc">"Sunny Socks are like a hug for your feet! The comfort is unmatched, and the designs are totally unique. I feel like I’m walking on sunshine every time I put them on. Plus, the customer service was top-notch – you can really feel the love that goes into each pair."</p>
                    <p class="ppVerifiedReview">Verified Review</p>
                </div>
            </div>
        </div>
    </main>
    <? include '../components/footer.php'; ?>
    <? include '../components/chatbot.php'; ?>
    <div id="cart-overlay" class="cart-overlay">
        <div class="cart-overlay-content">
            <div class="cart-overlay-header">
                <h2>Your Cart</h2>
                <span class="cart-close-button" id="cart-close-button">&times;</span>
            </div>
            <div class="cart-body">
                <ul id="cart-items">
                    <!-- Cart items will be dynamically added here -->
                </ul>
            </div>
            <div class="cart-footer">
                <button id="checkout-button">Proceed to Checkout</button>
                <button id="clear-cart-button">Clear Cart</button>
            </div>

        </div>
    </div>
    <script src="../js/product_page.js"></script>
</body>

</html>