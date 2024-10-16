<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" href="../assets/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../styles/styles.css" type="text/css">
</head>
<body>
    <div class="layout">
    <aside class="sidebar">
        <div class="sidebar__filters">
            <h2 class="sidebar__title">Filters</h2>
            <hr class="sidebar__divider"/>
            <div class="sidebar__filter-group">
                <button class="sidebar__filter-item">Casual Socks</button>
                <button class="sidebar__filter-item">Dress Socks</button>
                <button class="sidebar__filter-item">Athletic Socks</button>
            </div>
            <hr class="sidebar__divider"/>
            <div class="sidebar__filter-group">
                <h3 class="sidebar__subtitle">Price</h3>
                <input type="range" min="4" max="20" value="4" class="sidebar__price-slider" id="priceSlider">
                <div class="sidebar__price-range">
                    <span>€4</span>
                    <span>€20+</span>
                </div>
            </div>
            <hr class="sidebar__divider"/>
            <div class="sidebar__filter-group">
                <h3 class="sidebar__subtitle">Colors</h3>
                <div class="sidebar__color-grid">
                    <button class="sidebar__color-button" style="background: linear-gradient(to right, red, yellow, green, blue);"></button>
                    <button class="sidebar__color-button" style="background-color: green;"></button>
                    <button class="sidebar__color-button" style="background-color: yellow;"></button>
                    <button class="sidebar__color-button" style="background-color: red"></button>
                    <button class="sidebar__color-button" style="background-color: blue;"></button>
                    <button class="sidebar__color-button" style="background-color: pink;"></button>
                    <button class="sidebar__color-button" style="background-color: purple;"></button>
                    <button class="sidebar__color-button" style="background-color: orange;"></button>
                    <button class="sidebar__color-button" style="background-color: cyan;"></button>
                    <button class="sidebar__color-button" style="background-color: lime;"></button>
                </div>
            </div>
            <hr class="sidebar__divider"/>
            <div class="sidebar__filter-group">
                <h3 class="sidebar__subtitle">Size</h3>
                <div class="sidebar__size-buttons">
                    <button class="sidebar__size-button">37-40</button>
                    <button class="sidebar__size-button">41-44</button>
                    <button class="sidebar__size-button">45+</button>
                </div>
            </div>
            <hr class="sidebar__divider"/>
            <button class="sidebar__apply-button">Apply Filter</button>
        </div>
    </aside>
        <main class="main-content" id="main-content">
            <h1 class="main-content__title">BRIGHT DEALS, BOLD SOCKS</h1>
            <div class="product-grid" id="product-grid">
            </div>
        </main>
    </div>
    <script src="../js/store-page.js"></script>
</body>
</html>
