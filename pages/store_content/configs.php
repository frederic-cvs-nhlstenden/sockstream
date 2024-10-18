<?php
$products = [
    [
        "name" => "Classic Uni Color",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_green.jpg",
        "is_seasonal" => false,
    ],
    [
        "name" => "Classic Uni Color",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_blue.jpg",
        "is_seasonal" => false,
    ],
    [
        "name" => "Classic Uni Color",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_pink.jpg",
        "is_seasonal" => false,
    ],
    [
        "name" => "Classic Uni Color",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_red.jpg",
        "is_seasonal" => false,
    ],
    [
        "name" => "Classic Uni Color",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_yellow.jpg",
        "is_seasonal" => false,
    ],
    [
        "name" => "Classic Uni Color",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets//images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_blue.jpg",
        "is_seasonal" => false,
    ],
    [
        "name" => "Classic Stripes",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_stripes_green.jpg",
        "is_seasonal" => true,
    ],
    [
        "name" => "Classic Stripes",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_stripes_blue.jpg",
        "is_seasonal" => true,
    ],
    [
        "name" => "Classic Stripes",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_stripes_pink.jpg",
        "is_seasonal" => true,
    ],
    [
        "name" => "Classic Stripes",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_stripes_red.jpg",
        "is_seasonal" => true,
    ],
    [
        "name" => "Classic Stripes",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_stripes_yellow.jpg",
        "is_seasonal" => true,
    ],
    [
        "name" => "Classic Stripes",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets//images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_stripes_blue.jpg",
        "is_seasonal" => true,
    ],
];

function displayProducts($products, $is_seasonal) {
    foreach ($products as $product_id => $product) {
        if ($product["is_seasonal"] === $is_seasonal) {
            echo "<article class='product-grid__item'>
            <a href='productpage.php?product_id=" . ($product_id + 1) . "' class='product-grid__link'>
                <div class='product-grid__image-container'>
                    <img class='product-grid__image' src='" . $product["image"] . "' alt='" . $product["name"] . "' loading='lazy' />
                </div>
            </a>
            <div class='product-grid__details'>
                <h2 class='product-grid__title'>" . $product["name"] . "</h2>
                <p class='product-grid__price'>
                    <span class='product-grid__price--discounted'>" . $product["price"] . "</span>
                    <span class='product-grid__price--original'>" . $product["original_price"] . "</span>
                </p>
            </div>
        </article>";
        }
    }
}
?>