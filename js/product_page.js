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
      const defaultOption = document.querySelector(
        `.colorOption[data-color="${defaultColor}"]`
      );
      if (defaultOption) {
        defaultOption.classList.add("selected");
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

  // Load cart items from localStorage or initialize as empty array
  let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

  // Update the cart overlay on page load
  updateCartOverlay();

  // Handle Add to Cart button click
  addToCartButton.addEventListener("click", function () {
    if (selectedSize) {
      const productId = new URLSearchParams(window.location.search).get(
        "product_id"
      );
      const color = new URLSearchParams(window.location.search).get("color");

      // Get product details from the page
      const productName = document.querySelector(".productInfo h2").textContent;
      const productImage = document.querySelector(".mainProductImage img").src;

      // Create cart item object
      const item = {
        productId,
        productName,
        productImage,
        quantity,
        size: selectedSize,
        color,
      };

      // Check if the item already exists in the cart
      const existingItemIndex = cartItems.findIndex(
        (cartItem) =>
          cartItem.productId === item.productId &&
          cartItem.size === item.size &&
          cartItem.color === item.color
      );

      if (existingItemIndex >= 0) {
        // If item exists, update the quantity
        cartItems[existingItemIndex].quantity += quantity;
      } else {
        // If item doesn't exist, add it to the cart
        cartItems.push(item);
      }

      // Save cart items to localStorage
      localStorage.setItem("cartItems", JSON.stringify(cartItems));

      // Update the cart overlay
      updateCartOverlay();

      // Show the cart overlay
      document.getElementById("cart-overlay").style.display = "block";

      // Reset quantity to 1
      quantity = 1;
      quantityDisplay.textContent = quantity;
    } else {
      alert("Please select a size.");
    }
  });

  // Function to update the cart overlay content
  function updateCartOverlay() {
    const cartItemsContainer = document.getElementById("cart-items");
    cartItemsContainer.innerHTML = "";

    if (cartItems.length > 0) {
      cartItems.forEach((item) => {
        const cartItem = document.createElement("li");
        cartItem.classList.add("cart-item");

        cartItem.innerHTML = `
          <img src="${item.productImage}" alt="${item.productName}" class="cart-item-image">
          <div class="cart-item-details">
            <span class="cart-item-name">${item.productName}</span>
            <span class="cart-item-size">Size: ${item.size}</span>
            <span class="cart-item-quantity">Quantity: ${item.quantity}</span>
          </div>
        `;
        cartItemsContainer.appendChild(cartItem);
      });
    } else {
      cartItemsContainer.innerHTML =
        '<li id="cart-empty">Your cart is empty.</li>';
    }

    // Attach event listener to close button
    const cartCloseButton = document.getElementById("cart-close-button");
    cartCloseButton.addEventListener("click", function () {
      document.getElementById("cart-overlay").style.display = "none";
    });
  }

  const clearCartButton = document.getElementById("clear-cart-button");
  clearCartButton.addEventListener("click", function () {
    // Clear cart items and localStorage
    cartItems = [];
    localStorage.removeItem("cartItems");
    updateCartOverlay();
  });
});
