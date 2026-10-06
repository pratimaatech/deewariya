<div class="custom-cursor"></div>
<div class="custom-cursor-dot"></div>

<style>/* =========================
   CUSTOM CURSOR
========================= */

* {
    cursor: none;
}

.custom-cursor {
    position: fixed;
    top: 0;
    left: 0;
    width: 32px;
    height: 32px;
    border: 1.5px solid rgba(255, 255, 255, 0.8);
    border-radius: 50%;
    pointer-events: none;
    z-index: 99999;
    transform: translate(-50%, -50%);
    transition:
        width 0.25s ease,
        height 0.25s ease,
        border-color 0.25s ease,
        background 0.25s ease;
}

.custom-cursor-dot {
    position: fixed;
    top: 0;
    left: 0;
    width: 5px;
    height: 5px;
    background: #fff;
    border-radius: 50%;
    pointer-events: none;
    z-index: 100000;
    transform: translate(-50%, -50%);
}

/* Hover state */

.custom-cursor.active {
    width: 55px;
    height: 55px;
    background: rgba(255, 255, 255, 0.08);
    border-color: #fff;
}

/* Click effect */

.cursor-click {
    animation: cursorClick 0.4s ease-out;
}

@keyframes cursorClick {
    0% {
        transform: translate(-50%, -50%) scale(0.7);
        opacity: 1;
    }

    100% {
        transform: translate(-50%, -50%) scale(1.5);
        opacity: 0;
    }
}

/* Don't show custom cursor on touch devices */

@media (hover: none), (pointer: coarse) {
    * {
        cursor: auto;
    }

    .custom-cursor,
    .custom-cursor-dot {
        display: none;
    }
}</style>

<script>
const cursor = document.querySelector(".custom-cursor");
const dot = document.querySelector(".custom-cursor-dot");

let mouseX = 0;
let mouseY = 0;

let cursorX = 0;
let cursorY = 0;

let dotX = 0;
let dotY = 0;


/* Mouse position */

document.addEventListener("mousemove", (e) => {

    mouseX = e.clientX;
    mouseY = e.clientY;

});


/* Smooth outer cursor */

function animateCursor() {

    cursorX += (mouseX - cursorX) * 0.12;
    cursorY += (mouseY - cursorY) * 0.12;

    dotX += (mouseX - dotX) * 0.35;
    dotY += (mouseY - dotY) * 0.35;

    cursor.style.left = cursorX + "px";
    cursor.style.top = cursorY + "px";

    dot.style.left = dotX + "px";
    dot.style.top = dotY + "px";

    requestAnimationFrame(animateCursor);
}

animateCursor();


/* Interactive elements */

const interactiveElements = document.querySelectorAll(
    "a, button, .service-card, .project-card, input, textarea"
);

interactiveElements.forEach((element) => {

    element.addEventListener("mouseenter", () => {
        cursor.classList.add("active");
    });

    element.addEventListener("mouseleave", () => {
        cursor.classList.remove("active");
    });

});


/* Click animation */

document.addEventListener("click", () => {

    cursor.classList.remove("cursor-click");

    void cursor.offsetWidth;

    cursor.classList.add("cursor-click");

});
</script>