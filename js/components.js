document.addEventListener("DOMContentLoaded", function () {
  const chatbot = document.getElementById("chatbot");
  const chatIcon = document.getElementById("chat-icon");
  const closeBtn = document.getElementById("close-btn");
  const userInput = document.getElementById("user-input");
  const sendBtn = document.getElementById("send-btn");
  const chatBody = document.querySelector(".chat-body");
  const cartButton = document.getElementById("cart-button");
  const cartCloseButton = document.getElementById("cart-close-button");
  const increaseQty = document.getElementById("increaseQty");
  const decreaseQty = document.getElementById("decreaseQty");
  const popup = document.getElementById("newsletter-popup");
  const newsletterCloseBtn = document.querySelector(".newsletter-close-btn");

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

  if (cartButton && cartCloseButton) {
    cartButton.addEventListener("click", function () {
      document.getElementById("cart-overlay").style.display = "block";
    });

    cartCloseButton.addEventListener("click", function () {
      document.getElementById("cart-overlay").style.display = "none";
    });
  }

  if (increaseQty && decreaseQty) {
    document
      .getElementById("increaseQty")
      .addEventListener("click", function () {
        let quantityDisplay = document.getElementById("quantityDisplay");
        let quantity = parseInt(quantityDisplay.textContent);
        quantityDisplay.textContent = quantity + 1;
        document.getElementById("productQuantity").value = quantity + 1;
      });

    document
      .getElementById("decreaseQty")
      .addEventListener("click", function () {
        let quantityDisplay = document.getElementById("quantityDisplay");
        let quantity = parseInt(quantityDisplay.textContent);
        if (quantity > 1) {
          quantityDisplay.textContent = quantity - 1;
          document.getElementById("productQuantity").value = quantity - 1;
        }
      });
  }

  if (popup && newsletterCloseBtn) {
    popup.style.display = "flex";

    newsletterCloseBtn.addEventListener("click", function () {
      popup.style.display = "none";
    });
  }
});
