const colors = [
    '#1e407a',
    '#51b2a2',
    '#e990b9',
    '#f15b39',
    '#fecd3e'
];

function getRandomColor() {
    const randomIndex = Math.floor(Math.random() * colors.length);
    return colors[randomIndex];
}

function setRandomColors() {
    const header = document.querySelector('header');
    const footer = document.querySelector('footer');

    header.style.backgroundColor = getRandomColor();
    footer.style.backgroundColor = getRandomColor();
}

window.onload = setRandomColors;