const colors = [
    'var(--color-blue)',
    'var(--color-orange)',
    'var(--color-yellow)',
    'var(--color-green)',
    'var(--color-pink)'
];
      
const numberOfSegments = colors.length;
const circle = document.getElementById('circle');
const segmentAngle = 360 / numberOfSegments;
let currentRotation = 0;
      
colors.forEach((color, index) => {
    const segment = document.createElement('div');
    segment.classList.add('segment');
    segment.style.backgroundColor = color;
    segment.style.transform = `rotate(${index * segmentAngle - 18}deg)`;
    circle.appendChild(segment);

    segment.addEventListener('click', () => {
        const targetRotation = (index * segmentAngle * -1) + 36;

        currentRotation += targetRotation - currentRotation;
        circle.style.transition = 'transform 1s ease'; 
        circle.style.transform = `rotate(${currentRotation}deg)`;
    });
});

const innerCircle = document.createElement('div');
innerCircle.style.position = 'absolute';
innerCircle.style.top = '15%';
innerCircle.style.left = '15%';
innerCircle.style.width = '70%';
innerCircle.style.height = '70%';
innerCircle.style.backgroundColor = 'var(--color-orange)';
innerCircle.style.borderRadius = '50%';
innerCircle.style.zIndex = '2';
circle.appendChild(innerCircle);