var bodyWidth = document.body.clientWidth;
var bodyHeight = document.body.clientHeight;

document.addEventListener("DOMContentLoaded", function() {

    var movingBackground = document.querySelector('.moving-background');
    movingBackground.style.height = bodyHeight + "px";

    TweenLite.to(".moving-background", 1000, { backgroundPosition: "-10000px 0px", ease: "none" });

    const containers = document.querySelectorAll('.image-container');

    function setupContainerAnimations(container) {
        const image = container.querySelector('img');
        const materialName = container.querySelector('h2');
        const userName = container.querySelector('h3');

        const tl = gsap.timeline({ paused: true });

        tl
            .to(image, { duration: 0.3, scale: 1.3, ease: 'power3.inout' })
            .from(materialName, { duration: 0.3, y: '100', opacity: 0, ease: 'power3.inout' }, '<')
            .from(userName, { duration: 0.3, y: '-100', opacity: 0, ease: 'power3.inout' }, '<');

        image.addEventListener('mouseenter', () => {
            tl.play();
        });

        image.addEventListener('mouseleave', () => {
            tl.reverse();
        });
    }

    containers.forEach(container => {
        setupContainerAnimations(container);
    });
});