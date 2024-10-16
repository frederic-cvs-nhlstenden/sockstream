<?php
$products = [
    [
        "name" => "Classic Uni Color",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_green.jpg",
    ],
    [
        "name" => "Classic Uni Color",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_blue.jpg",
    ],
    [
        "name" => "Classic Uni Color",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_pink.jpg",
    ],
    [
        "name" => "Classic Uni Color",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_red.jpg",
    ],
    [
        "name" => "Classic Uni Color",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_yellow.jpg",
    ],
    [
        "name" => "Classic Uni Color",
        "price" => "€6,75",
        "original_price" => "€11,50",
        "image" => "../assets//images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_blue.jpg",
    ],
];

foreach ($products as $product_id => $product): ?>
    <article class="product-grid__item">
        <a href="productpage.php?product_id=<?= $product_id + 1 ?>" class="product-grid__link">
            <div class="product-grid__image-container">
                <img class="product-grid__image" src="<?= $product["image"] ?>" alt="<?= $product["name"] ?>" loading="lazy" />
            </div>
        </a>
        <div class="product-grid__details">
            <h2 class="product-grid__title"><?= $product["name"] ?></h2>
            <p class="product-grid__price">
                <span class="product-grid__price--discounted"><?= $product["price"] ?></span>
                <span class="product-grid__price--original"><?= $product["original_price"] ?></span>
            </p>
        </div>
    </article>
<?php endforeach; ?>
