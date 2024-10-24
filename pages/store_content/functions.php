<?php
include 'globals.php';

function filterProducts($products, $filters) {
    return array_filter($products, function($product) use ($filters) {
        if (isset($filters['type']) && $product['type'] !== $filters['type']) {
            return false;
        }
        if (isset($filters['price'])) {
            list($min, $max) = explode('-', $filters['price']);
            $price = floatval($product['price']);
            if ($price < $min || $price > $max) {
                return false;
            }
        }
        if (isset($filters['color'])) {
            $selectedColors = explode(',', $filters['color']);
            if (!in_array($product['color'], $selectedColors)) {
                return false;
            }
        }
        if (isset($filters['size']) && !in_array($filters['size'], $product['sizes'])) {
            return false;
        }
        return true;
    });
}

// Get filters from GET parameters
$appliedFilters = [
    'type' => $_GET['type'] ?? null,
    'price' => $_GET['price'] ?? null,
    'color' => $_GET['color'] ?? null,
    'size' => $_GET['size'] ?? null
];

// Filter products
$filteredProducts = filterProducts($products, $appliedFilters);

// Display filtered products
displayProducts($filteredProducts, isset($_GET['storeType']) && $_GET['storeType'] === 'seasonal');

function displayProducts($products, $is_seasonal) {
    foreach ($products as $product_id => $product) {
        if ($product["is_seasonal"] === $is_seasonal) {
            echo "<article class='product-grid__item'>
                <a href='productpage.php?product_id=" . ($product_id + 1) . "' class='product-grid__link'>
                    <div class='product-card__image-wrapper'>
                        <img class='product-card__image' src='" . $product["image"] . "' alt='" . $product["name"] . "' loading='lazy' />
                    </div>
                </a>
                <div class='product-grid__details'>
                    <h2 class='product-grid__title'>" . $product["name"] . "</h2>
                    <p class='product-grid__price'>
                        <span class='product-grid__price--discounted'>€" . $product["price"] . "</span>
                        <span class='product-grid__price--original'>€" . $product["reduced"] . "</span>
                    </p>
                </div>
            </article>";
        }
    }
}
?>