var bodyWidth = document.body.clientWidth;
var bodyHeight = document.body.clientHeight;

document.addEventListener("DOMContentLoaded", function() {

    var movingBackground = document.querySelector('.moving-background');
    var movingBackground2 = document.querySelector('.moving-background');
    movingBackground.style.height = bodyHeight + "px";
    movingBackground2.style.height = bodyHeight + "px";

    TweenLite.to(".moving-background", 1000, { backgroundPosition: "-2000px 0px", ease: "none" });
    TweenLite.to(".moving-background2", 1000, { backgroundPosition: "-10000px 0px", ease: "none" });
});