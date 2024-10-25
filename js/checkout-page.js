document.addEventListener("DOMContentLoaded", function () {
  // Fetch cart items from localStorage
  let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

  const itemsContainer = document.getElementById("checkout-items");
  const cartSubtotalElem = document.getElementById("cart-subtotal");
  const cartDeliveryElem = document.getElementById("cart-delivery");
  const cartTotalElem = document.getElementById("cart-total");
  const promoCodeInput = document.getElementById("promo-code");

  // Function to format number as currency
  function formatCurrency(value) {
    return "€" + parseFloat(value).toFixed(2);
  }

  // Function to calculate and update totals
  function updateTotals() {
    let subtotal = 0;
    cartItems.forEach((item) => {
      const price = parseFloat(item.price);
      const quantity = parseInt(item.quantity, 10);
      if (isNaN(price)) {
        console.error(
          `Invalid price for item "${item.productName}". Setting price to 0.`
        );
        subtotal += 0;
      } else {
        subtotal += price * quantity;
      }
    });

    let delivery = 2.5; // Default delivery fee
    let deliveryText = formatCurrency(delivery);

    if (subtotal >= 25) {
      delivery = 0;
      deliveryText = "FREE";
    }

    let total = subtotal + delivery;

    // Check if a promo code is applied
    const promoCode = promoCodeInput.value.trim();
    if (promoCode === "DISCOUNT10") {
      total *= 0.9; // Apply 10% discount
    }

    cartSubtotalElem.textContent = formatCurrency(subtotal);
    cartDeliveryElem.textContent = deliveryText;
    cartTotalElem.textContent = formatCurrency(total);
  }

  // Function to render cart items
  function renderCartItems() {
    itemsContainer.innerHTML = ""; // Clear existing items

    if (cartItems.length === 0) {
      itemsContainer.innerHTML = '<li id="cart-empty">Your cart is empty.</li>';
      updateTotals();
      return;
    }

    cartItems.forEach((item, index) => {
      const price = parseFloat(item.price);
      const quantity = parseInt(item.quantity, 10);
      if (isNaN(price)) {
        console.error(
          `Invalid price for item "${item.productName}". Setting price to 0.`
        );
      }

      const itemPrice = isNaN(price) ? 0 : price;

      const itemElement = document.createElement("li");
      itemElement.classList.add("checkout-item");
      itemElement.innerHTML = `
                <div class="checkout-item-container">
                    <img src="${item.productImage}" alt="${
        item.productName
      }" class="checkout-item-image">
                    <div class="checkout-item-details">
                        <h3>${item.productName}</h3>
                        <p>Size: ${item.size}</p>
                        <p>Color: ${item.color}</p>
                        <p>Price: ${formatCurrency(itemPrice)}</p>
                        <!-- Removed Subtotal Display -->
                    </div>
                    <div class="checkout-item-actions">
                        <button class="cart-delete-button" data-index="${index}">🗑️</button>
                        <div class="up-num-input">
                            <button class="minus" data-index="${index}">-</button>
                            <input type="number" class="quantity-input" data-index="${index}" value="${quantity}" min="1">
                            <button class="plus" data-index="${index}">+</button>
                        </div>
                    </div>
                </div>
            `;
      itemsContainer.appendChild(itemElement);
    });

    updateTotals();
  }

  // Function to update cart in localStorage
  function updateLocalStorage() {
    localStorage.setItem("cartItems", JSON.stringify(cartItems));
  }

  // Event delegation for delete, minus, and plus buttons
  itemsContainer.addEventListener("click", function (event) {
    const target = event.target;
    const index = target.getAttribute("data-index");

    if (target.classList.contains("cart-delete-button")) {
      // Remove item from cart
      cartItems.splice(index, 1);
      updateLocalStorage();
      renderCartItems();
      // Update the cart overlay if the function is available
      if (window.updateCartOverlay) {
        window.updateCartOverlay();
      }
    }

    if (target.classList.contains("minus")) {
      // Decrease quantity
      if (cartItems[index].quantity > 1) {
        cartItems[index].quantity -= 1;
        updateLocalStorage();
        renderCartItems();
        if (window.updateCartOverlay) {
          window.updateCartOverlay();
        }
      }
    }

    if (target.classList.contains("plus")) {
      // Increase quantity
      cartItems[index].quantity += 1;
      updateLocalStorage();
      renderCartItems();
      if (window.updateCartOverlay) {
        window.updateCartOverlay();
      }
    }
  });

  // Event listener for manual quantity input changes
  itemsContainer.addEventListener("change", function (event) {
    const target = event.target;
    if (target.classList.contains("quantity-input")) {
      const index = target.getAttribute("data-index");
      let newQuantity = parseInt(target.value, 10);
      if (isNaN(newQuantity) || newQuantity < 1) {
        newQuantity = 1;
        target.value = newQuantity;
      }
      cartItems[index].quantity = newQuantity;
      updateLocalStorage();
      renderCartItems();
      if (window.updateCartOverlay) {
        window.updateCartOverlay();
      }
    }
  });

  // Promo Code Functionality
  window.applyPromo = function () {
    updateTotals();
  };

  // Initial rendering of cart items
  renderCartItems();
});
