<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" href="../assets/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../styles/main.css" type="text/css">
    <link rel="stylesheet" href="../styles/styles.css" type="text/css">
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
        <div class="sidebar__filters">
            <h2 class="sidebar__title">Filters</h2>
            <div class="sidebar__filter-group">
                <button class="sidebar__filter-item">Casual Socks</button>
                <button class="sidebar__filter-item">Dress Socks</button>
                <button class="sidebar__filter-item">Athletic Socks</button>
            </div>
            <div class="sidebar__filter-group">
                <h3 class="sidebar__subtitle">Price</h3>
                <input type="range" min="4" max="20" value="4" class="sidebar__price-slider" id="priceSlider">
                <div class="sidebar__price-range">
                    <span>€4</span>
                    <span>€20+</span>
                </div>
            </div>
            <div class="sidebar__filter-group">
                <h3 class="sidebar__subtitle">Colors</h3>
                <div class="sidebar__color-grid">
                    <button class="sidebar__color-button" style="background: linear-gradient(to right, red, yellow, green, blue);"></button>
                    <button class="sidebar__color-button" style="background-color: #00ff00;"></button>
                    <button class="sidebar__color-button" style="background-color: #00ffff;"></button>
                    <button class="sidebar__color-button" style="background-color: #ffa500;"></button>
                    <button class="sidebar__color-button" style="background-color: #0000ff;"></button>
                </div>
            </div>
            <div class="sidebar__filter-group">
                <h3 class="sidebar__subtitle">Size</h3>
                <div class="sidebar__size-buttons">
                    <button class="sidebar__size-button">37-40</button>
                    <button class="sidebar__size-button">41-44</button>
                    <button class="sidebar__size-button">45+</button>
                </div>
            </div>
            <button class="sidebar__apply-button">Apply Filter</button>
        </div>
    </aside>
        <main class="main-content">
            <h1 class="main-content__title">BRIGHT DEALS, BOLD SOCKS</h1>
            <div class="product-grid">
                <?php
                $products = [
                    [
                        "name" => "Classic Stripes",
                        "price" => "€6,75",
                        "original_price" => "€11,50",
                        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_green.jpg",
                    ],
                    [
                        "name" => "Classic Stripes",
                        "price" => "€6,75",
                        "original_price" => "€11,50",
                        "image" => "../assets/images/sunny_socks_photos/packaging/jpeg/catalogus_sokken_uni_blue.jpg",
                    ],
                    [
                        "name" => "Classic Stripes",
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
            </div>
        </main>
    </div>
</body>
</html>