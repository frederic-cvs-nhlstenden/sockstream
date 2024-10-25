function getQueryParams() {
    const params = new URLSearchParams(window.location.search);
    const items = [];
    let index = 1;
    while (params.has(`item${index}`)) {
        items.push({
            name: params.get(`item${index}`),
            image: params.get(`image${index}`),
            size: params.get(`size${index}`),
            quantity: params.get(`quantity${index}`)
        });
        index++;
    }
    return items;
}

document.addEventListener('DOMContentLoaded', function() {
    const items = getQueryParams();
    const itemsContainer = document.getElementById('checkout-items');
    items.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.innerHTML = `
            <div id="sock_cart">
                <img src="${item.image}" alt="${item.name} Image">
                <div id="sock_cart_info">
                    <h2>${item.name}</h2>
                    <p>Size: ${item.size}</p>
                    <h3>€6,75</h3>
                </div>
                <div id="sock_cart_buttons">
                    <div class="cart-product-action">
                        <button class="delete-button">🗑️</button>
                    </div>
                    <div class="up-num-input">
                        <button class="minus" onclick="Ydecrease()">-</button>
                        <input type="number" id="sock" value="${item.quantity}" min="0">
                        <button class="plus" onclick="Yincrease()">+</button>
                    </div>
                </div>
            </div>
        `;
        itemsContainer.appendChild(itemElement);
    });
});

 // Function to decrease the quantity
 function Ydecrease(button) {
    const inputField = button.nextElementSibling;
    let currentValue = parseInt(inputField.value, 10);
    if (currentValue > 0) {
        inputField.value = currentValue - 1;
    }
}

// Function to increase the quantity
function Yincrease(button) {
    const inputField = button.previousElementSibling;
    let currentValue = parseInt(inputField.value, 10);
    inputField.value = currentValue + 1;
}


document.addEventListener('DOMContentLoaded', function() {
    const minusButtons = document.querySelectorAll('.minus');
    const plusButtons = document.querySelectorAll('.plus');

    minusButtons.forEach(button => {
        button.addEventListener('click', function() {
            Ydecrease(this);
        });
    });

    plusButtons.forEach(button => {
        button.addEventListener('click', function() {
            Yincrease(this);
        });
    });
});

// Function to delete the sock_cart element
function deleteSockCart(button) {
    const sockCart = button.closest('#sock_cart');
    if (sockCart) {
        sockCart.remove();
    }
}


document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            deleteSockCart(this);
        });
    });
});

function sumSockValues() {
    // Get all input elements with the ID 'sock'
    const sockInputs = document.querySelectorAll('#sock');
    let total = 0;

    sockInputs.forEach(input => {
        total += parseInt(input.value) || 0; // 
    });

    // Display the total in the HTML
    document.getElementById('cart-subtotal').textContent = total;
}

//Checkout Button
document.getElementById("checkout-btn").addEventListener("click", function () {
    window.location.assign("checkout-page.php");
});
