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
        chatbot.style.display = "flex";
        chatIcon.style.display = "none";
      });

      closeBtn.addEventListener("click", function () {
        chatbot.style.display = "none";
        chatIcon.style.display = "block";
      });

      sendBtn.addEventListener("click", function () {
        const inputText = userInput.value.trim();

        if (inputText === "") {
          return;
        }

        // Append user message
        const userMessageDiv = document.createElement("div");
        userMessageDiv.className = "user-message";
        userMessageDiv.textContent = inputText;
        chatBody.appendChild(userMessageDiv);

        userInput.value = "";

        // Scroll to the bottom of the chat
        chatBody.scrollTop = chatBody.scrollHeight;

        // Get the chatbot endpoint from data attribute
        const chatbotEndpoint = chatbot.getAttribute("data-chatbot-endpoint");

        fetch(chatbotEndpoint, {
          // Use dynamic endpoint
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: "userInput=" + encodeURIComponent(inputText) + "&chatbot=true", // Add a parameter to distinguish chatbot requests
        })
          .then((response) => {
            if (!response.ok) {
              throw new Error("Network response was not ok");
            }
            return response.json();
          })
          .then((data) => {
            const botResponseDiv = document.createElement("div");
            botResponseDiv.className = "bot-response";
            botResponseDiv.textContent = data.response;
            chatBody.appendChild(botResponseDiv);

            // Scroll to the bottom of the chat
            chatBody.scrollTop = chatBody.scrollHeight;
          })
          .catch((error) => {
            console.error("Error:", error);
            const errorDiv = document.createElement("div");
            errorDiv.className = "bot-response";
            errorDiv.textContent =
              "Sorry, something went wrong. Please try again later.";
            chatBody.appendChild(errorDiv);

            // Scroll to the bottom of the chat
            chatBody.scrollTop = chatBody.scrollHeight;
          });
      });

      userInput.addEventListener("keypress", function (e) {
        if (e.key === "Enter") {
          sendBtn.click();
        }
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

      // Update cart item count
      const cartItemCount = document.getElementById("cart-item-count");
      if (cartItemCount) {
        const totalItems = cartItems.reduce(
          (sum, item) => sum + item.quantity,
          0
        );
        cartItemCount.textContent = totalItems;
      }
    }

    // Expose updateCartOverlay globally so it can be called from other scripts
    window.updateCartOverlay = updateCartOverlay;

    // Function to add an item to the cart
    function addItemToCart(item) {
      // Ensure that the price is a number
      const price = parseFloat(item.price);
      if (isNaN(price)) {
        console.error("Invalid price for item:", item);
        return;
      }

      // Check if the item already exists in the cart
      const existingItemIndex = cartItems.findIndex(
        (cartItem) =>
          cartItem.productId === item.productId &&
          cartItem.size === item.size &&
          cartItem.color === item.color
      );

      if (existingItemIndex >= 0) {
        // If item exists, update the quantity
        cartItems[existingItemIndex].quantity += item.quantity;
      } else {
        // If item doesn't exist, add it to the cart with the price
        cartItems.push({
          ...item,
          price: price, // Ensure price is a number
        });
      }

      // Save cart items to localStorage
      localStorage.setItem("cartItems", JSON.stringify(cartItems));

      // Update the cart overlay
      updateCartOverlay();
    }

    // Expose addItemToCart globally so it can be called from other scripts
    window.addItemToCart = addItemToCart;

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
        // Check if the current page is index.php
        if (window.location.pathname.endsWith("index.php")) {
          // Redirect to the cart page within the pages directory
          window.location.href = "pages/cart-page.php";
        } else {
          // Redirect to the cart page
          window.location.href = "cart-page.php";
        }
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
