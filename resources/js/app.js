import "./bootstrap";

(() => {
    // Remove alert after 2 seconds
    const alert = document.querySelector("[role=alert]");
    if (alert) {
        setTimeout(() => {
            alert.classList.add("!opacity-0");
            alert.addEventListener("transitionend", function () {
                alert.remove();
            });
        }, 2000);
    }
})();
