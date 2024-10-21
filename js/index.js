const colors = [
  "var(--color-blue)",
  "var(--color-orange)",
  "var(--color-yellow)",
  "var(--color-green)",
  "var(--color-pink)",
];

const images = [
  "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_blue.webp",
  "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_red.webp",
  "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_yellow.webp",
  "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_green.webp",
  "../assets/images/sunny_socks_photos/catalogus/Sunny_socks_pink_01.webp",
];

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
      let background = document.getElementById("color-wheel");

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
  await Promise.all(promises);
};

const initializeColorWheel = () => {
  let colorWheel = {
    $id: "pie1",
    radius: 200,
    segments: [
      { value: 1, color: colors[0] },
      { value: 1, color: colors[1] },
      { value: 1, color: colors[2] },
      { value: 1, color: colors[3] },
      { value: 1, color: colors[4] },
    ],
  };

  pie(colorWheel);

  const blueSegment = document.querySelectorAll(".segment")[0];

  if (blueSegment) {
    const event = new Event("click");
    blueSegment.dispatchEvent(event);
  }
};

document.addEventListener("DOMContentLoaded", async () => {
  await preloadImages(images);
  initializeColorWheel();
});
