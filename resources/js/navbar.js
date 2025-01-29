document.addEventListener("DOMContentLoaded", function () {
    let lainnya = document.querySelector(".group");
    let dropdown = document.querySelector(".dropdown");

    lainnya.addEventListener("mouseenter", function () {
        dropdown.classList.remove("hidden");
        dropdown.classList.add("flex");
        dropdown.children[0].classList.add("ml-10");
    });

    lainnya.addEventListener("mouseleave", function () {
        dropdown.classList.add("hidden");
    });

    dropdown.addEventListener("mouseenter", function () {
        dropdown.classList.remove("hidden");
    });

    dropdown.addEventListener("mouseleave", function () {
        dropdown.classList.add("hidden");
        dropdown.classList.remove("flex");
        dropdown.children[0].classList.remove("ml-10");
    });
});
