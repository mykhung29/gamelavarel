document.addEventListener("DOMContentLoaded", function () {
    const burgerMenuBtn = document.querySelector(".burger-menu-btn");
    const navMenu = document.querySelector("nav");

    burgerMenuBtn.addEventListener("click", function () {
        navMenu.classList.toggle("show");
    });
});
console.log("hello");
