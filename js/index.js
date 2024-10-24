let selectedFilters = {};
let currentStoreType = "classic";
let selectedColors = [];

const images = [
  "assets/images/sunny_socks_photos/catalogus/Sunny_socks_blue.webp",
  "assets/images/sunny_socks_photos/catalogus/Sunny_socks_red.webp",
  "assets/images/sunny_socks_photos/catalogus/Sunny_socks_yellow.webp",
  "assets/images/sunny_socks_photos/catalogus/Sunny_socks_green.webp",
  "assets/images/sunny_socks_photos/catalogus/Sunny_socks_pink_01.webp",
];

const carouselProducts = document.getElementById("carousel-products");
const prevBtnProducts = document.getElementById("products-prevBtn");
const nextBtnProducts = document.getElementById("products-nextBtn");

const carouselReviews = document.getElementById("carousel-reviews");
const prevBtnReviews = document.getElementById("reviews-prevBtn");
const nextBtnReviews = document.getElementById("reviews-nextBtn");

const scrollStepProducts = 1140;
const scrollStepReviews = 1120;

prevBtnProducts.addEventListener("click", () => {
  carouselProducts.scrollBy({ left: -scrollStepProducts });
});

nextBtnProducts.addEventListener("click", () => {
  carouselProducts.scrollBy({ left: scrollStepProducts });
});

prevBtnReviews.addEventListener("click", () => {
  carouselReviews.scrollBy({ left: -scrollStepReviews });
});

nextBtnReviews.addEventListener("click", () => {
  carouselReviews.scrollBy({ left: scrollStepReviews });
});

let makeSVG = (tag, attrs) => {
  let el = document.createElementNS("http://www.w3.org/2000/svg", tag);
  for (let k in attrs) {
    el.setAttribute(k, attrs[k]);
  }
  return el;
};

let pie = (data) => {
  const svgElement = document.getElementById(data.$id);
  svgElement.setAttribute("width", 2 * data.radius);
  svgElement.setAttribute("height", 2 * data.radius);

  let sum = data.segments.reduce((acc, seg) => acc + seg.value, 0);
  let radius = data.radius;

  let startAngle = 0,
    endAngle = 0;
  let segmentAngle = 360 / data.segments.length;

  let currentRotation = 0;
  let innerCircle;

  for (let i = 0; i < data.segments.length; i++) {
    let element = data.segments[i];
    let angle = (element.value * 2 * Math.PI) / sum;
    endAngle += angle;

    let pathStr =
      "M " +
      radius +
      "," +
      radius +
      " " +
      "L " +
      (Math.cos(startAngle) * radius + radius) +
      "," +
      (Math.sin(startAngle) * radius + radius) +
      " " +
      "A " +
      radius +
      "," +
      radius +
      " 0 " +
      (angle < Math.PI ? "0" : "1") +
      " 1 " +
      (Math.cos(endAngle) * radius + radius) +
      "," +
      (Math.sin(endAngle) * radius + radius) +
      " " +
      "Z";

    let svgPath = makeSVG("path", {
      d: pathStr,
      fill: element.color,
      class: "segment",
    });
    svgElement.appendChild(svgPath);

    svgPath.addEventListener("click", () => {
      let background = document.getElementById("color-wheel-background");

      background.style.backgroundColor = element.color;
      innerCircle.setAttribute("fill", element.color);

      const targetRotation = -(i * segmentAngle) - 126;
      currentRotation = targetRotation;

      svgElement.style.transition = "transform 1.5s ease-in-out";
      svgElement.style.transform = `rotate(${currentRotation}deg)`;

      const imgElement = document.querySelector(".inner-image");

      if (imgElement.src !== images[i]) {
        if (imgElement.complete) {
          imgElement.src = images[i];
        } else {
          const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
              imgElement.src = images[i];
              observer.disconnect();
            }
          });
          observer.observe(imgElement);
        }
      }
    });

    startAngle += angle;
  }

  innerCircle = makeSVG("circle", {
    cx: radius,
    cy: radius,
    r: radius * 0.8,
    fill: colors[0],
  });
  svgElement.appendChild(innerCircle);
};

const preloadImages = async (imageArray) => {
  const promises = imageArray.map((src) => {
    const img = new Image();
    img.src = src;
    return new Promise((resolve, reject) => {
      img.onload = resolve;
      img.onerror = reject;
    });
  });
};

const handleFilterClick = (element, isColorFilter = false) => {
  const { filter, value } = element.dataset;
 
  if (isColorFilter) {
    const index = selectedColors.indexOf(value);
    if (index > -1) {
      selectedColors.splice(index, 1);
    } else {
      selectedColors.push(value);
    }
  } else {
    if (selectedFilters[filter] === value) {
      delete selectedFilters[filter];
    } else {
      selectedFilters[filter] = value;
    }
  }
  updateButtonStates();
};

document.addEventListener("DOMContentLoaded", () => {
  const urlParams = new URLSearchParams(window.location.search);
  currentStoreType = urlParams.get("storeType") || "classic";
  
  document.querySelectorAll(".filter-panel__category-btn, .filter-panel__size-btn").forEach(button => {
    button.addEventListener("click", () => handleFilterClick(button));
  });
  
  document.querySelectorAll(".filter-panel__color-btn").forEach(button => {
    button.addEventListener("click", () => handleFilterClick(button, true));
  });

  const priceSlider = document.getElementById("priceSlider");
  const priceMin = document.getElementById("priceMin");
  
  priceSlider.addEventListener("input", function() {
    priceMin.textContent = `€${this.value}`;
    selectedFilters["price"] = `${this.value}-20`;
  });

  document.getElementById("applyFilters").addEventListener("click", () => {
    if (selectedColors.length > 0) {
      selectedFilters["color"] = selectedColors.join(",");
    } else {
      delete selectedFilters["color"];
    }
    loadStore(currentStoreType, selectedFilters);
  });

  loadStore(currentStoreType);
});