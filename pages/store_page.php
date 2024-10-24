<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Store</title>
  <link rel="stylesheet" href="../assets/css/normalize.css" type="text/css" />
  <link rel="stylesheet" href="../styles/styles.css" type="text/css" />
  <link rel="stylesheet" href="../styles/components.css" type="text/css">
</head>

<body id="sock-store">
  <div class="sock-store__layout">
    <aside class="sock-store__filter-panel">
      <div class="filter-panel__container">
        <h2 class="filter-panel__main-title">Filters</h2>
        <hr class="filter-panel__divider" />
        <div class="filter-panel__group filter-panel__group--categories">
          <button
            class="filter-panel__category-btn"
            data-filter="type"
            data-value="Casual Socks">
            Casual Socks
          </button>
          <button
            class="filter-panel__category-btn"
            data-filter="type"
            data-value="Dress Socks">
            Dress Socks
          </button>
          <button
            class="filter-panel__category-btn"
            data-filter="type"
            data-value="Athletic Socks">
            Athletic Socks
          </button>
        </div>
        <hr class="filter-panel__divider" />
        <div class="filter-panel__group filter-panel__group--price">
          <h3 class="filter-panel__subtitle">Price</h3>
          <input
            type="range"
            min="4"
            max="20"
            value="4"
            class="filter-panel__price-slider"
            id="priceSlider" />
          <div class="filter-panel__price-range">
            <span id="priceMin">€4</span>
            <span id="priceMax">€20+</span>
          </div>
        </div>
        <hr class="filter-panel__divider" />
        <div class="filter-panel__group filter-panel__group--colors">
          <h3 class="filter-panel__subtitle">Colors</h3>
          <div class="filter-panel__color-grid">
            <button
              class="filter-panel__color-btn filter-panel__color-btn--green"
              data-filter="color"
              data-value="Green"></button>
            <button
              class="filter-panel__color-btn filter-panel__color-btn--yellow"
              data-filter="color"
              data-value="Yellow"></button>
            <button
              class="filter-panel__color-btn filter-panel__color-btn--red"
              data-filter="color"
              data-value="Red"></button>
            <button
              class="filter-panel__color-btn filter-panel__color-btn--blue"
              data-filter="color"
              data-value="Blue"></button>
            <button
              class="filter-panel__color-btn filter-panel__color-btn--pink"
              data-filter="color"
              data-value="Pink"></button>
          </div>
        </div>
        <hr class="filter-panel__divider" />
        <div class="filter-panel__group filter-panel__group--sizes">
          <h3 class="filter-panel__subtitle">Size</h3>
          <div class="filter-panel__size-container">
            <button
              class="filter-panel__size-btn"
              data-filter="size"
              data-value="37-40">
              37-40
            </button>
            <button
              class="filter-panel__size-btn"
              data-filter="size"
              data-value="41-44">
              41-44
            </button>
            <button
              class="filter-panel__size-btn"
              data-filter="size"
              data-value="45+">
              45+
            </button>
          </div>
        </div>
        <hr class="filter-panel__divider" />
        <button id="applyFilters" class="filter-panel__apply-btn">
          Apply Filter
        </button>
      </div>
    </aside>
    <main class="sock-store__product-section" id="main-content">
      <h1 class="product-section__title">BRIGHT DEALS, BOLD SOCKS</h1>
      <div class="product-section__grid" id="product-grid"></div>
    </main>
  </div>
  <? include '../components/chatbot.php'; ?>
</body>
<script src="../js/store-page.js"></script>
<script src="../js/components.js"></script>

</html>