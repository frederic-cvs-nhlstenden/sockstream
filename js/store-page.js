let selectedFilters = {};
let currentStoreType = "classic";
let selectedColors = [];

function loadStore(storeType, filters = {}) {
  currentStoreType = storeType;
  const xhr = new XMLHttpRequest();
  const filterParams = new URLSearchParams(filters);
  filterParams.append("storeType", storeType);
  xhr.open("GET", `store_content/filters.php?${filterParams.toString()}`, true);
  xhr.onload = function () {
    if (this.status === 200) {
      document.getElementById("product-grid").innerHTML = this.responseText;
      document.body.style.backgroundImage =
        storeType === "seasonal"
          ? "url('../assets/images/sunny_illustrations/png/background-seasonal.png')"
          : "url('../assets/images/sunny_illustrations/png/background-socks.png')";
      document.querySelector(".sidebar").style.backgroundColor =
        storeType === "seasonal"
          ? "var(--color-purple-100)"
          : "var(--color-blue-100)";
    }
  };
  xhr.send();
}

function updateButtonStates() {
  document
    .querySelectorAll(".sidebar__filter-item, .sidebar__size-button")
    .forEach((button) => {
      const filter = button.dataset.filter;
      const value = button.dataset.value;
      if (selectedFilters[filter] === value) {
        button.classList.add("selected");
      } else {
        button.classList.remove("selected");
      }
    });

  document.querySelectorAll(".sidebar__color-button").forEach((button) => {
    const value = button.dataset.value;
    if (selectedColors.includes(value)) {
      button.style.border = "2px solid white";
    } else {
      button.style.border = "none";
    }
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  currentStoreType = urlParams.get("storeType") || "classic";

  document
    .querySelectorAll(".sidebar__filter-item, .sidebar__size-button")
    .forEach((button) => {
      button.addEventListener("click", function () {
        const filter = this.dataset.filter;
        const value = this.dataset.value;
        if (selectedFilters[filter] === value) {
          delete selectedFilters[filter];
          this.classList.remove("selected");
        } else {
          selectedFilters[filter] = value;
          this.classList.add("selected");
        }
        updateButtonStates();
      });
    });

  document.querySelectorAll(".sidebar__color-button").forEach((button) => {
    button.addEventListener("click", function () {
      const value = this.dataset.value;
      const index = selectedColors.indexOf(value);
      if (index > -1) {
        selectedColors.splice(index, 1);
      } else {
        selectedColors.push(value);
      }
      updateButtonStates();
    });
  });

  const priceSlider = document.getElementById("priceSlider");
  const priceMin = document.getElementById("priceMin");
  const priceMax = document.getElementById("priceMax");
  priceSlider.addEventListener("input", function () {
    const value = this.value;
    priceMin.textContent = `€${value}`;
    selectedFilters["price"] = `${value}-20`;
  });

  document
    .getElementById("applyFilters")
    .addEventListener("click", function () {
      if (selectedColors.length > 0) {
        selectedFilters["color"] = selectedColors.join(",");
      } else {
        delete selectedFilters["color"];
      }
      loadStore(currentStoreType, selectedFilters);
    });

  loadStore(currentStoreType);
});
