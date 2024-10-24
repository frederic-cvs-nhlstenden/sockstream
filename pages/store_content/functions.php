<?php
include 'globals.php';

function filterProducts($products, $filters) {
    return array_filter($products, function($product) use ($filters) {
        if (!empty($filters['type']) && $product['type'] !== $filters['type']) {
            return false;
        }
        if (!empty($filters['price'])) {
            list($min, $max) = explode('-', $filters['price']);
            $price = floatval($product['price']);
            if ($price < floatval($min) || ($max !== '20' && $price > floatval($max))) {
                return false;
            }
        }
        if (!empty($filters['color'])) {
            $selectedColors = explode(',', $filters['color']);
            if (!in_array($product['color'], $selectedColors)) {
                return false;
            }
        }
        if (!empty($filters['size']) && !in_array($filters['size'], $product['sizes'])) {
            return false;
        }
        return true;
    });
}

$appliedFilters = [
    'type' => $_GET['type'] ?? null,
    'price' => $_GET['price'] ?? null,
    'color' => $_GET['color'] ?? null,
    'size' => $_GET['size'] ?? null
];

$filteredProducts = filterProducts($products, $appliedFilters);

displayProducts($filteredProducts);

function displayProducts($products) {
    foreach ($products as $product_id => $product) {
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
?>