document.addEventListener('DOMContentLoaded', function () {
    const markButton = document.querySelectorAll(".mark-button");
    const overlay = document.getElementById("overlay");
    const closeOverlay = document.getElementById("closeOverlay");
    const userLoggedIn = window.userLoggedIn;

    markButton.forEach((button) => {
        button.addEventListener("click", function () {
            if (!userLoggedIn) {
                window.location.href = "/login";
                return;
            }
            const idAyat = this.getAttribute("data-id");
            const idSurat = this.getAttribute("data-surat");

            document.getElementById("idAyat").value = idAyat;
            document.getElementById("idSurat").value = idSurat;

            overlay.classList.remove("hidden");
            overlay.classList.add("flex");
        });
    });

    closeOverlay.addEventListener("click", function () {
        overlay.classList.add("hidden");
    });

    overlay.addEventListener("click", function (event) {
        if (event.target === overlay) {
            overlay.classList.add("hidden");
        }
    });
});
