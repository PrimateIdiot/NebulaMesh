gsap.registerPlugin(ScrollTrigger);

var bodyWidth = document.body.clientWidth;
var bodyHeight = document.body.clientHeight;

document.addEventListener("DOMContentLoaded", function() {
    var movingBackground = document.querySelector('.moving-background');
    var movingBackground2 = document.querySelector('.moving-background');
    movingBackground.style.height = bodyHeight + "px";
    movingBackground2.style.height = bodyHeight + "px";

    TweenLite.to(".moving-background", 1000, { backgroundPosition: "-2000px 0px", ease: "none" });
    TweenLite.to(".moving-background2", 1000, { backgroundPosition: "-10000px 0px", ease: "none" });

    const containers = document.querySelectorAll('.container');

    function setupContainerAnimations(container) {
        const glass = container.querySelector('.glass');
        const image = container.querySelector('a img');
        const text = container.querySelector('p');

        const tl = gsap.timeline({ paused: true });

        tl.to(glass, { duration: 0.3, backdropFilter: 'blur(0px)', ease: 'power3.out' })
            .to(image, { duration: 0.3, scale: 0.8, ease: 'power3.inOut' }, '<')
            .to(image, { duration: 0.3, y: '-60px', ease: 'power3.inOut' }, )
            .from(text, { duration: 0.3, y: '100%', opacity: 0, ease: 'power3.inOut' }, '<');

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