(function () {
  document.addEventListener("DOMContentLoaded", function () {
    // Inject the cart overlay HTML into the page if it's not already present
    if (!document.getElementById("cart-overlay")) {
      const cartOverlayHTML = `
      <div id="cart-overlay" class="cart-overlay">
        <div class="cart-overlay-content">
          <div class="cart-overlay-header">
            <h2>Your Cart</h2>
            <span class="cart-close-button" id="cart-close-button">&times;</span>
          </div>
          <div class="cart-body">
            <ul id="cart-items">
              <!-- Cart items will be dynamically added here -->
            </ul>
          </div>
          <div class="cart-footer">
            <button id="checkout-button">Proceed to Checkout</button>
            <button id="clear-cart-button">Clear Cart</button>
          </div>
        </div>
      </div>
      `;
      document.body.insertAdjacentHTML("beforeend", cartOverlayHTML);
    }

    const chatbot = document.getElementById("chatbot");
    const chatIcon = document.getElementById("chat-icon");
    const closeBtn = document.getElementById("close-btn");
    const userInput = document.getElementById("user-input");
    const sendBtn = document.getElementById("send-btn");
    const chatBody = document.querySelector(".chat-body");
    const cartButton =
      document.getElementById("cart-button") ||
      document.getElementById("cart-icon-button");
    const cartCloseButton = document.getElementById("cart-close-button");
    const increaseQty = document.getElementById("increaseQty");
    const decreaseQty = document.getElementById("decreaseQty");
    const popup = document.getElementById("newsletter-popup");
    const newsletterCloseBtn = document.querySelector(".newsletter-close-btn");

    // Chatbot functionality
    if (chatbot && chatIcon && closeBtn && userInput && sendBtn && chatBody) {
      chatbot.style.display = "none";

      chatIcon.addEventListener("click", function () {
        chatbot.style.display = "block";
        chatIcon.style.display = "none";
      });

      closeBtn.addEventListener("click", function () {
        chatbot.style.display = "none";
        chatIcon.style.display = "block";
      });

      sendBtn.addEventListener("click", function () {
        const inputText = userInput.value;

        if (inputText.trim() === "") {
          return;
        }

        chatBody.innerHTML = "";

        const userMessageDiv = document.createElement("div");
        userMessageDiv.className = "user-message";
        userMessageDiv.textContent = inputText;
        chatBody.appendChild(userMessageDiv);

        userInput.value = "";

        fetch("../components/chatbot.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: "userInput=" + encodeURIComponent(inputText),
        })
          .then((response) => response.json())
          .then((data) => {
            const botResponseDiv = document.createElement("div");
            botResponseDiv.className = "bot-response";
            botResponseDiv.textContent = data.response;
            chatBody.appendChild(botResponseDiv);
          })
          .catch((error) => {
            console.error("Error:", error);
          });
      });
    }

    // Cart overlay functionality
    let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

    function updateCartOverlay() {
      const cartItemsContainer = document.getElementById("cart-items");
      if (!cartItemsContainer) return; // Exit if cart overlay is not present

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

      // Update cart item count (optional)
      const cartItemCount = document.getElementById("cart-item-count");
      if (cartItemCount) {
        const totalItems = cartItems.reduce(
          (sum, item) => sum + item.quantity,
          0
        );
        cartItemCount.textContent = totalItems;
      }
    }

    // Expose updateCartOverlay globally so it can be called from productpage.js
    window.updateCartOverlay = updateCartOverlay;

    // Update the cart overlay on page load
    updateCartOverlay();

    // Event listener for cart button to open the cart overlay
    if (cartButton) {
      cartButton.addEventListener("click", function () {
        updateCartOverlay();
        document.getElementById("cart-overlay").style.display = "block";
      });
    }

    // Event listener for cart close button
    if (cartCloseButton) {
      cartCloseButton.addEventListener("click", function () {
        document.getElementById("cart-overlay").style.display = "none";
      });
    }

    // Event listener for the checkout button
    const checkoutButton = document.getElementById("checkout-button");
    if (checkoutButton) {
      checkoutButton.addEventListener("click", function () {
        alert("Proceeding to checkout (demo functionality).");
      });
    }

    // Event listener for the clear cart button
    const clearCartButton = document.getElementById("clear-cart-button");
    if (clearCartButton) {
      clearCartButton.addEventListener("click", function () {
        cartItems = [];
        localStorage.removeItem("cartItems");
        updateCartOverlay();
      });
    }

    // Increase/decrease quantity functionality
    if (increaseQty && decreaseQty) {
      increaseQty.addEventListener("click", function () {
        let quantityDisplay = document.getElementById("quantityDisplay");
        let quantity = parseInt(quantityDisplay.textContent);
        quantityDisplay.textContent = quantity + 1;
        document.getElementById("productQuantity").value = quantity + 1;
      });

      decreaseQty.addEventListener("click", function () {
        let quantityDisplay = document.getElementById("quantityDisplay");
        let quantity = parseInt(quantityDisplay.textContent);
        if (quantity > 1) {
          quantityDisplay.textContent = quantity - 1;
          document.getElementById("productQuantity").value = quantity - 1;
        }
      });
    }

    // Newsletter popup functionality
    if (popup && newsletterCloseBtn) {
      popup.style.display = "flex";

      newsletterCloseBtn.addEventListener("click", function () {
        popup.style.display = "none";
      });
    }
  });
})();
