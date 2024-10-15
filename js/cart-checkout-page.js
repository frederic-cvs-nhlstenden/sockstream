//CART:
// Button - Green
function decreaseg() {
    let input = document.getElementById('quantity1');
    if (parseInt(input.value) > 0) {
        input.value = parseInt(input.value) - 1;
    }
}

function increaseg() {
    let input = document.getElementById('quantity1');
    input.value = parseInt(input.value) + 1;
}

//Button - Yellow
function decreasey() {
    let input = document.getElementById('quantity2');
    if (parseInt(input.value) > 0) {
        input.value = parseInt(input.value) - 1;
    }
}

function increasey() {
    let input = document.getElementById('quantity2');
    input.value = parseInt(input.value) + 1;
}

//Button - Pink
function decreasep() {
    let input = document.getElementById('quantity3');
    if (parseInt(input.value) > 0) {
        input.value = parseInt(input.value) - 1;
    }
}

function increasep() {
    let input = document.getElementById('quantity3');
    input.value = parseInt(input.value) + 1;
}

// Promo Code
function applyPromo() {
    let promoCode = document.getElementById('promo-code').value;
    let totalElemenet = document.getElementById('cart-total');
    let subtotal = parseFloat(document.getElementById('cart-subtotal').textContent.replace('€', ''));
    let total = subtotal + 2.50; //just for testing purpose

    if (promoCode === 'DISCOUNT10') {
        total *= 0.90; //should apply 10% discount
    }

    totalElemenet.textContent = '€' + total.toFixed(2);
}

//Payment Method
document.querySelectorAll(".img-radio").forEach(function (image) {
    image.addEventListener("click", function () {
        document.querySelectorAll(".img-radio").forEach(function (img) {
            img.classList.remove("selected");
        });

        image.classList.add("selected");

        const selectedValue = image.previousElementSibling.value;

        document.getElementById("result").textContent = "Selected Option: " + selectedValue;
    });
});


//Checkout Button
document.getElementById("checkout-btn").addEventListener("click", function () {
    window.location.assign("checkout-page.html");
});

//CHECKOUT:
