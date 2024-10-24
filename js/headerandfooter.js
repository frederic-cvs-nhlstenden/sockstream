if (!window.hasLoadedRandomColorsScript) {
  window.hasLoadedRandomColorsScript = true;

  const hfcolors = ["#1e407a", "#51b2a2", "#e990b9", "#f15b39", "#fecd3e"];

  function getRandomColor() {
    const randomIndex = Math.floor(Math.random() * hfcolors.length);
    return hfcolors[randomIndex];
  }

  function setRandomColors() {
    const header = document.querySelector("header");
    const footer = document.querySelector("footer");

    if (header) {
      header.style.backgroundColor = getRandomColor();
    }

    if (footer) {
      footer.style.backgroundColor = getRandomColor();
    }
  }

  window.onload = setRandomColors;
}