document.addEventListener("DOMContentLoaded", function () {
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

  adjustImageContainers();
  window.addEventListener("resize", adjustImageContainers);

  // Function to adjust preview images dynamically
  function adjustPreviewImages() {
    const previewImages = document.querySelectorAll(
      ".productPreviewImages img"
    );

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

  adjustPreviewImages();
  window.addEventListener("resize", adjustPreviewImages);

  // Function to update the main image and highlight the selected preview
  function updateMainImage() {
    const previewImages = document.querySelectorAll(
      ".productPreviewImages img"
    );
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

  updateMainImage();

  // Handle color selection
  function handleColorSelection() {
    const colorOptions = document.querySelectorAll(".colorOption");

    const urlParams = new URLSearchParams(window.location.search);
    const startProductId = parseInt(urlParams.get("product_id")) || 1;
    let selectedColor = urlParams.get("color");

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
        currentIndex === -1 ||
        currentIndex === colorProductMap[color].length - 1
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

      if (defaultColor) {
        const defaultOption = document.querySelector(
          `.colorOption[data-color="${defaultColor}"]`
        );
        if (defaultOption) {
          defaultOption.classList.add("selected");
          // Update the URL with the default color without reloading the page
          urlParams.set("color", defaultColor);
          const newUrl =
            window.location.protocol +
            "//" +
            window.location.host +
            window.location.pathname +
            "?" +
            urlParams.toString();
          window.history.replaceState({ path: newUrl }, "", newUrl);
        }
      }
    }
  }

  handleColorSelection();

  // Handle size selection and cart functionality
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
      const urlParams = new URLSearchParams(window.location.search);
      const productId = urlParams.get("product_id");
      const color = urlParams.get("color");

      // Get product details from the page
      const productName = document.querySelector(".productInfo h2").textContent;
      const productImage = document.querySelector(".mainProductImage img").src;

      // Extract and parse the price
      const priceElement = document.querySelector(".reducedPrice");
      let priceText = priceElement ? priceElement.textContent : "0";
      // Remove any non-numeric characters (like currency symbols) and parse to float
      let price = parseFloat(
        priceText.replace(/[^0-9.,]/g, "").replace(",", ".")
      );
      if (isNaN(price)) {
        price = 0; // Default to 0 if price is invalid
        console.error("Invalid price detected for product:", productName);
      }

      // Create cart item object
      const item = {
        productId,
        productName,
        productImage,
        quantity,
        size: selectedSize,
        color,
        price, // Include the price as a number
      };

      // Add item to cart using function from components.js
      addItemToCart(item);

      // Reset quantity to 1
      quantity = 1;
      quantityDisplay.textContent = quantity;

      // Show the cart overlay
      document.getElementById("cart-overlay").style.display = "block";
    } else {
      alert("Please select a size.");
    }
  });
});
