// Function to adjust main image display dynamically
function adjustImageContainers() {
  const images = document.querySelectorAll(".mainProductImage img");

  images.forEach((image) => {
    const container = image.parentElement;
    const containerWidth = container.offsetWidth;
    const containerHeight = container.offsetHeight;

    const imageWidth = image.naturalWidth;
    const imageHeight = image.naturalHeight;

    const containerAspectRatio = containerWidth / containerHeight;
    const imageAspectRatio = imageWidth / imageHeight;

    if (imageAspectRatio > containerAspectRatio) {
      image.style.objectFit = "cover";
    } else {
      image.style.objectFit = "contain";
    }
  });
}

document.addEventListener("DOMContentLoaded", adjustImageContainers);

window.addEventListener("resize", adjustImageContainers);

// Function to adjust preview images dynamically
function adjustPreviewImages() {
  const previewImages = document.querySelectorAll(".productPreviewImages img");

  previewImages.forEach((image) => {
    const containerWidth = image.offsetWidth;
    const containerHeight = image.offsetHeight;

    const imageWidth = image.naturalWidth;
    const imageHeight = image.naturalHeight;

    const containerAspectRatio = containerWidth / containerHeight;
    const imageAspectRatio = imageWidth / imageHeight;

    if (imageAspectRatio > containerAspectRatio) {
      image.style.objectFit = "cover";
    } else {
      image.style.objectFit = "contain";
    }
  });
}

document.addEventListener("DOMContentLoaded", adjustPreviewImages);

window.addEventListener("resize", adjustPreviewImages);

// Function to update the main image and highlight the selected preview
function updateMainImage() {
  const previewImages = document.querySelectorAll(".productPreviewImages img");
  const mainImage = document.querySelector(".mainProductImage img");

  // Set the first preview image as the default main image
  if (previewImages.length > 0) {
    mainImage.src = previewImages[0].src;
    previewImages[0].classList.add("selected");
  }

  // Add event listeners to update the main image on click
  previewImages.forEach((preview) => {
    preview.addEventListener("click", function () {
      mainImage.src = this.src;

      // Remove 'selected' class from all preview images
      previewImages.forEach((img) => img.classList.remove("selected"));

      // Add 'selected' class to the clicked preview
      this.classList.add("selected");
    });
  });
}

// Call the function after DOM content has loaded
document.addEventListener("DOMContentLoaded", updateMainImage);

document.addEventListener("DOMContentLoaded", updateMainImage);

// Patch fix for selecting colors, not really feasible without DB implementation or overcomplicating our CMS
function handleColorSelection() {
  const colorOptions = document.querySelectorAll(".colorOption");

  const urlParams = new URLSearchParams(window.location.search);
  const startProductId = parseInt(urlParams.get("product_id")) || 1;
  const selectedColor = urlParams.get("color");

  const colorProductMap = {
    green: [1, 6],
    blue: [2, 7],
    pink: [3, 8],
    red: [4, 9],
    yellow: [5, 10],
  };

  colorOptions.forEach((colorOption) => {
    const color = colorOption.getAttribute("data-color");

    const currentIndex = colorProductMap[color].indexOf(startProductId);
    const nextProductId =
      currentIndex === -1 || currentIndex === colorProductMap[color].length - 1
        ? colorProductMap[color][0]
        : colorProductMap[color][currentIndex + 1];

    colorOption.setAttribute("data-product-id", nextProductId);

    colorOption.addEventListener("click", function () {
      window.location.href = `?product_id=${nextProductId}&color=${color}`;
    });
  });

  // Automatically select the color based on the current product and color in URL
  if (selectedColor) {
    const selectedOption = document.querySelector(
      `.colorOption[data-color="${selectedColor}"]`
    );
    if (selectedOption) {
      selectedOption.classList.add("selected");
    }
  } else {
    // If no color is selected in the URL, select the default color for the product
    const defaultColor = Object.keys(colorProductMap).find((color) =>
      colorProductMap[color].includes(startProductId)
    );
    const defaultOption = document.querySelector(
      `.colorOption[data-color="${defaultColor}"]`
    );
    if (defaultOption) {
      defaultOption.classList.add("selected");
    }
  }
}

document.addEventListener("DOMContentLoaded", () => {
  handleColorSelection();
});

document.addEventListener("DOMContentLoaded", function () {
  const sizeOptions = document.querySelectorAll(".sizeOption");

  // Function to handle size selection
  sizeOptions.forEach((option) => {
    option.addEventListener("click", function () {
      // Remove 'selected' class from all options
      sizeOptions.forEach((option) => option.classList.remove("selected"));

      // Add 'selected' class to the clicked option
      this.classList.add("selected");

      // Store the selected size for later use (like adding to cart)
      const selectedSize = this.getAttribute("data-size");

      // Log the selected size (for now, you can replace this with actual cart logic)
      console.log("Selected size:", selectedSize);

      // Example of building a cart URL with selected size
      const productId = new URLSearchParams(window.location.search).get(
        "product_id"
      );
      const color = new URLSearchParams(window.location.search).get("color");
      const cartUrl = `cart.php?product_id=${productId}&color=${color}&size=${selectedSize}`;

      console.log("Cart URL:", cartUrl);
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const sizeOptions = document.querySelectorAll(".sizeOption");
  const addToCartButton = document.getElementById("addToCartButton");
  const quantityDisplay = document.getElementById("quantityDisplay");
  let selectedSize = null;
  let quantity = 1;

  // Handle size selection
  sizeOptions.forEach((option) => {
    option.addEventListener("click", function () {
      sizeOptions.forEach((option) => option.classList.remove("selected"));
      this.classList.add("selected");
      selectedSize = this.getAttribute("data-size");
      addToCartButton.disabled = false;
    });
  });

  // Increase quantity
  document.getElementById("increaseQty").addEventListener("click", function () {
    quantity++;
    quantityDisplay.textContent = quantity;
  });

  // Decrease quantity
  document.getElementById("decreaseQty").addEventListener("click", function () {
    if (quantity > 1) {
      quantity--;
      quantityDisplay.textContent = quantity;
    }
  });

  // Handle Add to Cart button click
  addToCartButton.addEventListener("click", function () {
    if (selectedSize) {
      const productId = new URLSearchParams(window.location.search).get(
        "product_id"
      );
      const color = new URLSearchParams(window.location.search).get("color");
      const cartUrl = `cart.php?product_id=${productId}&color=${color}&size=${selectedSize}&quantity=${quantity}`;
      window.location.href = cartUrl;
    } else {
      alert("Please select a size.");
    }
  });
});
