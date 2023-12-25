var bodyWidth = document.body.clientWidth;
var bodyHeight = document.body.clientHeight;

document.addEventListener("DOMContentLoaded", function() {

    var movingBackground = document.querySelector('.moving-background');
    var movingBackground2 = document.querySelector('.moving-background');
    movingBackground.style.height = bodyHeight + "px";
    movingBackground2.style.height = bodyHeight + "px";

    TweenLite.to(".moving-background", 1000, { backgroundPosition: "-2000px 0px", ease: "none" });
    TweenLite.to(".moving-background2", 1000, { backgroundPosition: "-10000px 0px", ease: "none" });

    var resetBox = document.querySelector('#resetBox');
    var heForgor = document.querySelector('#heForgor');
    var container = document.querySelector('.container');
    var lrButton = document.querySelector('#lrButton');

    const tl = gsap.timeline({ paused: true });

    tl
        .from(resetBox, { duration: 1.4, y: 600, ease: 'bounce.out' })
        .to(container, { duration: 0.4, y: -100, ease: 'power3.inout' }, '<')
        .to(heForgor, { duration: 0.4, x: 100, opacity: 0, ease: 'power3.inout' }, '<')
        .to(lrButton, { duration: 0.4, x: '140%', ease: 'power3.inout' }, '<');


    heForgor.addEventListener('click', () => {
        tl.play();
    });

});

function toggleCheckbox(checkbox) {
    checkbox.classList.toggle('checked');
    var hiddenCheckbox = checkbox.querySelector('input[type="checkbox"]');
    hiddenCheckbox.checked = !hiddenCheckbox.checked;
}