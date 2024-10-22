let selectedFilters = {};
let currentStoreType = "classic";
let selectedColors = [];

const loadStore = (storeType, filters = {}) => {
  currentStoreType = storeType;
  const filterParams = new URLSearchParams(filters);
  filterParams.append("storeType", storeType);

  fetch(`store_content/functions.php?${filterParams.toString()}`)
    .then(response => response.text())
    .then(html => {
      document.getElementById("product-grid").innerHTML = html;
      document.body.style.backgroundImage = `url('../assets/images/sunny_illustrations/png/background-${storeType === "seasonal" ? "seasonal" : "socks"}.png')`;
      document.querySelector(".sidebar").style.backgroundColor = `var(--color-${storeType === "seasonal" ? "purple" : "blue"})`;
    })
    .catch(error => console.error('Error loading store:', error));
};

const updateButtonStates = () => {
  document.querySelectorAll(".sidebar__filter-item, .sidebar__size-button").forEach(button => {
    const { filter, value } = button.dataset;
    button.classList.toggle("selected", selectedFilters[filter] === value);
  });

  document.querySelectorAll(".sidebar__color-button").forEach(button => {
    const { value } = button.dataset;
    button.style.border = selectedColors.includes(value) ? "2px solid white" : "none";
  });
};

const handleFilterClick = (element, isColorFilter = false) => {
  const { filter, value } = element.dataset;
  
  if (isColorFilter) {
    const index = selectedColors.indexOf(value);
    if (index > -1) {
      selectedColors.splice(index, 1);
    } else {
      selectedColors.push(value);
    }
  } else {
    if (selectedFilters[filter] === value) {
      delete selectedFilters[filter];
    } else {
      selectedFilters[filter] = value;
    }
  }

  updateButtonStates();
};

document.addEventListener("DOMContentLoaded", () => {
  const urlParams = new URLSearchParams(window.location.search);
  currentStoreType = urlParams.get("storeType") || "classic";

  document.querySelectorAll(".sidebar__filter-item, .sidebar__size-button").forEach(button => {
    button.addEventListener("click", () => handleFilterClick(button));
  });

  document.querySelectorAll(".sidebar__color-button").forEach(button => {
    button.addEventListener("click", () => handleFilterClick(button, true));
  });

  const priceSlider = document.getElementById("priceSlider");
  const priceMin = document.getElementById("priceMin");

  priceSlider.addEventListener("input", function() {
    priceMin.textContent = `€${this.value}`;
    selectedFilters["price"] = `${this.value}-20`;
  });

  document.getElementById("applyFilters").addEventListener("click", () => {
    if (selectedColors.length > 0) {
      selectedFilters["color"] = selectedColors.join(",");
    } else {
      delete selectedFilters["color"];
    }
    loadStore(currentStoreType, selectedFilters);
  });

  loadStore(currentStoreType);
});