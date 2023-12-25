var bodyWidth = document.body.clientWidth;
var bodyHeight = document.body.clientHeight;

document.addEventListener("DOMContentLoaded", function() {

    var myModel = document.querySelector(".modal-content");
    var imageContainers = document.querySelectorAll('.image-container');
    var textureName = document.querySelector("#textureName");
    var modelImage = document.querySelector("#modalImage");
    var ratioBox = document.querySelector(".ratio-box");
    var ratioBoxBox = document.querySelector(".radioBoxBox");
    var close = document.querySelector(".close");


    const tl2 = gsap.timeline({ paused: true });

    tl2
        .from(myModel, { duration: 0.3, scale: 0, ease: 'power3.inout' })
        .from(textureName, { duration: 0.4, x: 100, opacity: 0, ease: 'power3.inout' })
        .from(modelImage, { duration: 0.4, x: -200, opacity: 0, ease: 'power3.inOut' }, '<')
        .from(ratioBox, { duration: 0.3, y: 100, opacity: 0, ease: 'power3.inout' })
        .from(ratioBoxBox, { duration: 0.3, x: 100, opacity: 0, ease: 'power3.inout' });

    imageContainers.forEach(function(container) {
        container.addEventListener('click', function() {
            tl2.timeScale(1);
            tl2.play();
        });

        close.addEventListener('click', function() {
            tl2.timeScale(10);
            tl2.reverse();
        });
    });

    var movingBackground = document.querySelector('.moving-background');
    movingBackground.style.height = bodyHeight + "px";

    TweenLite.to(".moving-background", 1000, { backgroundPosition: "-10000px 0px", ease: "none" });

    const containers = document.querySelectorAll('.image-container');
    const frontStars = document.querySelectorAll('.frontStars');

    function setupContainerAnimations(container) {
        const image = container.querySelector('img');
        const materialName = container.querySelector('h2');
        const userName = container.querySelector('h3');
        const desc = container.querySelector('.desc-container');

        const tl = gsap.timeline({ paused: true });

        tl
            .to(image, { duration: 0.3, scale: 1.4, ease: 'power3.inout' })
            .from(materialName, { duration: 0.2, x: '-100', opacity: 0, ease: 'power3.inout' }, '<')
            .from(userName, { duration: 0.3, x: '-100', opacity: 0, ease: 'power3.inout' }, '<')
            .from(desc, { duration: 0.3, x: '-100', opacity: 0, ease: 'power3.inout' }, '<');

        container.addEventListener('mouseenter', () => {
            tl.play();
        });

        container.addEventListener('mouseleave', () => {
            tl.reverse();
        });
    }

    containers.forEach(container => {
        setupContainerAnimations(container);
    });
});