//Product Info

// Button - Green
function Gdecrease() {
    let input = document.getElementById('sock1');
    if (parseInt(input.value) > 0) {
        input.value = parseInt(input.value) - 1;
    }
}

function Gincrease() {
    let input = document.getElementById('sock1');
    input.value = parseInt(input.value) + 1;
}

// Button - Yellow
function Ydecrease() {
    let input = document.getElementById('sock2');
    if (parseInt(input.value) > 0) {
        input.value = parseInt(input.value) - 1;
    }
}

function Yincrease() {
    let input = document.getElementById('sock2');
    input.value = parseInt(input.value) + 1;
}

// Button - Pink
function Pdecrease() {
    let input = document.getElementById('sock3');
    if (parseInt(input.value) > 0) {
        input.value = parseInt(input.value) - 1;
    }
}

function Pincrease() {
    let input = document.getElementById('sock3');
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


//Payment Options

document.querySelectorAll(".CO-img-radio").forEach(function (image) {
    image.addEventListener("click", function () {
        document.querySelectorAll(".CO-img-radio").forEach(function (img) {
            img.classList.remove("selected");
        });

        image.classList.add("selected");

        const selectedValue = image.previousElementSibling.value;

        document.getElementById("result").textContent = "Selected Option: " + selectedValue;
    });
});
